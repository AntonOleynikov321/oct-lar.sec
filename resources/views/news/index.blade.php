@extends('layouts.app')
@section('content')

@include('common.errors')
@if (count($news) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Новости
    </div>
    <a href="{{route('news_add')}}">  <i class="fa fa-plus"></i> Добавить новость</a>

    <div class="panel-body">
        <table class="table table-striped task-table">
            <tbody>
                @foreach ($news as $article)
                <tr>
                  
                    <td class="table-text">
                        <div><a href = "{{route('news_show',$article->id)}}">{{ $article->title }}</a></div>
                    </td>

                    <td>
                        <form action="{{route('news_destroy',$article->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('delete')}}
         
                            <button type="submit" class="btn btn-default bg-danger">
                                <i class="fa fa-trash"></i> Удалить
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('news_edit',$article->id)}}" method="post">
                            {{csrf_field()}}
                            {{method_field('get')}}
                            <button type="submit" class="btn btn-default bg-info">
                                <i class="fa fa-edit"></i> Изменить
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<a href="{{route('news_add')}}">  <i class="fa fa-plus"></i> Добавить новость</a>
</div>
@endif
@endsection