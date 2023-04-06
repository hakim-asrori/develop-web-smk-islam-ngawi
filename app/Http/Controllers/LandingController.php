<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\CounterShowBlog;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }

    public function blog(Request $request)
    {
        $data = [
            "blogs" => Blog::where('status', Blog::ACTIVE)->inRandomOrder()->paginate(4),
            "newBlogs" => Blog::where('status', Blog::ACTIVE)->limit(5)->latest()->get()
        ];

        if ($request->search) {
            $data["blogs"] = Blog::where('status', Blog::ACTIVE)->where("title", "like", "%" . $this->antiInject($request->search) . "%")->orWhere("content", "like", "%" . $this->antiInject($request->search) . "%")->inRandomOrder()->paginate(4);
        }

        return view('landing.blog', $data);
    }

    public function blogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)->first();

        DB::transaction(function () use ($blog) {
            return CounterShowBlog::create([
                'blog_id' => $blog->id
            ]);
        });

        $data = [
            "blog" => $blog,
            "newBlogs" => Blog::where('status', Blog::ACTIVE)->limit(5)->latest()->get()
        ];

        if (!$blog) {
            abort(404);
        }

        return view('landing.blog-detail', $data);
    }

    public function gallery()
    {
        $data = [
            "galleries" => Document::paginate(9)
        ];

        return view('landing.gallery', $data);
    }

    protected function antiInject($string)
    {
        return stripslashes(strip_tags(htmlentities(htmlspecialchars($string, ENT_QUOTES))));
    }
}
