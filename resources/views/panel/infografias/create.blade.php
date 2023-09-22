@extends('panel.base')

@section('contenido')
<div class="card">
    <div class="card-body">
        {{-- aqui es el contenido --}}
        <div class="row">
            <div class="col-sm-6">
                <h5>Crear Infografía</h5>
            </div>
        </div>
        <div class="row">
            <form method="POST" action="{{route('panel.infografias.store')}}" enctype="multipart/form-data">
                @csrf
                <label for="">Nombre</label>
                <input type="text" maxlength="250" name="nombre" class="form-control" required>

                <label for="">Seleccione Imagen (jpeg, png, jpg)</label>
                <input type="file" name="imagen" id="imagen" class="form-control" accept=".jpeg, .png, .jpg" required>
                
                
                <br>
                <img src="" alt="" id="img-preview" style="height: 20%">
                <div class="col-sm-4">
                    <br>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="lni lni-save"></i>Guardar</button>
                </div>
            </form>
        </div>

    </div>

</div>
@endsection
@section('extra_js')
    <script src="../../../app_js/imgpreview.js"></script>
    <script>imgpreview("#imagen","#img-preview");</script>
@endsection