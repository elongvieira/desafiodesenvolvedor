<?php

namespace App\Http\Controllers;

use App\Usuario;
use DateTime;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        return view('index',['usuarios'=>$usuarios]);
    }

    public function new() {
        $usuario = new Usuario();
        return view('usuario-cadastro', ['usuario'=>$usuario]);
    }

    public function store(Request $request) {

        $request->validate([
            'nome'=>'required|max:50',
            'sexo'=>'required',
            'data_nasc'=>'required'
        ]);

        $id = $request->input('id');

        if(!isset($id) || empty($id)){
            Usuario::create([
                'nome'=>$request->input('nome'),
                'sexo'=>$request->input('sexo'),
                'data_nasc'=>DateTime::createFromFormat('d/m/Y', $request->input('data_nasc'))
            ]);
        }else{
            $usuario = Usuario::find($id);

            $usuario->nome=$request->input('nome');
            $usuario->sexo=$request->input('sexo');
            $usuario->data_nasc=DateTime::createFromFormat('d/m/Y', $request->input('data_nasc'));

            $usuario->save();
        }

        return redirect()->route('usuarios')->with('info','Usuário adicionado');
    }

    public function edit($id) {

        $usuario = Usuario::find($id);

        return view('usuario-cadastro',['usuario'=> $usuario]);
    }

    public function destroy($id) {

        $usuario = Usuario::find($id);

        $usuario->delete();

        return redirect()->route('usuarios')->with('info','Usuário deletado');
    }

}
