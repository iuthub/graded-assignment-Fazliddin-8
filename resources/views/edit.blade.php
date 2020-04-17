@extends('layouts.master')

@section('content')

  <form action="{{ route('postEditTask') }}" method = 'POST'>
    @csrf
    <div id="myDIV" class="header">
      <h2>My To Do List</h2>
      <input type="text" name="newTask" placeholder="Editing..." value="{{ $task->content }}">
      <input type="hidden" name="idTask" value="{{ $task->id }}">
      <button type="submit" class="addBtn">Save</button>      
    </div>
  </form>

  <ul class="errorsList">
    @foreach ($errors->all() as $error)
      <li class="invalid-feedback" role="alert">{{ $error }}</li>
    @endforeach
  </ul>
@endsection