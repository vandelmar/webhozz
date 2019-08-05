@extends ('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">  
      <h1>Category</h1>
      <div class="text-right">
      <a href="/category/create" class="btn btn-success mb-3">New Category</a>
    </div>
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
        <th scope="col">Name</th>
        <th scope="col">Created At</th>
        <th scope="col">Update At</th>
        <th scope="col" colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
        @forelse($category as $item)
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->created_at}}</td>
        <td>{{$item->updated_at}}</td>
        <td>
          <a  class="btn btn-primary" href="/category/{{$item->id}}/edit">Edit</a>
        </td>
        <td>

          <form method="POST" action="/category/{{$item->id}}">
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
  {{$category->render()}}
  </div>
</div>      
@endsection