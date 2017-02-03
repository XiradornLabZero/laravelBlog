@extends('main')

@section('title', '| Create Post')

@section('stylesheet')
    {{ Html::style('css/parsley.css') }}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>
            {{-- Collective\Html\HtmlServiceProvider::class-> |||| Classic way without aliases --}}
            {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '']) !!}
                {{ Form::label('title', 'Title:') }}
                {{ Form::text('title', null, ['class' => 'form-control', 'required' => '', 'maxlength' => '191']) }}

                {{ Form::label('body', "Post Body") }}
                {{ Form::textarea('body', null, ['class' => 'form-control', 'required' => '']) }}

                {{ Form::submit('Create Post', ['class' => 'btn btn-success btn-lg btn-block', 'style' => "margin-top: 15px"]) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('scripts')
    {{ Html::script('js/parsley.min.js') }}
@endsection
