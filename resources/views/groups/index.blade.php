@extends('templates.master')

@section('conteudo-view')

@if(session('sucess'))
		<h3>{{session('sucess')['message']}}</h3>
	@endif

<!-- crindo formulario de cadastro e instituição-->
{!! Form::open(['route'=>'group.store','method'=>'post','class'=>'form-padrao']) !!}
@include('templates.formulario.input',['label'=>'Nome do grupo','input'=>'nome','attributes'=>['placeholder'=>'Nome do grupo']])
@include('templates.formulario.select',['label'=>'User','select'=>'user_id', 'data' =>$user_list ,'attributes'=>['placeholder'=>'User']])
@include('templates.formulario.select',['label'=>'instituiton','select'=>'instituition_id','data' =>$instituiton_list ,'attributes'=>['placeholder'=>'instituiton']])
@include('templates.formulario.submit',['input'=>'cadastrar'])
{!! Form::close()!!}

@include('groups.list',['groups_list' => $groups])

@endsection