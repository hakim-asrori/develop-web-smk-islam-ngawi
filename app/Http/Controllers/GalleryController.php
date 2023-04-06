<?php

namespace App\Http\Controllers;

use App\DataTables\GalleriesDataTable;
use App\Models\Blog;
use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    protected $model, $blog;

    public function __construct(Document $model, Blog $blog)
    {
        $this->model = $model;
        $this->blog = $blog;
    }

    public function index()
    {
        $galleries = $this->model->paginate(6);
        if (Auth::user()->role == Auth::user()::GURU) {
            $galleries = $this->model->whereHas('blog', function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->paginate(6);
        }
        $data = [
            "title" => "Galeri",
            "menus" => collect([
                collect([
                    "title" => "Dashboard",
                    "url" => route('web.app.index')
                ]),
            ]),
            "galleries" => $galleries
        ];

        return view('app.gallery.index', $data);
    }
}
