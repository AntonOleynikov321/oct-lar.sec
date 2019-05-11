@extends('layouts.app')
@section('content')
<h2>Hello!!!</h2>
    <p>you can see all tasks
        <a href="{{route('tasks_index')}}"> here</a>
    </p>
    <p>you can see all news
        <a href="{{route('news_index')}}"> here</a>
    </p>
@endsection