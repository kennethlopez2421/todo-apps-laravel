@extends('layouts.app')

@section('title')

Todo Lists

@endsection

@section('content')

<h1 class="text-center my-5">TODOS PAGE</h1>

<div class="row justify-content-center">
<div class="col-md-8">
    <div class="card card-dafault">
        <div class="card-header">
                    To Do's
        </div>
    <div class="card-body">
    <ul class="list-group">
        @foreach ($todos as $todo )

        <li class="list-group-item">
            {{ $todo->name }}
            

            @if (!$todo->completed)

            <a href="/todos/{{ $todo->id }}/complete" type="button" class="btn btn-warning btn-sm float-right ">Complete</a>

            @endif
            
            <a href="/todos/{{ $todo->id }}" type="button" class="btn btn-primary btn-sm float-right mr-2">View</a>
           
        </li>
        
    @endforeach

    </ul>
    </div>
    </div>
</div>

</div>

@endsection