<?php

namespace App\Http\Controllers;

use App\DataTables\GalleriesDataTable;
use App\Models\Document;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    protected $model;

    public function __construct(Document $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $data = [
            "title" => "Galeri",
            "menus" => collect([
                collect([
                    "title" => "Dashboard",
                    "url" => route('web.app.index')
                ]),
            ]),
            "galleries" => $this->model->paginate(6)
        ];

        return view('app.gallery.index', $data);
    }
}
