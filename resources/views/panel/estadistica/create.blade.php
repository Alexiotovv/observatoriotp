
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
                <h5>Estadisticas para la {{$institucion->titulo}}</h5>

            </div>
        </div>
        {{-- @if(session()->has('mensaje'))
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
        @endif --}}
        <form action="{{route('panel.estadistica.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <input type="text" name="institucion" value="{{$institucion->id}}" hidden>
                    <label for="">Nombre de la Estadística</label>
                    <input type="text" name="titulo" class="form-control" maxlength="250">
                </div>
                
                <div class="col-sm-6">
                    <label for="">Seleccione Periodo</label>
                    <select name="periodo" id="" class="form-select">
                        @foreach ($periodos as $periodo)
                            <option value="{{$periodo->id}}">{{$periodo->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="">Seleccione Archivos</label>
                    <input type="file" name="documentos[]" class="form-control" multiple>
                </div>
                <div class="col-sm-12">
                    <label for="">Descripción</label>
                    <textarea name="contenido" id="contenido" cols="30" rows="30" class="form-control"></textarea>
                    <input type="date" name="fecha" id="fecha" hidden>
                </div>

                <div class="col-sm-4">
                    <br>
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
@section('extra_js')
    <script src="../../../app_js/currentdate.js"></script>
    <script> currentdate("fecha"); </script>
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
    <script src="https://cdn.tiny.cloud/1/4wya3wjn43w5kzye9wy73hdg6o6fv12cdk8emfpbcztc175m/tinymce/6/tinymce.min.js"></script>
    <script type="text/javascript">
    
        tinymce.init({
                selector: '#contenido',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
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
    {{-- <script src="../../../app_js/chkestados.js"></script> --}}

    <script src="../../../panel/assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="../../../panel/assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="../../../panel/assets/js/table-datatable.js"></script>

@endsection