<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class HomeController extends Controller
{
    public function index() {

        $data = [
            'title' => 'Гостевая книга на Laravel 5',

        ];

        return view('pages.messages.index', $data);
    }


    public function edit($id) {

        $data = [
            'title' => 'Редактирование: Гостевая книга на Laravel 5',
            'pageTitle' => 'Редактирование: Гостевая книга',
        ];

        return view('pages.messages.edit', $data);
    }
}
