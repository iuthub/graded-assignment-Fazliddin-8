@extends('layouts.master')

@section('content')

@if(Auth::check())
    <form action="{{ route('postCreateTask') }}" method = 'POST'>
      @csrf
      <div id="myDIV" class="header">
        <h2>My To Do List</h2>
        <input type="text" name="newTask" placeholder="New task...">
        <button type="submit" class="addBtn">Add</button>      
      </div>

      <ul class="errorsList">
        @foreach ($errors->all() as $error)
          <li class="invalid-feedback" role="alert">{{ $error }}</li>
        @endforeach

        @include('partials.info')
      </ul>
    </form>
    
    <ul id="myUL">
    @foreach($tasks as $task)
      <li>
        <div class="task">
          {{ $task->content }}
        </div>
        <div class="action">
          <a href="{{ route('getEditTask', [ 'id' => $task->id ]) }}"><i class="fa fa-edit"></i></a> 
        </div>
        <div class="action">
          <a href="{{ route('getDeleteTask', [ 'id' => $task->id ]) }}"><i class="fa fa-trash-alt"></i></a>
        </div>
      </li>
    @endforeach
    </ul>
@else
    <h1> Login to see your tasks</h1>
@endif
@endsection