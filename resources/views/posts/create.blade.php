@extends('main')

@section('title', '| Create Post')

@section('stylesheet')
    {{ Html::style('css/parsley.css') }}
    {{ Html::style('css/select2.min.css') }}
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

                {{ Form::label('slug', 'Slug:') }}
                {{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '191']) }}

                {{ Form::label('category_id', 'Category:') }}
                <select class="form-control" name="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('tags', 'Tags:') }}
                <select class="form-control select2-multi" name="tags[]" multiple="true">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>

                {{ Form::label('body', "Post Body") }}
                {{ Form::textarea('body', null, ['class' => 'form-control', 'required' => '']) }}

                {{ Form::submit('Create Post', ['class' => 'btn btn-success btn-lg btn-block', 'style' => "margin-top: 15px"]) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('scripts')
    {{ Html::script('js/parsley.min.js') }}
    {{ Html::script('js/select2.full.min.js') }}

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection
