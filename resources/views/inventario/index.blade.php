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
                    <input type="text" id="numero_activo" name="numero_activo" class="form-control" autofocus>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-grup">
                    <label>Descripción</label>
                    <input type="text" id="descripcion" name="descripcion" class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-grup">
                    <label>Número de serie</label>
                    <input type="text" id="numero_serie" name="numero_serie"  class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-grup">
                    <label>Modelo</label>
                    <input type="text" id="modelo" name="modelo"  class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-grup">
                    <label>Marca</label>
                    <input type="text" id="marca" name="marca"  class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-grup">
                    <label>Costo actual</label>
                    <input type="number" id="costo_actual" name="costo_actual"  class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-grup">
                    <label>Inventario nacional</label>
                    <input type="text" id="inventario_nacional" name="inventario_nacional"  class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-2">
                  <div class="form-grup">
                    <label>Clave Ur</label>
                    <input type="text" id="clave_ur" name="clave_ur"  class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-grup">
                    <label>Resguardante actual</label>
                    <input type="text" id="resguardante_actual" name="resguardante_actual"  class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-grup">
                    <label>RFC del resguardante</label>
                    <input type="text" id="rfc_resguardante" name="rfc_resguardante"  class="form-control" readonly>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-grup">
                    <label>Empleado</label>
                    <input type="number" id="empleado" name="empleado"  class="form-control" readonly>
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
                      <input type="text" name="ministerio"  class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-grup">
                      <label>RFC del resguardante</label>
                      <input type="text" name="direccion"  class="form-control" required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-grup">
                      <label>Empleado</label>
                      <input type="number" name="direccion"  class="form-control" required>
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
@push('códigoJS')
  <!-- script para desplegar los campos del nuevo resguardante -->
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const radios = document.getElementsByName('resguardante');
        const extraInfo = document.getElementById('extra-info');

        radios.forEach(radio => {
            radio.addEventListener('change', function () {
                if (this.value === 'no') {
                    extraInfo.style.display = 'block';
                } else {
                    extraInfo.style.display = 'none';
                }
            });
        });
    });
  </script>

  <!-- Incluye la librería jQuery, que es necesaria para usar AJAX de manera sencilla -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      $(document).ready(function() {
          $('#numero_activo').on('change', function() {
              var numeroActivo = $(this).val();
  
              // Petición AJAX para obtener la información del activo
              $.ajax({
                  url: '/inventario/' + numeroActivo,
                  method: 'GET',
                  success: function(response) {
                      // Si la petición es exitosa, rellena los campos
                      $('#descripcion').val(response.descripcion);
                      $('#numero_serie').val(response.numero_serie);
                      $('#modelo').val(response.modelo);
                      $('#marca').val(response.marca);
                      $('#costo_actual').val(response.costo_actual);
                      $('#inventario_nacional').val(response.inventario_nacional);
                      $('#clave_ur').val(response.clave_ur);
                      $('#resguardante_actual').val(response.resguardante_actual);
                      $('#rfc_resguardante').val(response.rfc_resguardante);
                      $('#empleado').val(response.empleado);
                  },
                  error: function() {
                      alert('Activo no encontrado');
                  }
              });
          });
      });
  </script>
@endpush