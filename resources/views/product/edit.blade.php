@extends('layouts.app')

@section('content')
    
 <div class="container">
        <form action="{{route('product.update', $product->id)}}" method="POST">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label>Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($category as $c)
                    <option value="{{$c->id}}" {{$product->category_id == $c->id?'selected':''}}>{{$c->name}}</option>
                    @endforeach
                </select>
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Product Name" value="{{$product->name}}">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{$product->price}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
@endsection
