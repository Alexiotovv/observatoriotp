@extends('panel.base')

@section('contenido')
<div class="card">
    <div class="card-body">
        {{-- aqui es el contenido --}}
        <div class="row">
            <div class="col-sm-6">
                <h5>Editar Infografía</h5>
            </div>
        </div>
        <div class="row">
            <form method="POST" action="{{route('panel.infografias.update')}}" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" value="{{$infos->id}}" hidden>
                <label for="">Nombre</label>
                <input type="text" maxlength="250" name="nombre" value="{{$infos->nombre}}" class="form-control" required>

                <label for="">Seleccione Imagen para Cambiar (jpeg, png, jpg)</label>
                <input type="file" name="imagen" id="imagen" class="form-control" accept=".jpeg, .png, .jpg">
                    
                <label for="">Imagen</label> 
                <br>
                <img src="{{asset('storage/infografias/'.$infos->imagen)}}" id="img-preview" alt="" style="height: 80px;">
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