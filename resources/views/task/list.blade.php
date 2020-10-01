@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ __('task_list') }}</div>
                <div class="panel-body">
                    @foreach($tasks as $task)
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $task->task_name }}</h3>
                                    <form action="{{ route('deleteTask',$task->id) }}" method="post" class="d-inline">
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger" onclick='return confirm("削除しますか？");'>{{ __('go_delete')  }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <form class="form-horizontal" method="POST" action="{{ route('addTask') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('task_name') ? ' has-error' : '' }}">
                            <label for="task_name" class="col-md-4 control-label">{{ __('task_name') }}</label>
                            <div class="col-md-6">
                                <input id="task_name" type="text" class="form-control" name="task_name" value="{{ old('task_name') }}" autofocus>
                                @if ($errors->has('task_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('task_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('go_add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
