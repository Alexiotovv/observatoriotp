@extends('panel.base')

@section('contenido')
<div class="card">
    <div class="card-body">
        {{-- aqui es el contenido --}}
        <div class="row">
            <div class="col-sm-6">
                <h5>Crear Registro de Normas</h5>
            </div>
        </div>
        <form method="POST" action="{{route('panel.normatividad.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <label for="">Titulo</label>
                    <input type="text" maxlength="250" name="titulo" class="form-control" required>
                </div>
                <div class="col-sm-12">
                    <label for="">Descripción</label>
                    <textarea name="descripcion" class="form-control" required></textarea>
                </div>
                <div class="col-sm-4">
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