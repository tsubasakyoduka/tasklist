@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>ようこそ！タスクリストです</h1>
            {!! link_to_route('signup.get', '今すぐ登録!', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
@endsection