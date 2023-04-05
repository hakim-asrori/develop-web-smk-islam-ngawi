<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    protected $model;

    public function __construct(Contact $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $data = [
            "title" => "Kontak",
            "menus" => collect([
                collect([
                    "title" => "Dashboard",
                    "url" => route('web.app.index')
                ]),
            ]),
            "contacts" => $this->model->all()
        ];

        return view('app.contact.index', $data);
    }

    public function store(CreateContactRequest $createContactRequest)
    {
        return DB::transaction(function () use ($createContactRequest) {
            $this->model->create($createContactRequest->all());
            return response()->json(["data" => "OK"]);
        });
    }

    public function show($id)
    {
        $contact = $this->model->findOrFail($id);

        DB::transaction(function () use ($contact) {
            $this->model->where("id", $contact->id)->update([
                'status' => 1
            ]);
        });

        $data = [
            "title" => "Detail Kontak",
            "menus" => collect([
                collect([
                    "title" => "Dashboard",
                    "url" => route('web.app.index')
                ]),
                collect([
                    "title" => "Kontak",
                    "url" => route('web.contact.index')
                ]),
            ]),
            "contact" => $contact
        ];

        return view('app.contact.detail', $data);
    }

    public function destroy($id)
    {
        $contact = $this->model->findOrFail($id);

        return DB::transaction(function () use ($contact) {
            return $contact->delete();
        });
    }
}
