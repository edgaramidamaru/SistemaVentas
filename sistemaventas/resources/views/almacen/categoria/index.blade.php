@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de categorias<a href="categoria/create"
        <button class="btn btn-success">Nuevo</button></a></h3>
        @include('almacen.categoria.search')

</div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered
             table-condensed table-hover">
            <thead>
                <th>Id</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Opciones</th>
            </thead>
            @foreach($categoria as $cat)
           <tr>
               <td>{{$cat->idcategoria}}</td>
               <td>{{$cat->nombre }}</td>
               <td>{{$cat->descripcion}}</td>
               <td>
             
               <a href="{{route('categoria.edit',$cat->idcategoria)}}"> 
                    <button class="btn btn-info">Editar</button></a>
               
              <form  method="POST" action="{{route('categoria.destroy',
                $cat->idcategoria)}}">
                  @csrf @method ('DELETE')
                  <button class="btn btn-danger">Eliminar</button>
              </form>
               </td>
           </tr>
           @endforeach
        </table>
        </div>
        {{$categoria->render()}}

    </div>
</div>
@endsection