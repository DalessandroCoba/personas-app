<?php

namespace App\Http\Controllers;

use App\Models\Comuna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\TryCatch;

class ComunaController extends Controller
{
    
public function index(){

    $datos = DB::select(" SELECT A.*,B.* FROM tb_comuna A, tb_municipio B where A.muni_codi  = B.muni_codi ");
    return view("welcome")->with("datos", $datos);

}

 public function create(Request $request){
 try{
     $sql = DB::insert(" INSERT INTO tb_comuna  (comu_codi, comu_nomb, Muni_codi) values (?,?,?)",[
         $request->comu_codi,
         $request->comu_nomb,
         $request->Muni_codi,
     ]);
 }catch(\Throwable $th){
 $sql = 0;
 }

 if ($sql == true){
     return back()->with("Correcto", "Se registro correctamente los datos");
 }else{
     return back()->with("Incorrecto", "No se pudo registrar los datos");
 }

 }

 public function update(Request $request){

     try{
         $sql = DB::update(" UPDATE tb_comuna SET comu_nomb=?, Muni_codi=? WHERE comu_codi=? ",[
             $request->comu_nomb,
             $request->Muni_codi,
         ]);
     }catch(\Throwable $th){
     $sql = 0;
     }

     if ($sql == true){
         return back()->with("Correcto", "Se edito correctamente los datos");
     }else{
         return back()->with("Incorrecto", "No se pudo editar los datos");
     }

 }

 public function delete($id){

    try{
        $sql = DB::delete(" DELETE FROM  ",[
        ]);
    }catch(\Throwable $th){
    $sql = 0;
    }

 }

}
