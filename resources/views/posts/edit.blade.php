@extends('main')

@section('title', '| Blog Post Edit')

@section('content')

    <div class="row">
        <div class="col-md-8">
            {{-- whit not OPEN but MODEL we said to laravel that the for connect to the model for bind data --}}
            {!! Form::model($post, ['route' => ['posts.update', $post->id]]) !!}

            {{ Form::label('title', 'Title:') }}
            {{-- <h1>{{ $post->title }}</h1> --}}
            {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

            {{ Form::label('body', 'Body:', ["class" => "form-spacing-top"]) }}
            {{-- <p class="lead">{{ $post->body }}</p> --}}
            {{ Form::textarea('body', null, ["class" => "form-control"]) }}

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
                        {!! Html::linkRoute('posts.show', 'Cancel', [$post->id], ['class' => 'btn btn-danger btn-block']) !!}
                        {{-- <a href="#" class="btn btn-danger btn-block">Cancel</a> --}}
                    </div>
                    <div class="col-sm-6">
                        {{-- <a href="#" class="btn btn-success btn-block">'Save Changes</a> --}}
                        {!! Html::linkRoute('posts.update', 'Save Changes', [$post->id], ['class' => 'btn btn-success btn-block']) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div> <!-- end of the form -->

@stop