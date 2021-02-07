<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Veterinario as Veterinario;
use App\Especialidade as Especialidade;

class VeterinarioController extends Controller{
   
    public function index(){
        $veterinario = Veterinario::all();

        return view('veterinario.index', compact(['veterinario']));
    }
    
    public function create(){
        $especialidade = Especialidade::all();

        return view('veterinario.create', compact('especialidade'));
    }

    public function store(Request $request){
        Veterinario::create([
            'nome' => $request->nome,
            'crmv' => $request->crmv,
            'especialidade_id' => $request->especialidade
        ]);


        return redirect()->route('veterinario.index');
    }

    public function show($id){
        $veterinario = Veterinario::find($id);

        return view('veterinario.show')->with('veterinario', $veterinario);
    }

    public function edit($id){
        $dados = Veterinario::find($id);
        $especialidade = Especialidade::all();

        return view('veterinario.edit', ['dados' => $dados, 'especialidade' => $especialidade]);
    }

    public function update(Request $request, $id){
        $veterinario = Veterinario::find($id);

        $veterinario->fill([

            'nome' => $request->nome,
            'crmv' => $request->crmv,
            'especialidade_id' => $request->especialidade
        ]);


        $veterinario->save();

        return redirect()->route('veterinario.index');
    }

    public function destroy($id){
        $veterinario = veterinario::find($id);

        $veterinario->delete();

        return redirect()->route('veterinario.index');
    }
}
