@extends('layouts.master')

@section('title')
    TaskMaster
@stop

@section('content')
   <div class="container theme-showcase" role="main">
   <h1><strong>TaskMaster</strong></h1>
   <p>This Laravel application provides a user interface to track personal tasks. Application features include:</p>
   <ul class="col-md-10">
      <li>User authentication so different users can have their own task lists.</li>
      <li>A page to display all incomplete tasks.</li>
      <li>A page to display all completed tasks.</li>
      <li>A page to display all tasks with incomplete tasks in bold and completed tasks greyed out.</li>
      <li>A page to add new tasks.</li>
      <li>A page to edit the content of existing tasks.</li>
   </ul>
</div>
<hr>

@stop

@section('content')
    <p>
        Welcome to TaskMaster, a personal task organizer.
        To get started <a href='/'>log in</a> or <a href='/register'>register</a>.
    </p>
@stop