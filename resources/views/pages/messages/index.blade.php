@extends('index')

@section('content')

@include('_common._form')

<hr>

    <div class="text-right"><b>Всего сообщений:</b><i class="badge">{{ $count }}</i></div><br/>

    <div class="text-right">
        Сортировка:
        @if($direction == 'desc')
            <a class="btn btn-info" href="{{ route('home', ['sort' => 'asc']) }}"><i class="glyphicon glyphicon-arrow-down"></i></a>
        @else
            <a class="btn btn-info" href="{{ route('home', ['sort' => 'desc']) }}"><i class="glyphicon glyphicon-arrow-up"></i></a>
        @endif
    </div>

@include('pages.messages._items')

@stop