@extends('master')
@section('title','Usuário')
@section('content')

<div>
    <h3>
        Usuários - <small><a href="{{route('usuarios')}}">Ver todos</a></small>
    </h3>
</div>


@if($errors->any())
<div class="alert alert-danger">
    @foreach ($errors->all() as $error)
      <p>{{ $error }}</p>
    @endforeach
</div>
@endif

<form action="{{route('usuarios.store')}}" method="POST">
    @csrf

    <input type="hidden" name="id" value="{{$usuario->id}}">
    <div class="form-group">
        <label for="nome">Nome:</label>
        <input type="text" class="form-control" id="nome" name="nome" value="{{$usuario->nome}}">
    </div>
    <div class="form-group">
    <label for="sexo">Sexo:</label>
    <select class="form-control" id="sexo" name="sexo">
        <option value=""></option>
        <option value="m" @if($usuario->sexo==='m') selected @endif>Masculino</option>
        <option value="f" @if($usuario->sexo==='f') selected @endif>Feminino</option>
        <option value="o" @if($usuario->sexo==='o') selected @endif>Outro</option>
    </select>
    </div>
    <div class="form-group">
        <label for="data_nasc">Data de Nascimento:</label>
        <input type="text" class="form-control" id="data_nasc" name="data_nasc" value="{{isset($usuario->id)?date('d/m/Y', strtotime($usuario->data_nasc)):''}}">
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
</form>

<script>
    $(document).ready(function () {
        $("#data_nasc").mask("99/99/9999");
    });
</script>

@endsection
