<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
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
            "title" => "Guru",
            "menus" => collect([
                collect([
                    "title" => "Dashboard",
                    "url" => route('web.app.index')
                ]),
            ]),
            "users" => $this->model->where('role', $this->model::GURU)->get()
        ];

        return view('app.teacher.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            "title" => "Tambah Guru",
            "menus" => collect([
                collect([
                    "title" => "Dashboard",
                    "url" => route('web.app.index')
                ]),
                collect([
                    "title" => "Guru",
                    "url" => route('web.teacher.index')
                ]),
            ]),
        ];

        return view('app.teacher.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateUserRequest $createUserRequest)
    {
        return DB::transaction(function () use ($createUserRequest) {
            $createUserRequest->merge([
                'password' => Hash::make('password'),
                'email_verified_at' => Carbon::now(),
                'remember_token' => Str::random(10),
                'role' => $this->model::GURU
            ]);
            $this->model->create($createUserRequest->all());

            return redirect(route('web.teacher.index'))->with('message', "<script>Swal.fire('Selamat!', 'data berhasil disimpan!', 'success');</script>");
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
            "title" => "Edit Guru",
            "menus" => collect([
                collect([
                    "title" => "Dashboard",
                    "url" => route('web.app.index')
                ]),
                collect([
                    "title" => "Guru",
                    "url" => route('web.teacher.index')
                ]),
            ]),
            "user" => $this->model->findOrFail($id)
        ];

        return view('app.teacher.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $updateUserRequest, $id)
    {
        $user = $this->model->findOrFail($id);

        return DB::transaction(function () use ($updateUserRequest, $user) {
            $updateUserRequest->merge([
                'password' => Hash::make('password'),
                'email_verified_at' => Carbon::now(),
                'remember_token' => Str::random(10)
            ]);
            $user->update($updateUserRequest->all());

            return redirect(route('web.teacher.index'))->with('message', "<script>Swal.fire('Selamat!', 'data berhasil disimpan!', 'success');</script>");
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
