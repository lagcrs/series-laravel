<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller{

    //funcao que lista
    public function index(Request $request){
        echo $request->url();
     
        //busca todos os registros da tabela serie ordenado por nome
        $series = Serie::query()->orderBy('nome')->get();

        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');
      
    
        return view('series.index', compact('series', 'mensagem'));
    }

    //funcão que mostra tela cadastro serie
    public function create(){
        return view('series.create');
    }

    //funcao que armazena serie criada
    public function store(SeriesFormRequest $request){
        $nome = $request->nome;
        var_dump($nome);

       // $serie = Serie::create([ 'nome' => $nome]);

       $serie = Serie::create($request->all());

        //echo "Série com id {$serie->id} criada: {$serie->nome}";

        $request->session()->flash('mensagem', "Série {$serie->id} criada com sucesso {$serie->nome}");

        return redirect()->route('listar_series');

        //$serie = new Serie();
        //$serie->nome = $nome;
        //var_dump($serie->save());
    }

    //funcao excluir
    public function destroy(Request $request){
        Serie::destroy($request->id);

        $request->session()->flash('mensagem', "A série foi removida com sucesso!");

        return redirect()->route('listar_series');
    }
}
