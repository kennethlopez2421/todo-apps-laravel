@extends('layouts.app')

@section('title')

Create Todo's

@endsection

@section('content')

<h1 class="text-center my-5">Create Todo's</h1>

<div class="row justify-content-center">
<div class="col-md-8">

<div class="card card-default">

        <div class="card-header">
            Create new Todo's
        </div>

    <div class="card-body">
        @if($errors->any())
          <div class="alert alert-danger">
            <ul class="list-group">
                @foreach($errors->all() as $error)
                  <li class="list-group-item">
                    {{ $error }}
                  </li>
                @endforeach
            </ul>
          </div>
        @endif
    
    <form action="/store-todos" method="post">
    @csrf
    <div class="form-group">
    <input class="form-control" type="text" name="name" placeholder="Name">
    </div>
    <div class="form-group">
    <label><h5>Description</h5></label>
    <textarea name="description" cols="5" rows="5" class="form-control" placeholder="Description"> </textarea>
    </div>
    <div class="form-group text-center">
    <button type="submit" class="btn btn-success">Create Todo's</button>
    </div>
    
    </form>

    </div>
</div>

</div>
</diV>

@endsection