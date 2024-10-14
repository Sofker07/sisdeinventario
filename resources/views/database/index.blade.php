@extends('layouts.admin')

@section('content')
  <div class="content" style="margin-left: 20px">
    
    <h1>Importar Base de Datos</h1>

    <div class="row">
      <div class="col-md-11">
        <div class="card card-outline card-pink">
          <div class="card-header">
            <h3 class="card-title"><b>Suba el archivo txt con la base de datos</b></h3>
          </div>
          <div class="card-body" style="display: block;">
            <form id="uploadForm" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-md-9">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="formFile" class="form-label">Selecciona un archivo .txt</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="formFile" name="archivo_txt" required>
                            <label class="custom-file-label" for="formFile" data-browse="Buscar">Seleccionar archivo</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <br>
              <!-- Barra de progreso -->
              <div class="progress">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" id="progressBar"></div>
              </div>
              <br>
              <hr>
              <div class="row">
                <div class="col-md-3 ms-auto">
                  <button type="submit" class="btn btn-block" style="background-color: #DB0F7B; color: white;">
                    <i class="bi bi-upload"></i> Importar
                  </button>
                </div>
              </div>
            </form>
            <!-- Mensaje de éxito o error -->
            <div id="message"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('códigoJS')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(document).ready(function () {
      bsCustomFileInput.init();

      // Gestión del formulario con AJAX
      $('#uploadForm').on('submit', function (e) {
        e.preventDefault();  // Evitar el envío estándar del formulario

        // Crear el objeto FormData para manejar el archivo
        var formData = new FormData(this);

        $.ajax({
          type: 'POST',
          url: '{{ route("database.importador") }}',
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
            // Iniciar el monitoreo del progreso
            monitorProgress();

            // Mostrar mensaje de éxito
            Swal.fire({
              title: 'Éxito',
              text: response.message,
              icon: 'success',
              confirmButtonText: 'Aceptar'
            });
          },
          error: function (response) {
            // Mostrar mensaje de error
            Swal.fire({
              title: 'Error',
              text: 'Error al subir el archivo.',
              icon: 'error',
              confirmButtonText: 'Aceptar'
            });
          }
        });
      });

      // Función para monitorear el progreso
      function monitorProgress() {
        var interval = setInterval(function () {
          $.get('{{ route("database.getProgress") }}', function (data) {
            var percentComplete = Math.round((data.processed_records / data.total_records) * 100);
            $('#progressBar').css('width', percentComplete + '%');
            $('#progressBar').text(percentComplete + '%');

            // Si se completa la importación, detener el monitoreo
            if (data.status === 'completed') {
              clearInterval(interval);
              Swal.fire({
                title: 'Importación Completada',
                text: 'Todos los datos se han importado correctamente.',
                icon: 'success',
                confirmButtonText: 'Aceptar'
              });
            }
          });
        }, 1000);  // Consultar cada segundo
      }
    });
  </script>
@endpush