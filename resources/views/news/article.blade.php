@extends('layouts.app')
@section('content')
<div class="panel-body">   
    @include('common.errors')
    <form method="POST" class="form-horizontal">
        {{method_field('get')}}
        {{ csrf_field() }}

        <div class="form-group">
            <label for="task" class="col-sm-3 control-label"></label>

            <div class="col-sm-6">
                <input type="text" name="name" id="news-title" class="form-control" value="{{$news->title}}" readonly>
                <textarea id="news-text" class="form-control" readonly>{{$news->text}}</textarea>
            </div>
        </div>

    </form>
</div>

@endsection