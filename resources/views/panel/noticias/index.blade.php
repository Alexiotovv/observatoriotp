@extends('panel.base')

@section('extra_css')
    <link href="../../../panel/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endsection
@section('contenido')
<div class="card">
    <div class="card-body">
        {{-- aqui es el contenido --}}
        <div class="row">
            <div class="col-sm-6">
                <h5>Noticias</h5>
            </div>
            <div class="col-sm-6" style="text-align-last: end">
                <a class="btn btn-primary btn-sm" href="{{route('panel.noticias.create')}}"><i class="lni lni-circle-plus"></i>Nueva Noticia</a>
            </div>
        </div>
        @if(Session::has('mensaje'))
            <div class="col-sm-4">
                <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-success">Registro Guardado</h6>
                            <div>El registro se guardó correctamente!</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            
        @endif

        <div class="table table-container">
            <table class="table table-striped table-bordered" id="dtnoticias">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Acción</th>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Contenido</th>
                        <th>Fecha</th>
                        <th>Imagen</th>
                        <th>Slider</th>
                        <th>Portada</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($noticias as $n)                    
                        <tr>
                            <td>{{$n->id}}</td>
                            <td>
                                <a href="{{route('panel.noticias.edit',$n->id)}}" class="btn btn-warning btn-sm"><i class="fadeIn animated bx bx-pencil"></i></a>
                            </td>
                            <td>{{$n->titulo}}</td>
                            <td>{{$n->description}}</td>
                            <td>{!! $n['contenido'] !!}</td>
                            <td>{{$n->fecha}}</td>
                            <td>
                                <img src="{{asset('storage/noticias/'.$n->ruta_foto)}}" style="height: 120px;" alt="">
                                
                            </td>
                            <td>{{$n->slider}}</td>
                            <td>{{$n->portada}}</td>
                            <td>{{$n->estado}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>

</div>
@endsection
@section('extra_js')
    <script>
        $("#dtnoticias").DataTable({
            order:[0],
            columnDefs: [
            // { width: "10px", targets: 0 },
            // { width: "40px", targets: 1 },
            { width: "350px", targets: 2 },
            
            ]
    
        });
    </script>


    <script src="../../../panel/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="../../../panel/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src="../../../panel/assets/js/table-datatable.js"></script>

@endsection