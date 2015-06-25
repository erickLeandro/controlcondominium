@extends('layouts.scaffold')

@section('main')

<h1>{{ Lang::get('reports.title') }}</h1>

	<table class="table table-striped">
		<thead>
			<tr>
				<th> {{ Lang::get('reports.description') }} </th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td>Relatório do mural</td>
				<td>{{ link_to('report/mural', Lang::get('reports.generate'), 'class="cast btn btn-warning"') }}</td>
			</tr>
			<tr>
				<td>Relatório débitos de moradores</td>
				<td>{{ link_to('report/debtsDwellers', Lang::get('reports.generate'), 'class="cast btn btn-warning"') }}</td>
			</tr>
		</tbody>
	</table>
@stop
