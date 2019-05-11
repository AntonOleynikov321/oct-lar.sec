@extends('layouts.app')
@section('content')
<div class="panel-body">   
    @include('common.errors')
    <form action="{{ route('tasks_update',$task->id) }}" method="POST" class="form-horizontal">
        {{method_field('PUT')}}
        {{ csrf_field() }}

        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Задача</label>

            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control" value="{{$task->name}}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default bg-info">
                    <i class="fa fa-edit"></i> Изменить задачу
                </button>
            </div>
        </div>
    </form>
</div>

@endsection