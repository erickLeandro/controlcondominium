@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>{{ Lang::get('apartments.createApartment') }}</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::open(array('route' => 'apartments.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            {{ Form::label(Lang::get('apartments.number'), Lang::get('apartments.number'), array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::input('number', 'number_apartment', Input::old('number_apartment'), array('class'=>'form-control')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label(Lang::get('apartments.status'), Lang::get('apartments.status'), array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
                {{ Form::select('status', [
                    '1' => Lang::get('app.active'),
                    '0' => Lang::get('app.inactive'),]
                ) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit(Lang::get('app.create'), array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('apartments.index', Lang::get('app.cancel'), null, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop


