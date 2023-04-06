<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCurriculumRequest;
use App\Http\Traits\UploadDocument;
use App\Models\Curriculum;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CurriculumController extends Controller
{
    use UploadDocument;

    protected $model;

    public function __construct(Curriculum $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "title" => "Kurikulum dan Kesiswaan",
            "menus" => collect([
                collect([
                    "title" => "Dashboard",
                    "url" => route('web.app.index')
                ]),
            ]),
            "curricula" => $this->model->all()
        ];

        return view('app.curriculum', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCurriculumRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $curriculum = $this->model->create($request->all());

            if ($request->hasFile('document')) {
                $this->upload($request->document, $curriculum->document(), 'document', true);
            }

            return redirect(route('web.curriculum.index'))->with('message', "<script>Swal.fire('Selamat!', 'data berhasil disimpan!', 'success');</script>");
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $curriculum = $this->model->findOrFail($id);
        $fileName = explode('.', $curriculum->document->document_name);

        return response()->download('storage/' . $curriculum->document->document_path, Str::slug($curriculum->title) . '.' . end($fileName));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curriculum = $this->model->findOrFail($id);
        return DB::transaction(function () use ($curriculum) {
            if ($curriculum->document) {
                Storage::delete($curriculum->document->document_path);

                $curriculum->document()->delete();
            }

            return $curriculum->delete();
        });
    }
}
