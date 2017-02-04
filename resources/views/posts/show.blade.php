@extends('main')

@section('title', '| Posts Page')

@section('content')

    <div class="row">
        <div class="col-md-8">

            <h1>{{ $post->title }}</h1>
            <p class="lead">{{ $post->body }}</p>

        </div>

        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created at:</dt>
                    <dd>{{ date('j M Y \a\t H:i', strtotime($post->created_at)) }}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Last Update:</dt>
                    <dd>{{ date('j M Y \a\t H:i', strtotime($post->updated_at)) }}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {{-- Four parameters: Route, The Value of the button, Id of the post into ARRAY, optional parameters --}}
                        {!! Html::linkRoute('posts.edit', 'Edit', [$post->id], ['class' => 'btn btn-primary btn-block']) !!}
                        {{-- <a href="#" class="btn btn-primary btn-block">Edit</a> --}}
                    </div>
                    <div class="col-sm-6">
                        {{-- <a href="#" class="btn btn-danger btn-block">Delete</a> --}}
                        {!! Html::linkRoute('posts.destroy', 'Delete', [$post->id], ['class' => 'btn btn-danger btn-block']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
