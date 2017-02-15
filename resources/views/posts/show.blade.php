@extends('main')

@section('title', '| Posts Page')

@section('content')

    <div class="row">
        <div class="col-md-8">

            <h1>{{ $post->title }}</h1>
            <p class="lead">{{ $post->body }}</p>
            <hr>
            <div class="tags">
                @foreach ($post->tags as $tag)
                    <span class="label label-default">{{ $tag->name }}</span>
                @endforeach
            </div>

            <div id="backhend-comments">
                <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Comment</th>
                            <th style="width: 80px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post->comments as $comment)
                            <tr>
                                <td>{{ $comment->name }}</td>
                                <td>{{ $comment->email }}</td>
                                <td>{{ $comment->comment }}</td>
                                <td>
                                    <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
                                    <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-4">
            <div class="well text-center">
                <dl>
                    <dt>Url Slug:</dt>
                    {{-- <dd><a href="{{ url("blog/$post->slug") }}">{{ url($post->slug) }}</a></dd> --}}
                    {{-- equivalent --}}
                    <dd><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></dd>
                </dl>
                <dl>
                    <dt>Category:</dt>
                    <dd>{{ $post->category->name }}</dd>
                </dl>
                <dl>
                    <dt>Created At:</dt>
                    <dd>{{ date('j M Y \a\t H:i', strtotime($post->created_at)) }}</dd>
                </dl>
                <dl>
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
                        {!! Form::open(["route" => ["posts.destroy", $post->id], "method" => "DELETE"]) !!}
                        {{-- <a href="#" class="btn btn-danger btn-block">Delete</a> --}}
                        {{-- {!! Html::linkRoute('posts.destroy', 'Delete', [$post->id], ['class' => 'btn btn-danger btn-block']) !!} --}}
                        {{ Form::submit('Delete', ["class" => "btn btn-danger btn-block"]) }}
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        {{-- <a href="{{ route('posts.index') }}" class="btn btn-default btn-block"> &laquo; See all Posts</a> --}}
                        {!! Html::linkRoute("posts.index", "<< See All Posts", [], ["class" => "btn btn-default btn-block btn-h1-spacing"]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
