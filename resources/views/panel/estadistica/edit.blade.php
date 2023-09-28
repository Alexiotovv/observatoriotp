
@extends('panel.base')

@section('extra_css')
    <link rel="stylesheet" href="../../../panel/assets/plugins/notifications/css/lobibox.min.css" />
@endsection
@section('contenido')
<div class="card">
    <div class="card-body">
        {{-- aqui es el contenido --}}
        <div class="row">
            <div class="col-sm-6">
                <h5>Editar Estadistica - {{$estadistica->titulo}}</h5>
            </div>
        </div>
        
        <form action="{{route('panel.estadistica.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <input type="text" name="idestadistica" value="{{$estadistica->id}}" hidden>
                    <input type="text" name="idinstituciones" value="{{$estadistica->idinstituciones}}" hidden>
                    <label for="">Nombre de la Estadística</label>
                    <input type="text" name="titulo" value="{{$estadistica->titulo}}" class="form-control" maxlength="250">
                </div>
                
                <div class="col-sm-6">
                    <label for="">Seleccione Periodo</label>
                    <select name="periodo" id="" class="form-select">
                        @foreach ($periodos as $periodo)
                            @if ($periodo->id==$estadistica->idperiodos)
                                <option value="{{$periodo->id}}" selected>{{$periodo->nombre}}</option>
                            @else
                                <option value="{{$periodo->id}}">{{$periodo->nombre}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-6">
                    <label for="">Añadir más archivos</label>
                    <input type="file" name="documentos[]" class="form-control" multiple>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <br>
                        <table class="table-hover table-striped" id="dtarchivos">
                            <thead>
                                <tr>
                                    Archivos
                                    {{-- <th>id</th>
                                    <th>archivo</th>
                                    <th>accion</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($archivos as $a)
                                    <tr>
                                        <td>{{$a->id}} </td>
                                        <td><a href="{{$a->archivo}}">{{$a->archivo}}</a></td>
                                        <td><a href="" class="btn btn-outline-danger btn-sm btnEliminarArchivo"><i class="lni lni-cross-circle"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col-sm-12">
                    <label for="">Descripción</label>
                    <textarea name="contenido" id="contenido" cols="30" rows="30" class="form-control">--   </textarea>
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

<div class="modal fade" id="modalConfirmacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">Confirma para poder eliminar el archivo: <p id="nombrearchivo"></p></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" class="btn btn-danger btnSiEliminar">Si Eliminar</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('extra_js')
    <script src="../../../app_js/currentdate.js"></script>
    <script> currentdate("fecha"); </script>
    <script>
        var idarchivo=0;
        var btn ="";
        $(document).on("click",".btnEliminarArchivo",function (e) { 
            e.preventDefault();
            fila = $(this).closest("tr");
            idarchivo = (fila).find('td:eq(0)').text();
            nombrearchivo = (fila).find('td:eq(1)').text();
            $("#nombrearchivo").text(nombrearchivo);
            btn = e.target;
            $("#modalConfirmacion").modal('show');
        });
        
        $(document).on("click",".btnSiEliminar",function (e) { 
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "/panel/estadistica/destroy/"+idarchivo,
                dataType: "json",
                success: function (response) {
                    //Archivo Eliminado
                    $("#modalConfirmacion").modal('hide');
                    // e.preventDefault();
                    
                    btn.closest("tr").remove();
                   
                    // round_success_noti();
                }
            });
          })

         
        $("#dtinfografias").DataTable({
            order:[0],
            columnDefs: [
            // { width: "10px", targets: 0 },
            // { width: "40px", targets: 1 },
            // { width: "350px", targets: 2 },
            
            ]
        });
    </script>
    <script src="../../../panel/assets/plugins/notifications/js/lobibox.min.js"></script>
	<script src="../../../panel/assets/plugins/notifications/js/notifications.min.js"></script>
	<script src="../../../panel/assets/plugins/notifications/js/notification-custom-script.js"></script>

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