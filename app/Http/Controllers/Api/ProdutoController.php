<?php

namespace App\Http\Controllers\Api;

use App\Models\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    private $produto;
    public function __construct(Produto $produto)
    {
        $this-> produto = $produto;
    }

    public function index(){
        $produto = produto::all();

        return response()->json(['$produto'=>$produto], 200);
    }

    public function show($id){
        try{
            $produto = $this->produto->findOrFail($id);

            return response()->json([
                'data' => [$produto
                ]
            ], 200);
        }catch(\Exception $e){
            return response()->json(['Erro' => $e->getMessage()], 401);
        }
    }

    public function store(Request $request){
        $data = $request->all();
        
        try{
            $produto = $this->produto->create($data);
            
            return response()->json([
                'data' => [
                    'msg' => 'produto cadastrado com sucesso'
                ]
                ], 200);
        }catch(\Exception $e){
            return response()->json(['Erro' => $e ->getMessage()], 401);
        }
    }

    public function update($id, Request $request){
        $data = $request->all();

        try{
            $produto = $this-> produto->findOrFail($id);
            $produto->update($data);
            
            return response()->json([
                'data'=>[
                    'msg' => 'produto atualizado com sucesso'
                ]
                ], 200);
        }catch(\Exception $e){
            return response()->json(['Erro' => $e->getMessage()], 401);
        }
    }

    public function destroy($id){

        try{
            $produto = $this->produto->findOrFail($id);
            $produto->delete();

            return response()->json([
                'data' => [
                    'msg' => 'produto excluido com sucesso'
                ]
                ], 200);
        }catch(\Exception $e){
            return response()->jdon(['Erro' => $e->getMessage()], 401);
        }
    }
}
