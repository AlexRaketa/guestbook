<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Sinergi\BrowserDetector\Browser;

class HomeController extends Controller
{
    public function index(Request $request) {

        $direction = $request->get('sort');


        if(!in_array($direction, ['asc', 'desc'])) {
            $direction = 'desc';
        }

        $data = [
            'title' => 'Гостевая книга на Laravel 5',
            'messages' => Message::query()->orderBy('created_at', $direction)->paginate(20),
            'count' => Message::count(),
            'direction' => $direction
        ];

        return view('pages.messages.index', $data);
    }

    public function create(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message'=> 'required'
        ], [
            'name.required' => 'Введите имя',
            'email.required' => 'Введите почту',
            'message.required' => 'Введите сообщение',
            'email.email' => 'Проверьте правильность ввода',

        ]);

        $message = new Message(
            $request->only(['name', 'email', 'homepage', 'message'])
        );

        $message->ip = $request->ip();

        $browser = new Browser();
        $message->client = $browser->getName().' '.$browser->getVersion();

        $message->save();

        \Session::flash('message.submit', 'Сообщение добавлено');

        return redirect()->route('home');
    }

    public function delete($id) {
        $model = Message::findOrFail($id);
        $model->delete();

        return redirect()->back();
    }

    public function edit($id) {

        $data = [
            'title' => 'Редактирование: Гостевая книга на Laravel 5',
            'pageTitle' => 'Редактирование: Гостевая книга',
        ];

        return view('pages.messages.edit', $data);
    }
}
