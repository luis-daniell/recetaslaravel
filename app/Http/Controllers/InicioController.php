<?php

namespace App\Http\Controllers;

use App\Receta;
use App\CategoriaReceta;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InicioController extends Controller
{
    //
    public function Index()
    {


        //Mostrar las recetas por la cantidad de votos

        // $votadas = Receta::has('likes', '>' , 1)->get();

        $votadas = Receta::withCount('likes')->orderBy('likes_count', 'desc')->take(3)->get();



        //Obtener las recetas mas nuevas

        // $nuevas = Receta::orderBy('created_at', 'ASC')->get();
        //Es lo mismo que la linea de arriba
        $nuevas = Receta::latest()->take(5)->get();

        //Obtener todas las categorias
        $categorias = CategoriaReceta::all();




        //Agrupar las recetas por categoria
        $recetas = [];

        foreach($categorias as $categoria){
            //RECORDAR QUE AL TENER UN ESPACIO LOS NOMBRES DE LAS CATEGORIAS ÚEDE CAUSAR
            //ERROR EN EL SERVIDOR
            //POR ELLO SE USA UN HELPER

            $recetas[ Str::slug($categoria->nombre) ][] = Receta::where('categoria_id', $categoria->id)->take(3)->get();
        }


        return view('inicio.index', compact('nuevas', 'recetas', 'votadas'));
    }
}
