<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $data = [
            "title" => "Profil Saya",
            "menus" => collect([
                collect([
                    "title" => "Dashboard",
                    "url" => route('web.app.index')
                ]),
            ]),
            "user" => $this->model->findOrFail(auth()->user()->id)
        ];

        return view('app.profile.index', $data);
    }

    public function update(UpdateUserRequest $updateUserRequest, User $user)
    {
        return DB::transaction(function () use ($user, $updateUserRequest) {
            $user->update($updateUserRequest->all());

            return back()->with('message', "<script>Swal.fire('Selamat!', 'data berhasil disimpan!', 'success');</script>");
        });
    }

    public function changePassword(ChangePasswordRequest $changePasswordRequest, User $user)
    {
        # code...
    }
}