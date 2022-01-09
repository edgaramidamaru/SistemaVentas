@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Lista de Ventas<a href="venta/create"><button class="btn btn-success">Nuevo</button></a></h3>
        @include('ventas.venta.search')
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed
            table-hover">
            <thead>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Comprobante</th>
                <th>Impuesto</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Opciones</th>                
            </thead>
            @foreach($ventas as $ven)
            <tr>
                <td>{{$ven->fecha_hora}}</td>
                <td>{{$ven->nombre}}</td>
                <td>{{$ven->tipo_comprobante.':'.$ven->serie_comprobante.'-'.$ven->num_comprobante}}</td>
                <td>{{$ven->impuesto}}</td>
                <td>{{$ven->total_venta}}</td>
                <td>{{$ven->estado}}</td>
                <td>
                    <a href="{{route('venta.show',$ven->idventa )}}">
                        <button class="btn btn-primary">Detalles</button>
                    </a>
                    <form method ="POST" action="{{route('venta.destroy',$ven->idventa)}}}">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Anular</button>
                </form> 
                </td>
            </tr>
            @endforeach
            </table>
        </div>
        {{$ventas->render()}}
    </div>

</div>
@endsection