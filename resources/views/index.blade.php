@extends('master')
@section('title','Usuários')
@section('content')

<div>
    <h3>
        Usuários - <small><a href="{{route('usuario.new')}}">Novo usuário</a></small>
    </h3>
</div>

<table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Sexo</th>
        <th>Data Nasc.</th>
        <th>Data/Hora Cadastro</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        @foreach($usuarios ?? '' as $usuarios)
        <tr class = "text-center">
            <td class="text-left">{{ $usuarios->id }}</td>
            <td class="text-left">{{ $usuarios->nome }}</td>
            <td class="text-left">{{ $usuarios->sexo=='f'?'feminino':($usuarios->sexo=='f'?'masculino':'outro')}}</td>
            <td class="text-left">{{ date('d/m/Y', strtotime($usuarios->data_nasc))}}</td>
            <td class="text-left">{{ date('d/m/Y H:i', strtotime($usuarios->created_at))}}</td>
            <td class="text-right">
                <a href="{{route('usuarios.edit',['id'=>$usuarios->id])}}" class = "btn btn-info">Alterar</a>
                <a href="{{route('usuarios.delete',['id'=>$usuarios->id])}}" class = "btn btn-danger">Deletar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection
