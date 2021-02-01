<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Cliente;

class ClienteController extends Controller{
    public function index(){
        $cliente = Cliente::all();

       return view('cliente.index', compact(['cliente']));
    }

    public function create(){
        return view('cliente.create');
    }

    public function store(Request $request){
        $cliente = new Cliente();
        $cliente -> nome = mb_strtoupper($request->input('nome'),'UTF-8');
        $cliente -> telefone = $request -> input('telefone');
        $cliente -> email = $request -> input('email');
        $cliente -> save();

        return redirect()->route('cliente.index');
    }

    public function show($id){
        $cliente = Cliente::find($id);

        return view('cliente.show')->with('cliente', $cliente);
    }

    public function edit($id){
        $cliente = Cliente::find($id);

        if(isset($cliente)){
            return view('cliente.edit', compact('cliente'));
        }
    }

    public function update(Request $request, $id){
        $cliente = Cliente::find($id);

        if(isset($cliente)){
            $cliente -> nome = mb_strtoupper($request->input('nome'),'UTF-8');
            $cliente -> telefone = $request -> input('telefone');
            $cliente -> email = $request -> input('email');
            $cliente -> save();
        }

        return redirect()->route('cliente.index');
    }

    public function destroy($id){
        $cliente = Cliente::find($id);
        $cliente->delete();

        return redirect()->route('cliente.index');
    }
}
