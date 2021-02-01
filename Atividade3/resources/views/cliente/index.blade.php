@extends('templates.main', ['titulo'=> "Clientes", 'tag' => "CLI"])

@section('titulo') Clientes @endsection

@section('conteudo')

<div class="row">
    <div class="col-sm-12">
        <a href="{{route('cliente.create')}}" class="btn btn-primary btn-block">
            <b>Novo Cliente</b>
        </a>
    </div>
</div>
<br>

<x-tablelistCliente :header="['Nome','Eventos']" :data="$cliente"/>

@endsection