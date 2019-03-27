@extends('templates.master')

@section('css-view')
@endsection()
@section('js-view')
@endsection()
@section('conteudo-view')
	@if(session('sucess'))
		<h3>{{session('sucess')['message']}}</h3>
	@else
		<h3>{{session('sucess')['message']}}</h3>
	@endif
    {!! Form::open(['route'=>'user.store','method'=>'post','class'=>'form-padrao']) !!}
        @include('templates.formulario.input',['label'=>'CPF','input'=>'cpf','attributes'=>['placeholder'=>'CPF']])
        @include('templates.formulario.input',['label'=>'NOME','input'=>'nome','attributes'=>['placeholder'=>'nome']])
        @include('templates.formulario.input',['label'=>'Phone','input'=>'phone','attributes'=>['placeholder'=>'phone']])
        @include('templates.formulario.input',['label'=>'E-mail','input'=>'email','attributes'=>['placeholder'=>'email']])
        @include('templates.formulario.password',['input'=>'password','attributes'=>['placeholder'=>'password']])
        @include('templates.formulario.submit',['input'=>'cadastrar'])
     {!! Form::close() !!}
	
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
			</tr>
		</thead>
		<tbody>
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
			</tr>
		@endforeach 

		</tbody>
	</table>
@endsection()



