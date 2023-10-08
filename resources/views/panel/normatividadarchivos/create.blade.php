@extends('panel.base')

@section('contenido')
<div class="card">
    <div class="card-body">
        {{-- aqui es el contenido --}}
        <div class="row">
            <div class="col-sm-6">
                <h5>Subir Archivo para la Norma</h5>
            </div>
        </div>
        <form method="POST" action="{{route('panel.normatividadarchivos.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <input type="text" name="idnormatividad" value="{{$idnormatividad}}" hidden>
                    <label for="">Titulo de la Norma</label>
                    <input type="text" class="form-control" value="{{$titulo}}" readonly disabled>
                    
                    <label for="">Titulo del Archivo</label>
                    <input type="text" maxlength="250" name="titulo" class="form-control" required>
                </div>
                <div class="col-sm-12">
                    <label for="">Archivo(.pdf)</label>
                    <input type="file" name="archivo" class="form-control" accept=".pdf" required>
                </div>
                <div class="col-sm-6">
                    <label for="">Estado</label>
                    <select name="estado" id="estado" class="form-select">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
                
                <div class="col-sm-4">
                    <label for="">Fecha</label>
                    <input type="date" name="fecha" id="fecha" maxlength="250" class="form-control" required>
                </div>
                <div class="col-sm-12">
                    <br>
                    {{-- style="text-align-last: center" --}}
                    <button type="submit" class="btn btn-primary btn-sm"><i class="lni lni-save"></i>Guardar</button>
                </div>
            </div>
        </form>

    </div>

</div>
@endsection
@section('extra_js')
    <script src="../../../app_js/imgpreview.js"></script>
    <script src="../../../app_js/currentdate.js"></script>
    <script>
        currentdate('fecha');
        imgpreview("#logo","#imagen");
    </script>
    
   
@endsection