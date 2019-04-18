@extends('templates.master')

@section('conteudo-view')
<head>
	<h1>{{$instituiton->nome}}</h1>


</head>	
@include('groups.list',['groups_list' => $instituiton->groups])
@endsection