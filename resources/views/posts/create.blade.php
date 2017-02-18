@extends('main')

@section('title', '| Create Post')

@section('stylesheet')
    {{ Html::style('css/parsley.css') }}
    {{ Html::style('css/select2.min.css') }}
    <script src='//cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea',
            plugins: 'link code image imagetools',
            menubar: false, //for disable the top menubar
            // toolbar: false, //for disable the top toolbar
            // toolbar: "bold italic | copy paste", //for customize top toolbar
            // menu: {
            //     view: {title: "Edit", items: 'cut copy paste'}
            //     // for have only one menu in the menubar
            // }
        });
    </script>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Post</h1>
            <hr>
            {{-- Collective\Html\HtmlServiceProvider::class-> |||| Classic way without aliases --}}
            {{-- <form class="..." action="..." method=".." enctype="multipart/form-data"> - same as below --}}
            {!! Form::open(['route' => 'posts.store', 'data-parsley-validate' => '', "files" => true]) !!}
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

                {{ Form::label("featured_image", "Upload Featured Images") }}
                {{ Form::file("featured_image") }}

                {{ Form::label('body', "Post Body") }}
                {{ Form::textarea('body', null, ['class' => 'form-control']) }}

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
