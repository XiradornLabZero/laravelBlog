@extends('main')

@section('title', '| Blog Post Edit')

@section('stylesheet')
    {{ Html::style('css/select2.min.css') }}
@endsection

@section('content')

    <div class="row">
        <div class="col-md-8">
            {{-- whit not OPEN but MODEL we said to laravel that the for connect to the model for bind data --}}
            {!! Form::model($post, ['route' => ['posts.update', $post->id], "method" => "PUT"]) !!}

            {{ Form::label('title', 'Title:') }}
            {{-- <h1>{{ $post->title }}</h1> --}}
            {{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

            {{ Form::label('category_id', 'Category:', ["class" => "form-spacing-top"]) }}
            {{-- {{ Form::select('category_id', ['key' => 'value', 'key2' => 'value2']) }} but is NOT recomended - generate this into controller --}}
            {{-- {{ Form::select('category_id', $categories, $post->category_id, ["class" => "form-control"]) }} - $post->category_id is the current and w/ model form binding is not required --}}
            {{ Form::select('category_id', $categories, null, ["class" => "form-control"]) }}

            {{ Form::label('tags', 'Tags:', ["class" => "form-spacing-top"]) }}
            {{ Form::select('tags[]', $tags, null, ["class" => "form-control select2-multi", "multiple" => "multiple"]) }}

            {{ Form::label('slug', "Slug:", ["class" => "form-spacing-top"]) }}
            {{ Form::text('slug', null, ["class" => 'form-control']) }}

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
                        {{-- {!! Html::linkRoute('posts.update', 'Save Changes', [$post->id], ['class' => 'btn btn-success btn-block']) !!} --}}
                        {{ Form::submit('Save Changes', ["class" => "btn btn-success btn-block"]) }}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div> <!-- end of the form -->

@stop

@section('scripts')
    {{ Html::script('js/select2.full.min.js') }}
    <script type="text/javascript">
        $('.select2-multi').select2();
        // for a programatic access to the data we mus set params from the api of select2 docs
        $('.select2-multi').select2().val({!! json_encode($post->tags->pluck('id')) !!}).trigger('change');
    </script>
@endsection
