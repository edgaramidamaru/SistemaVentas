@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <h3>Editar Cliente:{{$persona->nombre}}</h3>
        @if(count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
</div>
</div>
          
        {!!Form::model($persona,['method'=>'PATCH',
            'route'=>['cliente.update',$persona->
            idpersona]])!!}
        {{Form::token()}}
        <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre"
            class="form-control"  value="{{$persona->nombre }}" placeholder="Nombre...">
        </div>
        </div>        
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="direccion">Direccion</label>
            <input type="text" name="direccion"
             class="form-control" value="{{$persona->direccion }}" placeholder="Direccion...">
        </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Documento</label>
                <select name="tipo_documento" class="form-control">
                @if($persona->tipo_documento=='CI')    
                <option value="CI" selected>C.I.</option>
                    <option value="NIT">NIT</option>
                    <option value="PAS">PASAPORTE</option>
                @elseif($persona->tipo_documento==NIT)
                    <option value="CI" >C.I.</option>
                    <option value="NIT"selected>NIT</option>
                    <option value="PAS">PASAPORTE</option>
                    @else
                    <option value="CI" >C.I.</option>
                    <option value="NIT">NIT</option>
                    <option value="PAS"selected >PASAPORTE</option>
                    @endif
                </select>
            </div>

        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="num_documento">Numero de Documento</label>
            <input type="text" name="num_documento"
             class="form-control" value="{{$persona->num_documento}}" placeholder="Numero de Documento...">
        </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="text" name="telefono"
             class="form-control" value="{{$persona->telefono}}" placeholder="Telefono....">
        </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email"
             class="form-control" value="{{$persona->email}}" placeholder="Email....">
        </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Guardar</button>
            <button class="btn btn-danger" type="reset">Cancelar</button>
        </div>
        </div>
        </div>
        
        {!!Form::close()!!}
    
@endsection