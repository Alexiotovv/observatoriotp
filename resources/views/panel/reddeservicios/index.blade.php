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
                <h5>Red de Servicios</h5>
            </div>
            <div class="col-sm-6" style="text-align-last: end">
                <a class="btn btn-primary btn-sm" href="{{route('panel.reddeservicios.create')}}"><i class="lni lni-circle-plus"></i>Nueva Red de Servicios</a>
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

            <div class="card card-body">
                <table class="table table-hover table-striped table-bordered" id="dtreddeservicios">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Acción</th>
                            <th>Titulo</th>
                            <th>Descripción</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reddeservicios as $n)                    
                            <tr>
                                <td>{{$n->id}}</td>
                                <td>
                                    <a href="{{route('panel.reddeservicios.edit',$n->id)}}" class="btn btn-warning btn-sm"><i class="fadeIn animated bx bx-pencil"></i></a>
                                </td>
                                <td>{{$n->titulo}}</td>
                                <td>{{$n->descripcion}}</td>
                                <td>
                                    <img src="{{asset('storage/reddeservicios/'.$n->logo)}}" style="height: 120px;" alt="">
                                </td>                                
                                <td>
                                    <div class="form-check form-switch">
                                        @if ($n->estado)
                                            <input class="form-check-input chkestado" onclick="cambia_estado('estado')" type="checkbox" id="chkestado" checked>
                                        @else
                                            <input class="form-check-input chkestado" onclick="cambia_estado('estado')" type="checkbox" id="chkestado">
                                        @endif
                                    </div>
                                </td>
                                
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
        $("#dtreddeservicios").DataTable({
            order:[0],
            columnDefs: [
            { width: "80px;", targets: 4 },
            // { width: "40px", targets: 1 },
            // { width: "350px", targets: 2 },
            ]
        });


        function cambia_estado(elemento) { 
            $(document).on("click",".chk"+ elemento +"",function (e){
            // e.preventDefault();
            if ($(this).prop('checked')) { valor=1; } else { valor=0; }
            fila = $(this).closest("tr");
            id = (fila).find('td:eq(0)').text();
            $.ajax({
                type: "GET",
                url: "/panel/reddeservicios/"+ id +"/"+ elemento +"/"+ valor,
                data: "data",
                dataType: "dataType",
                success: function (response) {
                    
                }
            });            
            })
         }
    </script>


    <script src="../../../panel/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="../../../panel/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src="../../../panel/assets/js/table-datatable.js"></script>

@endsection