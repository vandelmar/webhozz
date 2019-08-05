@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Post {{ $post->id }}
                        <div class="text-right">
                            <a href="{{ url('/posts') }}" title="Back">
                                <button class="btn btn-warning">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/posts/' . $post->id . '/edit') }}" title="Edit Post">
                            <button class="btn btn-primary">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </button>
                        </a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['posts', $post->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger',
                                    'title' => 'Delete Post',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}

                        <div class="table-responsive py-4">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $post->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $post->title }} </td></tr><tr><th> Content </th><td> {{ $post->content }} </td></tr><tr><th> Category </th><td> {{ $post->category }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
