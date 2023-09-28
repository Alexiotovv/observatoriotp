@extends('panel.base')

@section('extra_css')
    {{-- <link href="../../../panel/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" /> --}}
@endsection
@section('contenido')
<div class="card">
    <div class="card-body">
        {{-- aqui es el contenido --}}
        <div class="row">
            <div class="col-sm-6">
                <h5>Estadisticas</h5>
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
    </div>

</div>
@endsection
@section('extra_js')
    <script>
        $("#dtinfografias").DataTable({
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