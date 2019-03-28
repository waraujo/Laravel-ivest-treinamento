@extends('templates.master')

@section('css-view')
@endsection()
@section('js-view')
@endsection()
@section('conteudo-view')
/** 
 * comando para manipular sessão na pagina
 */
	@if(session('sucess'))
		<h3>{{session('sucess')['message']}}</h3>
	@else
		<h3>{{session('sucess')['message']}}</h3>
	@endif
/**
 * formulario para cadastro de usuarios usando template para incluir campos
 */
    {!! Form::open(['route'=>'user.store','method'=>'post','class'=>'form-padrao']) !!}
        @include('templates.formulario.input',['label'=>'CPF','input'=>'cpf','attributes'=>['placeholder'=>'CPF']])
        @include('templates.formulario.input',['label'=>'NOME','input'=>'nome','attributes'=>['placeholder'=>'nome']])
        @include('templates.formulario.input',['label'=>'Phone','input'=>'phone','attributes'=>['placeholder'=>'phone']])
        @include('templates.formulario.input',['label'=>'E-mail','input'=>'email','attributes'=>['placeholder'=>'email']])
        @include('templates.formulario.password',['input'=>'password','attributes'=>['placeholder'=>'password']])
        @include('templates.formulario.submit',['input'=>'cadastrar'])
     {!! Form::close() !!}
/**
 * Tabela para demonstrar usuarios cadastrados via variavel de pagina
 */
	<table class="dafault-table">
		<thead>
			<tr>
				<th>#</th>
				<th>CPF</th>
				<th>NOME</th>
				<th>TELEFONE</th>
				<th>IDADE</th>
				<th>GENERO         </th>
				<th>EMAIL</th>
				<th>STATUS</th>
				<th>MENU</th>
			</tr>
		</thead>
		<tbody>
/**
 * laço de repetição para preencher os usuarios cadastrados.
 */
		@foreach($users as $user)
			<tr>
				<td>{{$user->id}}</td>
				<td>{{$user->cpf}}</td>
				<td>{{$user->nome}}</td>
				<td>{{$user->phone}}</td>
				<td>{{$user->birth}}</td>
				<td>{{$user->gender}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->status}}</td>
				<td>
/**
 * formulario para exclusão de usuarios
 */
					{!! Form::open(['route'=>['user.destroy',$user->id],'method' => 'DELETE'])!!}

					{!! Form::submit('Remmover') !!}

					{!! Form::close()!!}
				</td>
			</tr>
		@endforeach 

		</tbody>
	</table>
@endsection()



