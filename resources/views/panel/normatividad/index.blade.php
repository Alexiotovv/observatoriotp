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
                <h5>Normatividad</h5>
            </div>
            <div class="col-sm-6" style="text-align-last: end">
                <a class="btn btn-primary btn-sm" href="{{route('panel.normatividad.create')}}"><i class="lni lni-circle-plus"></i>Nueva Título Normatividad</a>
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
            <table class="table table-striped table-bordered" id="dtnormatividad">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>Descripción</th>
                        <th>Arhivos</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($normatividad as $n)
                        <tr>
                            
                            <td>{{$n->id}}</td>
                            <td>{{$n->titulo}}</td>
                            <td>{{$n->descripcion}}<br>
                                @foreach ($normatividadarchivos as $na)
                                    @if ($na->idnormatividad==$n->id)
                                        <p style="padding-left: 10px">
                                            <a target="blank_" href="{{asset('storage/normatividadarchivos/'.$na->archivo)}}">{{$na->titulo}}.{{$na->extension}}</a>
                                            <a class="btn btn-danger btn-sm" onclick="eliminararchivo({{$na->id}})"><i class="bx bx-trash"></i></a>
                                            <br>

                                        </p>
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                <a href="{{route('panel.normatividadarchivos.create',$n->id)}}" class="btn btn-primary btn-sm"> <i class="bx bx-layer-plus"></i></a>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    @if ($n->estado)
                                    <input class="form-check-input chknormatividad" onclick="cambia_estado('normatividad')" type="checkbox" id="chknormatividad" checked>
                                    @else
                                    <input class="form-check-input chknormatividad" onclick="cambia_estado('normatividad')" type="checkbox" id="chknormatividad">
                                    @endif
                                </div>
                            </td>
                            <td>
                                <a href="{{route('panel.normatividad.edit',$n->id)}}" class="btn btn-warning btn-sm"><i class="bx bx-pencil"></i></a>
                                <a href="{{route('panel.normatividad.destroy',$n->id)}}" class="btn btn-danger btn-sm"><i class="bx bx-trash"></i></a>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>
</div>

{{-- modal eliminar --}}
<div class="modal fade" id="modalConfirmacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">Confirma para poder eliminar el archivo: <p id="nombrearchivo"></p>
                        <input type="text" name="idarchivo" id="idarchivo" >
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <a type="submit" class="btn btn-danger btneliminararchivo">Si Eliminar</a>
                    
                </div>
        </div>
    </div>
</div>

{{-- cierre modal eliminar--}}

@endsection
@section('extra_js')
    <script>
        function eliminararchivo(id) { 
            $("#modalConfirmacion").modal('show');
            $("#idarchivo").val(id);
        }

        $(document).on("click",".btneliminararchivo",function () { 
            id=$("#idarchivo").val();
            window.location.href = "/panel/normatividadarchivos/destroy/"+id;    
        });

    </script>
    <script>
        $("#dtnormatividad").DataTable({
            order:[0],
            columnDefs: [
            // { width: "10px", targets: 0 },
            // { width: "40px", targets: 1 },
            // { width: "350px", targets: 2 },
            
            ]
        });
    </script>

    <script src="../../../app_js/chkestados.js"></script>

    <script src="../../../panel/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="../../../panel/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="../../../panel/assets/js/table-datatable.js"></script>

@endsection