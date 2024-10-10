@extends('layouts.admin')

@section('content')
  <div class="content" style="margin-left: 20px">
    <h1>Historial</h1>

    <div class="row">
      <div class="col-md-12">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title"><b>Historial del artículo</b></h3>
          </div>

          <div class="card-body" style="display: block;">
            <table id="example1" class="table table-bordered table-striped table-sm">
              <thead>
                <tr>
                  <th>Nro.</th>
                  <th>Observaciones</th>
                  <th>Baja</th>
                  <th>Resguardante Correcto</th>
                  <th>Nuevo Resguardante</th>
                  <th>RFC</th>
                  <th>No. de Empleado</th>
                  <th>Fecha</th>
                </tr>
              </thead>
              <tbody>
                <?php $contador=0;?>
                @foreach ($activos as $activo)
                <tr>
                  <td><?php echo $contador=$contador+1;?></td>
                  <td>{{$activo->observaciones}}</td>
                  <td>{{$activo->baja ? 'Sí' : 'No' }}</td>
                  <td>{{$activo->resguardante_correcto ? 'Sí' : 'No' }}</td>
                  <td>{{$activo->resguardante_nuevo}}</td>
                  <td>{{$activo->rfc_resguardante_nuevo}}</td>
                  <td>{{$activo->empleado_nuevo}}</td>
                  <td>{{$activo->created_at}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <script>
              $(function(){
                $("#example1").DataTable({
                  "pageLength": 10,
                  "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                    "infoEmpty": "Mostrando 0 a 0 Registros",
                    "infoFiltered": "(Filtrado de _MAX_ total Registros)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Registros",
                    "loadingRecords": "Cargando",
                    "processing": "Procesando...",
                    "search": "Buscador:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                      "first": "Primero",
                      "last": "Ultimo",
                      "next": "Siguiente",
                      "previous": "Anterior"
                    }
                  },
                  "responsive": true, "lengthChange": true, "autoWidth": false,
                  buttons: [{
                    extend: 'collection',
                    text: 'Reportes',
                    orientation: 'landscape',
                    buttons: [{
                      text: 'Copiar',
                      extend: 'copy',
                    },{
                      extend: 'pdf'
                    }, {
                      extend: 'csv'
                    }, {
                      extend: 'excel'
                    }, {
                      text: 'Imprimir',
                      extend: 'print'
                    }
                    ]
                  },
                    {
                      extend: 'colvis',
                      text: 'Visor de columnas',
                      collectionLayout: 'fixed three-column'
                    }
                ],
                }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
              });
            </script>
            <hr>
            <div class="col-md-6">            
              <a href="{{route('inventario.index')}}" id="regresar" class="btn btn-primary">
                <i class="bi bi-arrow-return-left"></i>
                Regresar
              </a>          
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection