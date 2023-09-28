
@extends('pagina.base')

@section('extra_css')
    {{-- <link href="../../../panel/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" /> --}}
@endsection
@section('contenido')
    <div class="container">
        <header class="headingHead text-center mb-8 mb-lg-13">
            <img src="{{asset('storage/instituciones/'.$instituciones->ruta_logo)}}" style="height: 100px;" alt="" >
            <h2 class="mb-2">ESTADISTICAS-{{$instituciones->titulo}}</h2>
        </header>
        {!!$instituciones->contenido!!}
    </div>
    <div class="container">
        @foreach ($estadisticas as $e)
            <h4>{{$e->titulo}}</h4>
            <p>{!! $e->contenido !!}</p>
        @endforeach
        <hr>
        <div class="input-group">
            <h5 style="padding-top: 10px">Resumen de Archivos Estadísticos</h5>
        </div>
        @foreach ($estadisticas as $e)
        <div class="input-group">
            <img src="../../../images/icon-carpeta.png" alt="" style="height: 40px">
            <h6 style="padding-left: 20px">{{$e->nombre}} - {{$e->titulo}}</h6>
        </div>
            @foreach ($archivos as $a)
                @if ($a->idestadistica==$e->id)
                    <div class="input-group" style="padding-left: 30px">
                        @if ($a->extension=='pdf')
                            <img src="../../../images/icon-pdf.png" style="height: 35px" alt="">
                        @elseif ($a->extension=='docx')
                            <img src="../../../images/icon-doc.png" style="height: 35px" alt="">
                        @elseif ($a->extension=='xls')
                            <img src="../../../images/icon-xls.png" style="height: 35px" alt="">
                            @elseif ($a->extension=='png')
                            <img src="../../../images/icon-png.png" style="height: 35px" alt="">
                        @endif
                            <a href="{{asset('storage/estadistica/'.$a->archivo)}}">{{$a->archivo}}</a>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>

@endsection
@section('extra_js')
    {{-- <script src="../../../app_js/currentdate.js"></script>
    <script> currentdate("fecha"); </script> --}}

    {{-- <script src="../../../panel/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="../../../panel/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="../../../panel/assets/js/table-datatable.js"></script> --}}

@endsection