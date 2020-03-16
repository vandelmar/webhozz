@extends('layouts.app')

@section('content')

<div class="container">
        <form action="/upload/proses" method="POST" enctype="multipart/form-data">
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

{{--            <div class="col-lg-8 mx-auto my-3">--}}
{{--				@if(count($errors) > 0)--}}
{{--				<div class="alert alert-danger">--}}
{{--					@foreach ($errors->all() as $error)--}}
{{--					{{ $error }} <br/>--}}
{{--					@endforeach--}}
{{--				</div>--}}
{{--				@endif--}}
{{--            </div>--}}

{{--				<form action="/upload/proses" method="POST" enctype="multipart/form-data">--}}
{{--					{{ csrf_field() }}--}}

					<div class="form-group">
						<b>File Gambar</b><br/>
						<input type="file" name="file">
					</div>
{{--					<input type="submit" value="Upload" class="btn btn-primary">--}}
{{--				</form>--}}
            <button type="submit" value="Upload" class="btn btn-primary">Submit</button>
        </form>

{{--        <h4 class="my-5">Data</h4>--}}

{{--				<table class="table table-bordered table-striped">--}}
{{--					<thead>--}}
{{--						<tr>--}}
{{--							<th width="1%">File</th>--}}
{{--							<th width="1%">OPSI</th>--}}
{{--						</tr>--}}
{{--					</thead>--}}
{{--                    <tbody>--}}
{{--						@foreach($category as $g)--}}
{{--						<tr>--}}
{{--							<td><img width="150px" src="{{ url('/data_file/'.$g->filename) }}"></td>--}}
{{--							<td><a class="btn btn-danger" href="/upload/hapus/{{ $g->id }}">HAPUS</a></td>--}}
{{--						</tr>--}}
{{--						@endforeach--}}
{{--					</tbody>--}}
{{--				</table>--}}
</div>
@endsection
