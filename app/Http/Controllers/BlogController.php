<?php

namespace App\Http\Controllers;

use App\Http\Requests\Blog\CreateBlogRequest;
use App\Http\Requests\Blog\UpdateBlogRequest;
use App\Http\Traits\UploadDocument;
use App\Models\Blog;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    use UploadDocument;

    protected $model;

    public function __construct(Blog $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $blogs = $this->model->all();
        if (Auth::user()->role == Auth::user()::GURU) {
            $blogs = $this->model->where('user_id', Auth::user()->id)->get();
        }

        $data = [
            "title" => "Berita",
            "menus" => collect([
                collect([
                    "title" => "Dashboard",
                    "url" => route('web.app.index')
                ]),
            ]),
            "blogs" => $blogs
        ];

        return view('app.blog.index', $data);
    }

    public function create()
    {
        $data = [
            "title" => "Tambah Berita",
            "menus" => collect([
                collect([
                    "title" => "Dashboard",
                    "url" => route('web.app.index')
                ]),
                collect([
                    "title" => "Berita",
                    "url" => route('web.blog.index')
                ]),
            ]),
        ];

        return view('app.blog.create', $data);
    }

    public function store(CreateBlogRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $request->merge([
                'user_id' => Auth::user()->id,
                'slug' => Str::slug($request->title)
            ]);

            $blog = $this->model->create($request->all());

            if ($request->hasFile('thumbnail')) {
                $this->upload($request->thumbnail, $blog->document(), 'thumbnail', true);
            }

            if ($request->hasFile('galleries')) {
                $this->uploads($request->galleries, $blog->documents(), 'galleries');
            }

            return redirect(route('web.blog.index'))->with('message', "<script>Swal.fire('Selamat!', 'data berhasil disimpan!', 'success');</script>");
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $data = [
            "title" => "Tambah Berita",
            "menus" => collect([
                collect([
                    "title" => "Dashboard",
                    "url" => route('web.app.index')
                ]),
                collect([
                    "title" => "Berita",
                    "url" => route('web.blog.index')
                ]),
            ]),
            "blog" => $blog
        ];
        return view('app.blog.edit', $data);
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        return DB::transaction(function () use ($request, $blog) {
            $request->merge([
                'slug' => Str::slug($request->title)
            ]);

            if ($request->hasFile('thumbnail')) {
                if ($blog->document && $blog->document->is_thumbnail) {
                    Storage::delete($blog->document->document_path);
                    $blog->document()->delete();
                }

                $this->upload($request->thumbnail, $blog->document(), 'thumbnail', true);
            }

            if ($request->hasFile('galleries')) {
                $this->uploads($request->galleries, $blog->documents(), 'galleries');
            }

            $blog->update($request->all());

            return redirect(route('web.blog.index'))->with('message', "<script>Swal.fire('Selamat!', 'data berhasil disimpan!', 'success');</script>");
        });
    }

    public function updateStatus(Blog $blog)
    {
        return DB::transaction(function () use ($blog) {
            return $blog->update([
                'status' => $blog->status == 1 ? Blog::INACTIVE : Blog::ACTIVE
            ]);
        });
    }

    public function destroy(Blog $blog)
    {
        return DB::transaction(function () use ($blog) {
            if ($blog->counters) {
                $blog->counters()->delete();
            }

            if ($blog->documents) {
                foreach ($blog->documents as $document) {
                    Storage::delete($document->document_path);
                }
                $blog->documents()->delete();
            }

            return $blog->delete();
        });
    }

    public function deleteDocument(Document $document, $id)
    {
        DB::transaction(function () use ($document) {
            Storage::delete($document->document_path);

            return $document->delete();
        });

        return redirect(route('web.blog.edit', $id))->with('message', "<script>Swal.fire('Selamat!', 'data berhasil disimpan!', 'success');</script>");
    }
}
