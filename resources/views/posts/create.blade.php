@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Create New Post
                        <div class="text-right">
                            <a href="{{ url('/posts') }}" title="Back">
                                <button class="btn btn-warning">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/posts', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('posts.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
