@extends('panel.base')

@section('contenido')
<div class="card">
    <div class="card-body">
        {{-- aqui es el contenido --}}
        <div class="row">
            <div class="col-sm-6">
                <h5>Crear Institución</h5>
            </div>
        </div>
        <div class="row">
            <form method="POST" action="{{route('panel.instituciones.store')}}" enctype="multipart/form-data">
                @csrf
                <label for="">Titulo</label>
                <input type="text" maxlength="250" name="titulo" class="form-control" required>

                <label for="">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>

                <label for="">Contenido</label>
                <textarea name="contenido" id="contenido" cols="30" rows="8" class="form-control"></textarea>
                
                <div class="row">
                    <div class="col-sm-4">
                        <label for="">Estado</label>
                        <select name="estado" id="estado" class="form-select">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Cargar Imagen</label>
                        <input type="file" name="ruta_logo" id="ruta_logo" class="form-control" required>
                    </div>
                    <div class="col-sm-4" style="text-align-last: center">
                        <div class="row">
                            <label for="">Imagen</label>
                        </div>
                        <img type="file" id="imagen" style="height: 150px;">
                    </div> 
                </div>
    
                <br>
                <div class="col-sm-4">
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