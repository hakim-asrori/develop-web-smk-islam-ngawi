<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateStudentRequest;
use App\Http\Requests\User\UpdateStudentRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "title" => "Siswa",
            "menus" => collect([
                collect([
                    "title" => "Dashboard",
                    "url" => route('web.app.index')
                ]),
            ]),
            "users" => $this->model->where('role', $this->model::MURID)->get()
        ];

        return view('app.student.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            "title" => "Tambah Siswa",
            "menus" => collect([
                collect([
                    "title" => "Dashboard",
                    "url" => route('web.app.index')
                ]),
                collect([
                    "title" => "Siswa",
                    "url" => route('web.student.index')
                ]),
            ]),
        ];

        return view('app.student.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateStudentRequest $createUserRequest)
    {
        return DB::transaction(function () use ($createUserRequest) {
            $createUserRequest->merge([
                'password' => Hash::make($createUserRequest->nis),
                'email_verified_at' => Carbon::now(),
                'remember_token' => Str::random(10),
                'role' => $this->model::MURID
            ]);
            $this->model->create($createUserRequest->all());

            return redirect(route('web.student.index'))->with('message', "<script>Swal.fire('Selamat!', 'data berhasil disimpan!', 'success');</script>");
        });
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = [
            "title" => "Edit Siswa",
            "menus" => collect([
                collect([
                    "title" => "Dashboard",
                    "url" => route('web.app.index')
                ]),
                collect([
                    "title" => "Siswa",
                    "url" => route('web.student.index')
                ]),
            ]),
            "user" => $this->model->findOrFail($id)
        ];

        return view('app.student.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $updateUserRequest, $id)
    {
        $user = $this->model->findOrFail($id);

        return DB::transaction(function () use ($updateUserRequest, $user) {
            $user->update($updateUserRequest->all());

            return redirect(route('web.student.index'))->with('message', "<script>Swal.fire('Selamat!', 'data berhasil disimpan!', 'success');</script>");
        });
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = $this->model->findOrFail($id);

        return DB::transaction(function () use ($user) {
            return $user->delete();
        });
    }
}
