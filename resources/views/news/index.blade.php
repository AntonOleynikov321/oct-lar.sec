@extends('layouts.app')
@section('content')

<!--<div class="panel-body">
 



    <form action="{{ route('news_store') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}


        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Задача</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control">
            </div>
        </div>

 
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default bg-success">
                    <i class="fa fa-plus"></i> Добавить задачу
                </button>
            </div>
        </div>
    </form>
</div>-->

@include('common.errors')
@if (count($news) > 0)
<div class="panel panel-default">
    <div class="panel-heading">
        Новости
    </div>

    <div class="panel-body">
        <table class="table table-striped task-table">
            <tbody>
                @foreach ($news as $article)
                <tr>
                  
                    <td class="table-text">
                        <div><a href = "#">{{ $article->title }}</a></div>
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
</div>
@endif
@endsection