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
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
