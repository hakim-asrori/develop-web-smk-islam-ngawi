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
        return [
            "title" => "Dashboard",
            "blogs" => Blog::all(),
            "users" => User::all(),
            "galleries" => Document::all(),
            "contacts" => Contact::all(),
        ];
    }

    public function __invoke(Request $request)
    {
        $data = $this->getData();

        return view('app.home', $data);
    }
}
