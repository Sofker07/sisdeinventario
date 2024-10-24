@extends('layouts.admin')

@section('content')
   <div class="content" style="margin: 20px">
      <h1>Página Principal</h1>
      <br>
      <div class="row">
         <div class="col-12 col-sm-6 col-md-3">
            <a href="{{url('database')}}">
               <div class="info-box" style="height: 85px">
                  <span class="info-box-icon bg-pink elevation-1"><i class="bi bi-database-add"></i></span>
                  <div class="info-box-content">
                     <span class="info-box-text" style="color: black">Importar Base de Datos</span>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-12 col-sm-6 col-md-3">
            <a href="{{url('inventario')}}">
               <div class="info-box" style="height: 85px">
                  <span class="info-box-icon bg-pink elevation-1"><i class="bi bi-clipboard-data"></i></span>
                  <div class="info-box-content">
                     <span class="info-box-text" style="color: black">Comenzar Inveantario</span>
                  </div>
               </div>
            </a>
         </div>
         <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box" style="height: 85px">
               <span class="info-box-icon bg-pink elevation-1">
                     <a href="#" id="dynamic-link">
                        <i class="bi bi-journal-text"></i>
                     </a>
               </span>
               <div class="info-box-content">
                  <span class="info-box-text" style="color: black">Ver historial</span>
                  <input type="text" class="form-control form-control-sm mt-2" id="input-value" placeholder="No. de artículo">
               </div>
            </div>
         </div>
         <div class="col-12 col-sm-6 col-md-3">
            <a href="#">
               <div class="info-box" style="height: 85px">
                  <span class="info-box-icon bg-pink elevation-1"><i class="bi bi-file-earmark-text"></i></span>
                  <div class="info-box-content">
                     <span class="info-box-text" style="color: black">Generar reportes</span>
                  </div>
               </div>
            </a>
         </div>
      </div>
      <div class="row">
         <div class="col-md-6">
            <div class="row">
               <div class="col-lg-6">
                  <div class="small-box" style="height: 160px; background-color: #A1116E;">
                     <div class="inner">
                        <h3 style="color: white">{{$articulos}}</h3>
                        <p style="color: white">Total de Artículos</p>
                     </div>
                     <div class="icon">
                        <i class="bi bi-box-seam"></i>
                     </div>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="small-box" style="height: 160px; background-color: #B83B87;">
                     <div class="inner">
                        <h3 style="color: white">{{$registros_actuales}}</h3>
                        <p style="color: white">Artiuclos inventariados</p>
                     </div>
                     <div class="icon">
                        <i class="bi bi-clipboard-check"></i>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="small-box" style="height: 160px; background-color: #863780;">
                     <div class="inner">
                        <h3 style="color: white">{{$registros_faltantes}}</h3>
                        <p style="color: white">Artículos faltantes</p>
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
               <div class="card card-pink">
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
         new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
         })
      });
   </script>
   <script>
      document.getElementById('dynamic-link').addEventListener('click', function(event) {
      event.preventDefault();
      var inputValue = document.getElementById('input-value').value;
      var newUrl = "/sisdeinventario/public/historial/" + inputValue;
      this.setAttribute('href', newUrl);
      window.location.href = newUrl;
      });
   </script>
@endpush