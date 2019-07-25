@extends ('layouts.app')

@section('content')
<div class="container">
    Category List
    <a href="/category/create" class="btn btn-success mb-3">New Category</a>
    <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Created At</th>
        <th scope="col">Update At</th>
      </tr>
    </thead>
    <tbody>
        @foreach($category as $item)
      <tr>
        <th scope="row">{{$item->id}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->created_at}}</td>
        <td>{{$item->updated_at}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection