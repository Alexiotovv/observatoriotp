@extends('panel.base')

@section('contenido')
<div class="card">
    <div class="card-body">
        {{-- aqui es el contenido --}}
        <div class="row">
            <div class="col-sm-6">
                <h5>Editar Institución</h5>
            </div>
        </div>
        <div class="row">
            <form method="POST" action="{{route('panel.instituciones.update')}}" enctype="multipart/form-data">
                @csrf
                <input type="text" value="{{$institucion->id}}" name="id" hidden>
                <label for="">Titulo</label>
                <input type="text" maxlength="250" value="{{$institucion->titulo}}" name="titulo" class="form-control">

                <label for="">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control">{{$institucion->descripcion}}</textarea>

                <label for="">Contenido</label>
                <textarea name="contenido" id="contenido" cols="30" rows="8" class="form-control">{{$institucion->contenido}}</textarea>
                <div class="row">

                    <div class="col-sm-12">
                        <div class="row">
 
                            <div class="col-sm-4">
                                <label for="">Estado</label>
                                <select name="estado" id="estado" class="form-select">
                                    @if ($institucion->estado=='1')
                                        <option value="1" selected>Si</option>
                                        <option value="0">No</option>
                                    @else
                                        <option value="0" selected>No</option>
                                        <option value="1">Si</option>
                                    @endif
                                </select>
        
                            </div>

                            <div class="col-sm-3" style="text-align-last: center">
                                <p>Imagen</p>
                                <img  id="imagen" src="{{asset('storage/instituciones/'.$institucion->ruta_logo)}}" alt="" style="height:100px;">
                            </div>
                            <div class="col-sm-5">
                                <label for="">Reemplazar Imagen</label>
                                <input type="file" name="ruta_logo" id="ruta_logo" value="{{$institucion->ruta_logo}}" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="col-sm-4">
                    <button class="btn btn-primary btn-sm"><i class="lni lni-save"></i>Guardar</button>
                </div>
            </form>
        </div>

    </div>

</div>
@endsection
@section('extra_js')
    <script src="../../../app_js/imgpreview.js"></script>
    <script>
        imgpreview("#ruta_logo","#imagen");
    </script>
    <script src="https://cdn.tiny.cloud/1/4wya3wjn43w5kzye9wy73hdg6o6fv12cdk8emfpbcztc175m/tinymce/6/tinymce.min.js"></script>
    {{-- <script src="../../../tinymce/tinymce.min.js"></script> --}}
    <script type="text/javascript">
    tinymce.init({
      selector: '#contenido',
      plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      language:'es',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
    });
    </script>
@endsection