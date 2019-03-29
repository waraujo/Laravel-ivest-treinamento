@extends('templates.master')

@section('conteudo-view')

<!-- Comando para checar se existe uma mensagem gravada na variavel de sessão-->
	@if(session('sucess'))
		<h3>{{session('sucess')['message']}}</h3>
	@endif
<!-- crindo formulario de cadastro e instituição-->
{!! Form::open(['route'=>'instituiton.store','method'=>'post','class'=>'form-padrao']) !!}
@include('templates.formulario.input',['label'=>'Nome','input'=>'nome','attributes'=>['placeholder'=>'Nome']])
@include('templates.formulario.submit',['input'=>'cadastrar'])
{!! Form::close()!!}

<table class="dafault-table">
	<thead>
		<tr>
			<th>#</th>
			<th>Nome instituição</th>
			<th>opção</th>		

		</tr>
	</thead>
	<tbody>
<!-- Laço de repetição para preencher tabela com os dados retornados do banco.-->		
	@foreach($instituiton as $inst)
		<tr>
			<td>{{$inst->id}}</td>
			<td>{{$inst->nome}}</td>
			<td>
<!-- Criando formulario para informar ID do registro que deve ser excluido -->
				{!! Form::open(['route'=>['instituiton.destroy',$inst->id],'method' => 'DELETE'])!!}
				{!! Form::submit("Remover")!!}
				{!! Form::close()!!}
			</td>
		</tr>
	@endforeach
		
	</tbody>

</table>

@endsection