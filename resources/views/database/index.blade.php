@extends('layouts.admin')

@section('estilos')
    <style>
        input:focus {
            border-color: #ff69b4 !important; /* Cambia al color rosado */
            box-shadow: 0 0 0 0.25rem rgba(255, 105, 180, 0.25); /* Añade un efecto de sombra suave */
            outline: none; /* Opcional: remueve el borde interno */
        }
        #progressContainer {
            margin-top: 20px;
        }
        progress {
            width: 100%;
            height: 20px;
        }
        #progressText {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
@endsection

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
                    <form id="uploadForm" action="{{ route('database.importador') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="formFile" class="form-label">Selecciona un archivo .txt</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="formFile" name="archivo_txt" accept=".txt" required>
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
                        <!-- Barra de progreso personalizada -->
                        <div id="progressContainer" style="display: none;">
                            <div id="progressWrapper" style="width: 100%; background-color: #f3f3f3; height: 20px; border-radius: 10px;">
                                <div id="progressBar" style="width: 0%; background-color: #ff69b4; height: 100%; border-radius: 10px;"></div>
                            </div>
                            <span id="progressText">0%</span>
                        </div>
                        <br>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 ms-auto">
                                <button type="submit" class="btn btn-block" style="background-color:#E83E8C; color:white">
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>
<script>
    $(document).ready(function() {
    const progressBar = $('#progressBar');
    const progressText = $('#progressText');
    const progressContainer = $('#progressContainer');
    const form = $('#uploadForm');

    // Resetear la barra de progreso al cargar la página
    progressBar.css('width', '0%');
    progressText.text('0%');
    progressContainer.hide(); // Esconde la barra de progreso

    // Función de polling para actualizar el progreso
    function actualizarProgreso() {
        $.get("{{ route('database.progreso') }}", function(data) {
            const porcentaje = Math.min(data.porcentaje, 100).toFixed(2); // Limitar al 100%
            progressBar.css('width', porcentaje + '%');
            progressText.text(porcentaje + '%');

            // Mostrar la barra de progreso
            progressContainer.show();

            // Detener polling cuando llegue al 100%
            if (porcentaje >= 100) {
                clearInterval(intervalo); // Detener polling
                progressText.text('¡Importación completada!');

                // Notificación de éxito con SweetAlert2
                Swal.fire({
                    title: '¡Importación Completada!',
                    text: 'Los datos se han importado correctamente.',
                    icon: 'success',
                    confirmButtonText: 'Aceptar'
                });
            }
        }).fail(function() {
            console.error("Error al obtener el progreso.");
        });
    }

    // Iniciar polling cada segundo
    const intervalo = setInterval(actualizarProgreso, 500);

    // Previene el redireccionamiento del formulario
    form.submit(function(e) {
        e.preventDefault(); // Evita que se envíe el formulario de manera tradicional

        // Realiza la solicitud AJAX para el envío del formulario
        $.ajax({
            url: form.attr('action'),
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(response) {
                // No es necesario mostrar una notificación de éxito al inicio
            }
        });
    });
});
</script>

@endsection