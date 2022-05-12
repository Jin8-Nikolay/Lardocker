@extends('layouts.app')

@section('content')
    <app></app>
    {{--        <div class="container">--}}
    {{--            <div class="row justify-content-center">--}}
    {{--                <div class="col-md-8">--}}
    {{--                    <div class="card">--}}
    {{--                        <div class="card-header">{{ __('TodoList') }}</div>--}}

    {{--                        <div class="card-body">--}}
    {{--                            @if (session('status'))--}}
    {{--                                <div class="alert alert-success" role="alert">--}}
    {{--                                    {{ session('status') }}--}}
    {{--                                </div>--}}
    {{--                            @endif--}}
    {{--                        </div>--}}
    {{--                        <form method="POST" class="form-inline offset-md-2 form-margin-r-b"--}}
    {{--                              action="{{ route('create-todo') }}">--}}
    {{--                            @csrf--}}
    {{--                            <div class="form-group mb-3">--}}
    {{--                                <label for="name"--}}
    {{--                                       class="col-md-4 col-form-label">{{ __('Name') }}</label>--}}
    {{--                                <input id="name" type="text"--}}
    {{--                                       class="form-control" name="name"--}}
    {{--                                       value="{{ old('name') }}" required autocomplete="name" autofocus>--}}
    {{--                            </div>--}}
    {{--                            <div class="form-group mb-0">--}}
    {{--                                <div class="col-md-8">--}}
    {{--                                    <button type="submit" class="btn btn-primary">--}}
    {{--                                        {{ __('Create') }}--}}
    {{--                                    </button>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </form>--}}
    {{--                    </div>--}}
    {{--                    <todo-list :todoList="{{ $view->todoList }}"></todo-list>--}}
    {{--                    @if(!empty($view->todoList))--}}
    {{--                        <div class="card">--}}
    {{--                            <div class="card-body">--}}
    {{--                                @foreach($view->todoList as $todo)--}}
    {{--                                    <div class="row offset-md-2 pt-2">--}}
    {{--                                        <div--}}
    {{--                                            class="col-md-3 @if($todo->isComplete()) todo-complete @endif">{{ $todo->name }}</div>--}}
    {{--                                        <div class="col-md-6">--}}
    {{--                                            @if($todo->isComplete())--}}
    {{--                                                <a class="btn btn-danger"--}}
    {{--                                                   href="{{ route('delete-todo', ['id' => $todo->id]) }}">Delete</a>--}}
    {{--                                            @endif--}}
    {{--                                            @if($todo->isIncomplete())--}}
    {{--                                                <a class="btn btn-success"--}}
    {{--                                                   href="{{ route('complete-todo', ['id' => $todo->id]) }}">Complete</a>--}}
    {{--                                                <a class="btn btn-danger"--}}
    {{--                                                   href="{{ route('delete-todo', ['id' => $todo->id]) }}">Delete</a>--}}
    {{--                                            @endif--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                @endforeach--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    @endif--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
@endsection
