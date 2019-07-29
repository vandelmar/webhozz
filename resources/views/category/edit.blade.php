@extends('layouts.app')

@section('content')
    
<div class="container">
        <form action="/category/{{$category->id}}/edit" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="dari_form" class="form-control" placeholder="Product Name" value="{{$category->name}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
@endsection
