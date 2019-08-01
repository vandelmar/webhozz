@extends('layouts.app')

@section('content')
    
<div class="container">
        <form action="/product" method="POST">
            @csrf
            <div class="form-group">
                <label>Category</label>
                <select name="category_id" class="form-control">
                        @foreach ($category as $c)
                        <option value="{{$c->id}}" {{$c->id?'selected':''}}>{{$c->name}}</option>
                        @endforeach
                    </select>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Product Name">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
@endsection
