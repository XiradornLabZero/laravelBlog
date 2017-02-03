@extends('main')

@section('title', '| Create Post')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>
            {{-- Collective\Html\HtmlServiceProvider::class-> |||| Classic way without aliases --}}
            {!! Form::open(['route' => 'posts.store']) !!}
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('text', null, ['class' => 'form-control']) }}

                {{ Form::label('body', "Post Body") }}
                {{ Form::textarea('body', null, ['class' => 'form-control']) }}

                {{ Form::submit('Create Post', ['class' => 'btn btn-success btn-lg btn-block', 'style' => "margin-top: 15px"]) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection
