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
                <h5>Periodos</h5>
            </div>
            <div class="col-sm-6" style="text-align-last: end">
                <a class="btn btn-primary btn-sm" href="{{route('panel.periodos.create')}}"><i class="lni lni-circle-plus"></i>Nuevo Periodo</a>
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
            <table class="table table-striped table-bordered" id="dtperiodos">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Acción</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($periodos as $d)                    
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>
                                <a href="{{route('panel.periodos.edit',$d->id)}}" class="btn btn-warning btn-sm"><i class="fadeIn animated bx bx-pencil"></i></a>
                            </td>
                            <td>{{$d->nombre}}</td>
                            <td>{{$d->descripcion}}</td>
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
        $("#dtperiodos").DataTable({
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