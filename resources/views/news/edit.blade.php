@extends('layouts.app')
@section('content')
<div class="panel-body">   
    @include('common.errors')
    <form action="{{ route('news_update',$news->id) }}" method="POST" class="form-horizontal">
        {{method_field('PUT')}}
        {{ csrf_field() }}



            <div class="col-sm-6">
                <input type="text" name="title" id="news-title" class="form-control" value="{{$news->title}}">
                <input type="text" name="text" id="news-text" class="form-control" value="{{$news->text}}">
                <!--<textarea id="news-text" class="form-control" >{{$news->text}}</textarea>-->
            </div>
     

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default bg-info">
                    <i class="fa fa-edit"></i> Изменить новость
            </div>
        </div>
    </form>
</div>

@endsection