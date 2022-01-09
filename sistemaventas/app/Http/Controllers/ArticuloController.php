<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Models\Articulo;
use DB;
use App\Http\Requests\ArticuloFormRequest;


class ArticuloController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request){
        if ($request) {
            $query=trim($request ->get('searchText'));
            $articulos=DB::table('articulo as a')
            -> join ('categoria as c','a.idcategoria','=',
            'c.idcategoria')
            ->select('a.idarticulo','a.nombre',
            'a.codigo','a.stock','c.nombre as categoria',
            'a.descripcion','a.imagen','a.estado')
            ->where('a.nombre','LIKE','%'.$query.'%')
            ->orwhere('a.codigo','LIKE','%'.$query.'%')
            ->orderBy('a.idarticulo','desc')
            ->paginate(10);
            return view('almacen.articulo.index',
            ["articulos"=>$articulos,"searchText"=>$query]);

        }

    }
    public function create(){
        $categorias=DB::table('categoria')
        ->where('condicion','=','1')
        ->get();
        return view("almacen.articulo.create",
        ["categorias"=>$categorias]);

    }
    public function store(ArticuloFormRequest $request){
        $articulo =new Articulo;
        $articulo->idcategoria=$request
        ->get('idcategoria');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->estado='Activo';
        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $file->move(public_path().'/imagenes/articulos/',
            $file->getClientOriginalName());
            $articulo->imagen=$file->getClientOriginalName();

        }
        $articulo->save();
        return Redirect::to('almacen/articulo');


    }
    public function show($id){
        return view ("almacen.articulo .show",
        ["articulo"=>Articulo::findOrFail($id)]);

    }
    public function edit($id){
        $articulo=Articulo::findOrFail($id);
        $categorias=DB::table('categoria')
        ->where('condicion','=','1')->get();
        return view ("almacen.articulo.edit",
        ["articulo"=>$articulo,"categorias"=>$categorias]);

    }
    public function update(ArticuloFormRequest $request,$id){
        $articulo=Articulo::findOrFail($id);
        $articulo->idcategoria=$request->get('idcategoria');
        $articulo->codigo=$request->get('codigo');
        $articulo->nombre=$request->get('nombre');
        $articulo->stock=$request->get('stock');
        $articulo->descripcion=$request->get('descripcion');
        if($request->hasFile('imagen')){
            $file=$request->file('imagen');
            $file->move(public_path().'/imagenes/articulos/'
            ,$file->getClientOriginalName());
            $articulo->imagen=$file->getClientOriginalName();

        }
        $articulo->update();
        return Redirect::to('almacen/articulo');

    }
    public function destroy($id){
        $articulo=Articulo::findOrFail($id);
        $articulo->estado='Inactivo';
        $articulo->update();
        return Redirect::to('almacen/articulo');

    }
}
 