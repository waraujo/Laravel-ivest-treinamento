@extends('templates.master')

@section('conteudo-view')

	@if(session('sucess'))
		<h3>{{session('sucess')['message']}}</h3>
	@endif

{!! Form::open(['route'=>'instituiton.store','method'=>'post','class'=>'form-padrao']) !!}
@include('templates.formulario.input',['label'=>'Nome','input'=>'name','attributes'=>['placeholder'=>'Nome']])
@include('templates.formulario.submit',['input'=>'cadastrar'])
{!! Form::close()!!}

<table class="dafault-table">
	<thead>
		<th>#</th>
		<th>Nome instituição</th>
		<th>opção</th>
	</thead>
	<tbody>
		@foreach($instituiton as $inst)
			<tr>{{$inst->id}}</tr>
			<tr>{{$inst->nome}}</tr>
			<tr>
				{!! Form::open(['route'=>['instituiton.index',$inst->id],'method' => 'DELETE'])!!}
				{!! Form::submit("Remover")!!}
				{!! Form::close()!!}
			</tr>
		@endforeach
		
	</tbody>

</table>

@endsection