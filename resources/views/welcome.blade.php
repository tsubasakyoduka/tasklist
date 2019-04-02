@extends('layouts.app')

@section('content')
   
  <h1>タスク一覧</h1>
  @if (Auth::check())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>ステイタス</th>
                    <th>タスク</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        
        {!! link_to_route('tasks.create', '新規タスクの投稿', null, ['class' => 'btn btn-primary']) !!}
               
    
            


    @else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>ようこそ！タスクリストです</h1>
            {!! link_to_route('signup.get', '今すぐ登録!', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
    @endif
@endsection
