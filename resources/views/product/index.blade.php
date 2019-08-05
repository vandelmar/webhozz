@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">  
      <h1>Product</h1>
      <div class="text-right">
      <a href="/product/create" class="btn btn-success mb-3">New Product</a>
        <a href="/product-export" class="btn btn-warning mb-3">Export</a>
      </div>
      </div>

      <div class="col md-6">
        <form action="/product-import" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="file" name="file">
          <button type="submit" class="btn btn-primary">Import</button>
        </form>
      </div>

      <form class="form-inline mb-3">
      <div class="form-group">
        <input type="text" name="search" class="form-control" placeholder="Search here...">
      </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <table class="table table-striped table-bordered table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Category</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Created At</th>
        <th scope="col">Update At</th>
        <th scope="col" colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse($product as $item)
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{optional($item->category)->name}}</td>
        <td>{{$item->name}}</td>
        <td>Rp. {{number_format($item->price, 0, ',', '.')}}</td>
        <td>{{$item->created_at->diffForHumans()}}</td>
        <td>{{$item->updated_at}}</td>
        <td>
          <a  class="btn btn-primary" href="/product/{{$item->id}}/edit">Edit</a>
        </td>
        <td>

          <form method="POST" action="/product/{{$item->id}}">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="5">Data not found.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
  {{$product->render()}}
  </div>
</div>    
@endsection