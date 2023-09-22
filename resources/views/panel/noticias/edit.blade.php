@extends('panel.base')

@section('contenido')
<div class="card">
    <div class="card-body">
        {{-- aqui es el contenido --}}
        <div class="row">
            <div class="col-sm-6">
                <h5>Editar Noticia</h5>
            </div>
        </div>
        <div class="row">
            <form method="POST" action="{{route('panel.noticias.update')}}" enctype="multipart/form-data">
                @csrf
                <input type="text" value="{{$noticia->id}}" name="id" hidden>
                <label for="">Titulo</label>
                <input type="text" maxlength="250" value="{{$noticia->titulo}}" name="titulo" class="form-control">

                <label for="">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control">{{$noticia->descripcion}}</textarea>

                <label for="">Contenido</label>
                <textarea name="contenido" id="contenido" cols="30" rows="8" class="form-control">{{$noticia->contenido}}</textarea>
                <div class="row">

                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="">Fecha</label>
                                <input type="date" name="fecha" value="{{$noticia->fecha}}" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <label for="">Slider</label>
                                <select name="slider" id="slider" value="{{$noticia->slider}}" class="form-select">
                                    @if ($noticia->slider=='1')
                                    <option value="1" selected>Si</option>
                                    <option value="0">No</option>
                                @else
                                    <option value="0" selected>No</option>
                                    <option value="1">Si</option>
                                    @endif
                                </select>
                            </div>
                            
                            <div class="col-sm-4">
                                <label for="">Portada</label>
                                <select name="portada" id="portada" class="form-select">
                                    @if ($noticia->portada=='1')
                                        <option value="1" selected>Si</option>
                                        <option value="0">No</option>
                                    @else
                                        <option value="0" selected>No</option>
                                        <option value="1">Si</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label for="">Estado</label>
                                <select name="estado" id="estado" class="form-select">
                                    @if ($noticia->estado=='1')
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
                                <img  id="imagen" src="{{asset('storage/noticias/'.$noticia->ruta_foto)}}" alt="" style="height:100px;">
                            </div>
                            <div class="col-sm-5">
                                <label for="">Reemplazar Imagen</label>
                                <input type="file" name="ruta_foto" id="ruta_foto" value="{{$noticia->foto}}" class="form-control">
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
        imgpreview("#ruta_foto","#imagen");
    </script>
    {{-- <script src="https://cdn.tiny.cloud/1/4wya3wjn43w5kzye9wy73hdg6o6fv12cdk8emfpbcztc175m/tinymce/6/tinymce.min.js"></script> --}}
    <script src="../../../tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
    


    tinymce.init({
            selector: '#contenido',
            plugins: 'link image code',
            toolbar: 'undo redo | link image | code',
            // toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            language: 'es',
            // enable title field in the Image dialog
            image_title: true, 
            // enable automatic uploads of images represented by blob or data URIs
            automatic_uploads: true,
            // add custom filepicker only to Image dialog
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.onchange = function() {
            var file = this.files[0];
            var reader = new FileReader();
            
            reader.onload = function () {
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                // call the callback and populate the Title field with the file name
                cb(blobInfo.blobUri(), { title: file.name });
            };
            reader.readAsDataURL(file);
            };
            
            input.click();
        }
        });


    </script>
@endsection