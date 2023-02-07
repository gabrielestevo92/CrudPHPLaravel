<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Clientes;

class ClientesController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function clientes(){
        $clientes = Clientes::all();
        //$busca = request('search');
    return view('clientes', ['clientes' => $clientes]);

    }

    public function cliente($id){
       
        return view('cliente', ['id' => $id]);
    
    }

    public function salvar(Request $request){
        $cliente = new Clientes;
        $cliente ->name = $request ->name;
        $cliente ->endereco = $request ->endereco;        
        $cliente ->latitude = $request ->latitude;
        $cliente ->longitude = $request ->longitude;
        $cliente ->description = $request ->description;
        $cliente ->status = $request ->status;

        $cliente ->save();

        return redirect('/clientes');

    }

    public function destroy($id){

        Clientes::findOrfail($id)->delete();

        return redirect('/clientes')->with('msg','Cliente excluido com sucesso!');
    }

    public function update(Request $request){
       Clientes::findOrFail($request -> id) ->update($request -> all());

       return redirect('/clientes')->with('msg', 'Cliente editado com sucesso!');
    }

    public function maps(){
        return view('maps');
    }
}