<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
        }
        h4, h6, p {
            margin: 0;
            padding: 5px 0;
            font-weight: 500;
        }
        .content{
            margin-left: 40px;
            margin-right: 40px;
            margin-top: 40px;
        }
        .encabezado{
            display: inline-block;
        }
        img {
            height: 48px;
            margin-left: 20px;
            margin-right: 20px;
        }
        .titulo-encabezado{
            font-size: 9pt;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            /* margin: 0 -15px; */
        }
        .col-2, .col-3, .col-6, .col-9, .col-10 {
            padding: 0 15px;
            box-sizing: border-box;
        }
        .col-2 {
            flex: 0 0 16.6667%;
            max-width: 16.6667%;
        }
        .col-9 {
            flex: 0 0 75%;
            max-width: 75%;
        }
        .col-10 {
            flex: 0 0 83.333%;
            max-width: 83.333%;
        }
        .fecha-hora{
            font-size: 7pt;
        }
        .titulo{
            text-align: center;
        }
    </style>
    <script>
        function subst() {
            var vars = {};
            var query_strings_from_url = document.location.search.substring(1).split('&');
            for (var query_string in query_strings_from_url) {
                if (query_strings_from_url.hasOwnProperty(query_string)) {
                    var temp_var = query_strings_from_url[query_string].split('=', 2);
                    vars[temp_var[0]] = decodeURI(temp_var[1]);
                }
            }
            var css_selector_classes = ['page', 'frompage', 'topage', 'webpage', 'section', 'subsection', 'date', 'isodate', 'time', 'title', 'doctitle', 'sitepage', 'sitepages'];
            for (var css_class in css_selector_classes) {
                if (css_selector_classes.hasOwnProperty(css_class)) {
                    var element = document.getElementsByClassName(css_selector_classes[css_class]);
                    for (var j = 0; j < element.length; ++j) {
                        element[j].textContent = vars[css_selector_classes[css_class]];
                    }
                }
            }
        }
    </script>
</head>
<body onload="subst()">
    <div class="content">
        <div>
            <div class="encabezado">
                <img src="{{ url('/dist/img/LogoINE.png') }}" alt="LogoINE">
            </div>
            <div class="encabezado">
                <h4 class="titulo-encabezado">DIRECCIÓN EJECUTIVA DE ADMINISTRACION</h4>
                <h4 class="titulo-encabezado">DIRECCIÓN DE RECURSOS MATERUALES Y SERVICIOS</h4>
                <h4 class="titulo-encabezado">SUBDIRECCIÓN DE ALMACENES INVENTARIOS Y DESINCORPORACIÓN</h4>
            </div>
        </div>
        <br><br>
        <div class="row">
            <div class="encabezado" style="text-align: left">
                <h6 class="fecha-hora">Fecha: {{$fecha}}</h6>
            </div>
            <div class="encabezado" style="text-align: right; margin-left: 580px">
                <h6 class="fecha-hora">Página <span class="page"></span> de <span class="topage"></span></h6>
            </div>
        </div>
        <div class="titulo">
            <h4 class="titulo">RESGUARDO DE BIENES MUEBLES</h4>
        </div>
        <div class="row">
            <div class="col-2">
                <h6 class="fecha-hora">Hora: {{$hora}}</h6>
            </div>
        </div>
        <br>
        <hr>
    </div>
</body>
</html>