@extends('layouts.admin')

@section('estilos')
  <style>
    /* Cambiar el color del botón activo (indicador de la página actual) */
    .pagination .page-item.active .page-link {
        background-color: #E83E8C !important;
        border-color: #E83E8C !important;
        color: white !important;
    }
  </style>    
@endsection

@section('content')
<div class="content" style="margin-left: 20px">
  <h1>Listado de usuarios</h1>

  @if ($message = Session::get('mensaje'))
    <script>
        Swal.fire({
          title: "Buen trabajo!",
          text: "{{$message}}",
          icon: "success"
        });
    </script>
  @endif

  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-pink">
        <div class="card-header">
          <h3 class="card-title"><b>Usuarios registrados</b></h3>
          <div class="card-tools">
            <a href="{{url('/usuarios/create')}}" class="btn" style="background-color:#E83E8C; color:white">
              <i class="bi bi-file-plus"></i> Agregar nuevo usuario
            </a>
          </div>
        </div>
        <div class="card-body" style="display: block;">
          <table id="example1" class="table table-bordered table-striped table-sm">
            <thead>
              <tr>
                <th>Nro</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              <?php $contador=0;?>
              @foreach ($usuarios as $usuario)
                <tr>
                  <td><?php echo $contador=$contador+1;?></td>
                  <td>{{$usuario->name}}</td>
                  <td>{{$usuario->email}}</td>
                  <td style="text-align: center">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="{{url('usuarios',$usuario->id)}}" type="button" class="btn btn-info">
                        <i class="bi bi-eye"></i>
                      </a>
                      <a href="{{route('usuarios.edit',$usuario->id)}}" type="button" class="btn btn-success">
                        <i class="bi bi-pencil"></i>
                      </a>
                      <form action="{{url('usuarios',$usuario->id)}}" method="post">
                        @csrf
                        {{method_field('DELETE')}}
                        <button type="submit" onclick="return confirm('¿Estas seguro de eliminar este registro?')" class="btn btn-danger" value="">
                          <i class="bi bi-trash"></i>
                        </button>
                      </form>
                    </div>
                  </td>
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
        </div>
      </div>
    </div>
  </div>
</div>
@endsection