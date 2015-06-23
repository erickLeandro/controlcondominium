@extends('layouts.scaffold')

@section('main')

<h1> {{ Lang::get('dwellers.title') }} </h1>

<p>{{ link_to_route('dwellers.create', Lang::get('dwellers.add') , null, array('class' => 'btn btn-lg btn-success')) }}</p>

@if(Session::has('success'))
    <div class="alert alert-success">
      {{ Session::get('success') }}
    </div>
@endif

@if (count($dwellers) > 0)
	<table class="table table-striped">
		<thead>
			<tr>
				<th>{{ Lang::get('dwellers.name') }}</th>
				<th>{{ Lang::get('dwellers.situation') }}</th>
				<th>{{ Lang::get('dwellers.numberApartament') }}</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($dwellers as $dweller)
				<tr>
					<td>{{{ $dweller->name }}}</td>
					<td>{{{ $dweller->situation }}}</td>
					<td>{{{ $dweller->number_apartament }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('dwellers.destroy', $dweller->id))) }}
                            {{ Form::submit(Lang::get('app.delete'), array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('dwellers.edit', Lang::get('app.edit'), array($dweller->id), array('class' => 'btn btn-info')) }}
                      	{{ link_to_route('dwellers.show', Lang::get('dwellers.show'), $dweller->id, array('class' => 'btn btn-warning')) }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	{{ Lang::get('app.notFoundData') }}
@endif

@stop
