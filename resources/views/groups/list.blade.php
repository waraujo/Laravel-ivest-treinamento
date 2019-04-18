<table class="dafault-table">
	<thead>
		<tr>
			<th>#</th>
			<th>Nome do grupo</th>
			<th>Instituição</th>
			<th>Nome do Responsavel</th>
			<th>Opções</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($groups_list as $group)
			<tr>
				<td>{{ $group->id}}</td>
				<td>{{ $group->nome}}</td>
				<td>{{ $group->instituition->nome}}</td>
				<td>{{ $group->owner->nome}}</td>
				
				<td>

<!-- formulario para exclusão de usuarios -->
 
					{!! Form::open(['route'=>['group.destroy',$group->id],'method' => 'DELETE'])!!}

					{!! Form::submit('Remmover') !!}

					{!! Form::close()!!}
					<a href="{{ route('group.show',[$group->id]) }}">Detalhe</a>
				</td>				

			</tr>
		@endforeach
	</tbody>
</table>