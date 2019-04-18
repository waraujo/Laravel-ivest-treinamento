@extends('templates.master')


@section('conteudo-view')
<head>
<h1>Nome do grupo: {{$group->nome}}</h1>
<h2>Instituição  : {{$group->instituition->nome}}</h2>
<h2>Responsavel  : {{$group->owner->nome}}</h2>
</head>


{!! Form::open(['route'=>['group.user.store',$group->id],'method'=>'post','class'=>'form-padrao']) !!}
	@include('templates.formulario.select',[
		'label'		=> "Usuarios",
		'select' 	=>'user_id',
		'data' 		=> $user_list,
		'atributes' => ['placeholder' => "?Usuarios"]
	])
	@include('templates.formulario.submit',['input' => 'Relacionar ao Grupo'.$group->nome])

{!!Form::close()!!}
@endsection