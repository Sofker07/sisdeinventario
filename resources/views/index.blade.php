@extends('layouts.admin')

@section('content')
   <div class="content" style="margin: 20px">
      <h1>Página Principal</h1>
      <br>
      <div class="row">
         <div class="col-md-6">
            <div class="row">
               <div class="col-lg-6">
                  <div class="small-box bg-info" style="height: 160px">
                     <div class="inner">
                        <h3>{{$articulos}}</h3>
                        <p>Total de Artículos</p>
                     </div>
                     <div class="icon">
                        <i class="bi bi-box-seam"></i>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="small-box bg-success" style="height: 160px">
                     <div class="inner">
                        <h3>{{$registros_actuales}}</h3>
                        <p>Artiuclos inventariados</p>
                     </div>
                     <div class="icon">
                        <i class="bi bi-clipboard-check"></i>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="small-box bg-danger" style="height: 160px">
                     <div class="inner">
                        <h3>{{$registros_faltantes}}</h3>
                        <p>Artículos faltantes</p>
                     </div>
                     <div class="icon">
                        <i class="bi bi-clipboard-x"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="col-lg-12">
               <div class="card card-primary">
                  <div class="card-header">
                     <h3 class="card-title">Donut Chart</h3>
                     <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                           <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                           <i class="fas fa-times"></i>
                        </button>
                     </div>
                  </div>
                  <div class="card-body">
                     <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
@push('códigoJS')
   <script>
      $(function () {
         var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
         var donutData        = {
            labels: @json($labels),
            datasets: [
            {
               data: @json($data),
               backgroundColor : ['#DB0F7B', '#565656'],
            }
            ]
         }
         var donutOptions     = {
            maintainAspectRatio : false,
            responsive : true,
         }
         //Create pie or douhnut chart
         // You can switch between pie and douhnut using the method below.
         new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
         })
      });
   </script> 
@endpush