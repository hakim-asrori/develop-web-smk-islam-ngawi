<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function getData()
    {
        return [
            "title" => "Dashboard",
        ];
    }

    public function __invoke(Request $request)
    {
        $data = $this->getData();

        return view('app.home', $data);
    }
}
