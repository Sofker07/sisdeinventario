@extends('layouts.admin')

@section('estilos')
  <style>
    input:focus {
      border-color: #ff69b4 !important; /* Cambia al color rosado */
      box-shadow: 0 0 0 0.25rem rgba(255, 105, 180, 0.25); /* Añade un efecto de sombra suave */
      outline: none; /* Opcional: remueve el borde interno */
    }
    textarea:focus {
      border-color: #ff69b4 !important; /* Cambia al color rosado */
      box-shadow: 0 0 0 0.25rem rgba(255, 105, 180, 0.25); /* Añade un efecto de sombra suave */
      outline: none; /* Opcional: remueve el borde interno */
    }
    input[type="radio"] {
      accent-color: #ff69b4; /* Cambia el color rosado */
    }

    /* Opcional: Cambia el hover o el estado checked (marcado) */
    input[type="radio"]:checked {
      accent-color: #ff69b4; /* Mismo color rosado para checked */
    }
    input[type="radio"]:focus {
      outline: none; /* Un contorno rosado más estilizado */
      box-shadow: none;
    }
  </style>    
@endsection

@section('content')
  <div class="content" style="margin-left: 20px">
    
    <h1>Inventario</h1>

    @if ($message = Session::get('mensaje'))
      <script>
          Swal.fire({
            title: "Buen trabajo!",
            text: "{{$message}}",
            icon: "success"
          });
      </script>
    @endif
    
    @foreach ($errors->all() as $error)
      <div class="alert alert-danger">
        <li>{{$error}}</li>
      </div>
    @endforeach
    
    <div class="row">
      <div class="col-md-11">
        <div class="card card-outline card-pink">
          <div class="card-header">
            <h3 class="card-title"><b>Escanea el código de barras del artículo</b></h3>
          </div>
          <div class="card-body" style="display: block;">
            <form action="{{route('inventario.save')}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-12">
                  <div class="form-grup">
                    <label>Número de Activo</label>
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
                    <label>No. de Empleado</label>
                    <input type="number" id="empleado" name="empleado"  class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label>Observaciones</label>
                  <textarea class="form-control" id="observaciones" name="observaciones" placeholder="Escriba sus observaciones" spellcheck="false" data-ms-editor="true" style="height: 86px;"></textarea>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6" style="margin: auto; text-align:center;">
                  <label for="">¿El artículo es baja?</label>
                  <div class="form-group">
                    <label class="mr-3">
                        <input type="radio" name="baja" value="true" class="mr-1" required>
                        Sí
                    </label>
                    <label>
                        <input type="radio" name="baja" value="false" class="mr-1">
                        No
                    </label>
                  </div>                
                </div>
                <div class="col-md-6" style="margin: auto; text-align:center;">
                  <label for="">¿El resguardante es el correcto?</label>
                  <div class="form-group">
                    <label class="mr-3">
                        <input type="radio" name="resguardante" value="true" class="mr-1" required>
                        Sí
                    </label>
                    <label>
                        <input type="radio" name="resguardante" value="false" class="mr-1">
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
                      <input type="text" name="nuevo_resguardante"  class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-grup">
                      <label>RFC del resguardante</label>
                      <input type="text" name="rfc_nuevo"  class="form-control">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-grup">
                      <label>No. de Empleado</label>
                      <input type="text" name="no_empleado"  class="form-control">
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <button type="submit" class="btn" style="background-color:#E83E8C; color:white">
                    Confirmar
                  </button>             
                  <a href="#" id="historial-btn" class="btn" style="background-color:#863780; color:white">
                    <i class="bi bi-eye"></i>
                    Ver historial
                  </a>          
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
                if (this.value === 'false') {
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
          url: '/sisdeinventario/public/inventario/' + numeroActivo,
          method: 'GET',
          success: function(response) {
            // Si la petición es exitosa, rellena los campos
            $('#descripcion').val(response.activo.descripcion);
            $('#numero_serie').val(response.activo.numero_de_serie);
            $('#modelo').val(response.activo.modelo);
            $('#marca').val(response.activo.marca);
            $('#costo_actual').val(response.activo.costo_actual);
            $('#inventario_nacional').val(response.activo.inventario_nacional);
            $('#clave_ur').val(response.activo.clave_ur);
            $('#resguardante_actual').val(response.activo.resguardante_actual);
            $('#rfc_resguardante').val(response.activo.rfc_resguardante);
            $('#empleado').val(response.activo.empleado);
            $('#historial-btn').attr('href', '/sisdeinventario/public/historial/' + numeroActivo);
            // Si hay un mensaje de Historial, mostrar la alerta
            if (response.mensajeHistorial) {
              Swal.fire({
                title: 'Advertencia',
                text: response.mensajeHistorial,
                icon: 'info'
              });
            }
          },
          error: function(xhr) {
            if (xhr.status === 404) {
              Swal.fire({
                title: 'Error',
                text: xhr.responseJSON.error, // Mostrar el mensaje de error desde la respuesta JSON
                icon: 'error'
              });
            } else {
              Swal.fire({
                title: 'Error',
                text: 'Ocurrió un error al buscar el activo',
                icon: 'error'
              });
            }
          }
        });
      });
    });
  </script>
@endpush