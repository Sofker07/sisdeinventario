@extends('layouts.admin')

@section('content')
  <div class="content" style="margin-left: 20px">
    
    <h1>Generar Reportes</h1>

    <div class="row">
      <div class="col-md-11">
        <div class="card card-outline card-pink">
          <div class="card-header">
            <h3 class="card-title"><b>RFC del resguardante</b></h3>
          </div>
          <div class="card-body" style="display: block;">
            <form action="{{route('inventario.save')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-9">
                  <div class="form-group">
                    <label for="formFile" class="form-label">Escriba el RFC del funcionario</label>
                    <input type="text" id="rfc_resguardante" name="rfc_resguardante"  class="form-control" placeholder="Escriba el RFC">
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-3 ms-auto">
                  <button type="submit" class="btn btn-block" style="background-color:#E83E8C; color:white">
                    <i class="bi bi-file-earmark-text"></i> Generar reportes
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