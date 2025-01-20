@extends('layouts.admin')

@section('estilos')
  <style>
    input:focus {
      border-color: #ff69b4 !important; /* Cambia al color rosado */
      box-shadow: 0 0 0 0.25rem rgba(255, 105, 180, 0.25); /* Añade un efecto de sombra suave */
      outline: none; /* Opcional: remueve el borde interno */
    }
  </style>
@endsection

@section('content')
  <div class="content" style="margin-left: 20px; margin-right: 20px">
    
    <h1>Generar reportes</h1>

    <div class="row d-flex align-items-stretch">
      <div class="col-md-6">
        <div class="card card-outline card-pink h-100">
          <div class="card-header">
            <h3 class="card-title"><b>RFC del resguardante</b></h3>
          </div>
          <div class="card-body">
            <form action="{{route('reportes.pdf')}}" method="get" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="formFile" class="form-label">Escriba el RFC del funcionario</label>
                <input type="text" id="rfc_resguardante" name="rfc_resguardante"  class="form-control" placeholder="Escriba el RFC" required>
              </div>
              <hr>
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-block w-100" style="background-color:#E83E8C; color:white">
                  <i class="bi bi-file-earmark-text"></i> <span class="text-nowrap">Generar reportes</span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-outline card-pink h-100">
          <div class="card-header">
            <h3 class="card-title"><b>Reporte general del inventario</b></h3>
          </div>
          <div class="card-body">
            <form action="{{route('reportes.excel')}}" method="get" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="formFile" class="form-label">Descargar inventario en formato .xlsx</label>
              </div>
              <br>
              <hr>
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-block w-100" style="background-color:#E83E8C; color:white">
                  <i class="bi bi-file-earmark-text"></i> <span class="text-nowrap">Generar reporte</span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection