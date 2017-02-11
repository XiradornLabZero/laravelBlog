@extends('main')

@section('title', '| Forgot My Password')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Email Password</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-info">
                            Email sent with a Reset Link !!!
                        </div>
                    @endif

                    {!! Form::open(['url' => 'password/email', 'method' => "POST"]) !!}

                    {{ Form::label('email', "Email:") }}
                    {{ Form::email('email', null, ["class" => "form-control"]) }}

                    <hr>

                    {{ Form::submit('Reset Password', ["class" => "btn btn-primary "]) }}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
