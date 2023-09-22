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
                <h5>Infografías</h5>
            </div>
            <div class="col-sm-6" style="text-align-last: end">
                <a class="btn btn-primary btn-sm" href="{{route('panel.infografias.create')}}"><i class="lni lni-circle-plus"></i>Nueva Infografía</a>
            </div>
        </div>
        @if(session()->has('mensaje'))
            <div class="col-sm-4">
                <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="mb-0 text-success">Mensaje</h6>
                            <div>{{Session::get('mensaje')}}</div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            
        @endif

        <div class="table table-container">
            <table class="table table-striped table-bordered" id="dtinstituciones">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Acción</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($infos as $infos)
                        <tr>
                            <td>{{$infos->id}}</td>
                            <td><a href="{{route('panel.infografias.edit',$infos->id)}}" class="btn btn-warning btn-sm">Editar</a></td>
                            <td>{{$infos->nombre}}</td>
                            <td><img src="{{asset('storage/infografias/'.$infos->imagen)}}" style="height: 80px" alt=""></td>
                            <td><div class="form-check form-switch">
                                @if ($infos->estado)
                                    <input class="form-check-input chkinfografias" onclick="cambia_estado('infografias')" type="checkbox" id="chkinfografias" checked>
                                @else
                                    <input class="form-check-input chkinfografias" onclick="cambia_estado('infografias')" type="checkbox" id="chkinfografias">
                                @endif
                            </div></td>
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

    <script src="../../../app_js/chkestado.js"></script>
    <script src="../../../panel/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="../../../panel/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src="../../../panel/assets/js/table-datatable.js"></script>

@endsection