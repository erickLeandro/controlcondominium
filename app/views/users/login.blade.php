@extends('layouts.scaffold')

@section('main')

{{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
    <h2 class="form-signin-heading">Login</h2>
    
    <div class="form-group">
      {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
    </div>
    <div class="form-group">
      {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
    </div>
    {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}
    <div class="form-group" style="text-align:center">
        <h6> <a href="users/create"> Não possui conta ainda? clique aqui</a> </h6>
    </div>
{{ Form::close() }}


@stop
