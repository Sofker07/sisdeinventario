@extends('layouts.admin')

@section('content')
  <div class="content" style="margin-left: 20px">
    
    <h1>Importar Base de Datos</h1>

    <div class="row">
      <div class="col-md-11">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title"><b>Suba el archivo txt con la base de datos</b></h3>
          </div>
          <div class="card-body" style="display: block;">
            <form action="{{ route('database.importador') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="formFile" class="form-label">Selecciona un archivo .txt</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="formFile" name="archivo_txt">
                            <label class="custom-file-label" for="formFile" data-browse="Buscar">Seleccionar archivo</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-3 ms-auto">
                  <button type="submit" class="btn btn-primary btn-block">
                    <i class="bi bi-upload"></i> Importar
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
