@extends('main')

@section('title', '| Categories Page')

@section('content')

    <div class="row">

        <div class="col-md-8">
            <h1>Categories:</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <div class="well">

                {!! Form::open(['route' => 'categories.store', 'method' => 'POST']) !!}
                    <h2>Category Form</h2>

                    {{ Form::label('name', 'Name:') }}
                    {{ Form::text('name', null, ["class" => "form-control"]) }}

                    {{ Form::submit("Submit Category", ["class" => "btn btn-primary btn-block form-spacing-top"]) }}
                {!! Form::close() !!}

            </div>
        </div>

    </div>

@endsection
