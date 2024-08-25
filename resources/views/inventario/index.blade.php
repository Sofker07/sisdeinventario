@extends('layouts.admin')

@section('content')
  <div class="content" style="margin-left: 20px">
    
    <h1>Inventario</h1>
    
    <div class="row">
      <div class="col-md-11">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title"><b>Escanea el codigo de barras del artículo</b></h3>
          </div>
          <div class="card-body" style="display: block;">
            <form action="{{route('database.importador')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-grup">
                    <label>Numero de Activo</label>
                    <input type="number" name="nombre_apellido" value="{{old('nombre_apellido')}}" class="form-control" autofocus>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-grup">
                    <label>Descripción</label>
                    <input type="text" name="email" value="{{old('email')}}" class="form-control" disabled>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-grup">
                    <label>Número de serie</label>
                    <input type="text" name="telefono" value="{{old('telefono')}}" class="form-control" disabled>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-grup">
                    <label>Modelo</label>
                    <input type="text" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" class="form-control" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-grup">
                    <label>Marca</label>
                    <input type="text" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" class="form-control" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-grup">
                    <label>Costo actual</label>
                    <input type="number" name="ministerio" value="{{old('ministerio')}}" class="form-control" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-grup">
                    <label>Inventario nacional</label>
                    <input type="text" name="direccion" value="{{old('direccion')}}" class="form-control" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <div class="form-grup">
                    <label>Clave Ur</label>
                    <input type="text" name="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" class="form-control" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-grup">
                    <label>Resguardante actual</label>
                    <input type="text" name="ministerio" value="{{old('ministerio')}}" class="form-control" disabled>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-grup">
                    <label>RFC del resguardante</label>
                    <input type="text" name="direccion" value="{{old('direccion')}}" class="form-control" disabled>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-grup">
                    <label>Empleado</label>
                    <input type="number" name="direccion" value="{{old('direccion')}}" class="form-control" disabled>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label>Observaciones</label>
                  <textarea class="form-control" placeholder="Escriba sus observaciones" spellcheck="false" data-ms-editor="true" style="height: 86px;"></textarea>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <label for="">¿El artículo es baja?</label>
                  <div class="form-group">
                    <label class="mr-3">
                        <input type="radio" name="baja" value="si" class="mr-1">
                        Sí
                    </label>
                    <label>
                        <input type="radio" name="baja" value="no" class="mr-1">
                        No
                    </label>
                  </div>                
                </div>
                <div class="col-md-6">
                  <label for="">¿El resguardante es el correcto?</label>
                  <div class="form-group">
                    <label class="mr-3">
                        <input type="radio" name="resguardante" value="si" class="mr-1">
                        Sí
                    </label>
                    <label>
                        <input type="radio" name="resguardante" value="no" class="mr-1">
                        No
                    </label>
                  </div>                
                </div>
              </div>
              <div id="extra-info" style="display:none;">
                <hr>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-grup">
                      <label>Nuevo resguardante</label>
                      <input type="text" name="ministerio" value="{{old('ministerio')}}" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-grup">
                      <label>RFC del resguardante</label>
                      <input type="text" name="direccion" value="{{old('direccion')}}" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-grup">
                      <label>Empleado</label>
                      <input type="number" name="direccion" value="{{old('direccion')}}" class="form-control" required>
                    </div>
                  </div>
                </div>
            </div>
              <hr>
              <div class="row">
                <div class="col-md-9">
                  <button type="submit" class="btn btn-success">Confirmar</button>             
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection