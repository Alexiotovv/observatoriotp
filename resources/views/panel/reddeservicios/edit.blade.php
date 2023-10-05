@extends('panel.base')

@section('contenido')
<div class="card">
    <div class="card-body">
        {{-- aqui es el contenido --}}
        <div class="row">
            <div class="col-sm-6">
                <h5>Crear una Red de Servicio</h5>
            </div>
        </div>
        <div class="row">
            <form method="POST" action="{{route('panel.reddeservicios.update')}}" enctype="multipart/form-data">
                @csrf
                <label for="">Titulo</label>
                <input type="text" name="id" id="id" value="{{$obj->id}}" hidden>
                <input type="text" maxlength="250" name="titulo" value="{{$obj->titulo}}" class="form-control" required>

                <label for="">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required>{{$obj->descripcion}}</textarea>
                
                <label for="">Enlace</label>
                <input type="text" maxlength="250" name="enlace" value="{{$obj->enlace}}" class="form-control" placeholder="https://paginadeunareddeservicio.com" required>

                <div class="row">
                    <div class="col-sm-4">
                        <label for="">Estado</label>
                        <select name="estado" id="estado" class="form-select">
                            @if ($obj->estado=='1')
                                <option value="1" selected>Si</option>
                                <option value="0">No</option>
                            @else
                                <option value="0" selected>No</option>
                                <option value="1">Si</option>
                            @endif
                        </select>

                    </div>
                    <div class="col-sm-4">
                        <label for="">Reemplazar Imagen</label>
                        <input type="file" name="logo" id="logo" class="form-control" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Imagen</label>
                        <img src="{{asset('storage/reddeservicios/'.$obj->logo)}}" type="file" id="imagen" style="height: 120px;">
                    </div>
                </div>
                <br>
                <div class="col-sm-4">
                    {{-- style="text-align-last: center" --}}
                    <button type="submit" class="btn btn-primary btn-sm"><i class="lni lni-save"></i>Guardar</button>
                </div>
            </form>
        </div>

    </div>

</div>
@endsection
@section('extra_js')
    <script src="../../../app_js/imgpreview.js"></script>
    <script>
        imgpreview("#logo","#imagen");
    </script>
    
   
@endsection