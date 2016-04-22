{{--

    * Created by   :  Muhammad Yasir
    * Project Name : packeges
    * Product Name : PhpStorm
    * Date         : 22-Apr-16 12:08 PM
    * File Name    : 

--}}
@extends('Messenger::layouts.master')

@section('content')
    <h1>Create a new message</h1>
    {!! Form::open(['route' => 'messenger.store']) !!}
    <div class="col-md-6">
        <!-- Subject Form Input -->
        <div class="form-group">
            {!! Form::label('subject', 'Subject', ['class' => 'control-label']) !!}
            {!! Form::text('subject', NULL, ['class' => 'form-control']) !!}
        </div>

        <!-- Message Form Input -->
        <div class="form-group">
            {!! Form::label('message', 'Message', ['class' => 'control-label']) !!}
            {!! Form::textarea('message', NULL, ['class' => 'form-control']) !!}
        </div>

        @if($users->count() > 0)
            <div class="checkbox">
                @foreach($users as $user)
                    <label title="{!!$user->name!!}"><input type="checkbox" name="recipients[]"
                                                            value="{!!$user->id!!}">{!!$user->name!!}</label>
                @endforeach
            </div>
            @endif

                    <!-- Submit Form Input -->
            <div class="form-group">
                {!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
            </div>
    </div>
    {!! Form::close() !!}
@stop
