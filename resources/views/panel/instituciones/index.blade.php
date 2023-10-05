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
                <h5>Instituciones</h5>
            </div>
            <div class="col-sm-6" style="text-align-last: end">
                <a class="btn btn-primary btn-sm" href="{{route('panel.instituciones.create')}}"><i class="lni lni-circle-plus"></i>Nueva Institución</a>
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
            <table class="table table-hover table-striped table-bordered" id="dtinstituciones">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Estadística</th>
                        <th>Logo</th>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Contenido</th>
                        <th>Acción</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($instituciones as $d)                    
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>
                                @foreach ($estadistica as $e)
                                    @if ($d->id==$e->idinstituciones)
                                        <div class="input-group">
                                            <a href="{{route('panel.estadistica.create',$d->id)}}" class="btn btn-success btn-sm"><i class="fadeIn animated bx bx-plus"></i></a>
                                            <a href="{{route('panel.estadistica.edit',$e->id)}}" class="btn btn-warning btn-sm"><i class="bx bx-pencil"></i></a>
                                        </div>
                                        <h5>Año: {{$e->ano}}</h5>
                                        <i class="bx bx-folder-plus"></i>{{$e->titulo}}<br>
                                        @foreach ($archivos as $a)
                                            @if ($a->idestadistica==$e->id)                                                
                                                <a href="{{asset('storage/estadistica/'.$a->archivo)}}" style="padding-left:10px">{{$a->archivo}}</a><br>
                                            @endif
                                        @endforeach
                                    @endif
                                    <hr>
                                @endforeach     
                            </td>
                            <td style="text-align: center">
                                <img src="{{asset('storage/instituciones/'.$d->ruta_logo)}}" style="height: 80px;" alt="">
                            </td>
                            <td>{{$d->titulo}}</td>
                            <td>{{$d->descripcion}}</td>
                            <td>{!! $d['contenido'] !!}</td>
                            <td>
                                <a href="{{route('panel.instituciones.edit',$d->id)}}" class="btn btn-warning btn-sm"><i class="fadeIn animated bx bx-pencil"></i></a>
                                
                            </td>
                            <td>{{$d->estado}}</td>
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
        $("#dtinstituciones").DataTable({
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