@extends('layouts.app')
@section('content')
<div class="panel-body">   
    @include('common.errors')
    <form action="{{ route('news_store')}}" method="POST" class="form-horizontal">
        {{method_field('PUT')}}
        {{ csrf_field() }}



            <div class="col-sm-6">
                <input type="text" name="name" id="news-title" class="form-control">
                <textarea id="news-text" class="form-control" ></textarea>
            </div>
     

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default bg-info">
                    <i class="fa fa-success"></i> Сохранить новость
            </div>
        </div>
    </form>
</div>

@endsection
