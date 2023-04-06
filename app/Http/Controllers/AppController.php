<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function getData()
    {
        $data = [
            "title" => "Dashboard",
            "blogs" => Blog::all(),
            "users" => User::all(),
            "galleries" => Document::all(),
            "contacts" => Contact::all(),
        ];

        if (auth()->user()->role == auth()->user()::GURU) {
            $data["blogs"] = Blog::where('user_id', auth()->user()->id)->get();
            $data["galleries"] = Document::whereHas('blog', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })->paginate(6);
        }

        return $data;
    }

    public function __invoke(Request $request)
    {
        $data = $this->getData();

        return view('app.home', $data);
    }
}
