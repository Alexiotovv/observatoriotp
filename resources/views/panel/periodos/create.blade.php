@extends('panel.base')

@section('contenido')
<div class="card">
    <div class="card-body">
        {{-- aqui es el contenido --}}
        <div class="row">
            <div class="col-sm-6">
                <h5>Crear Periodo</h5>
            </div>
        </div>
        <div class="row">
            <form method="POST" action="{{route('panel.periodos.store')}}" enctype="multipart/form-data">
                @csrf
                <label for="">Nombre</label>
                <input type="text" maxlength="250" name="nombre" class="form-control" required>

                <label for="">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
    
                <br>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="lni lni-save"></i>Guardar</button>
                </div>
            </form>
        </div>

    </div>

</div>
@endsection
