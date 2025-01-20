<?php

    namespace App\Http\Controllers;

    use App\Models\Invantario;
    use Carbon\Carbon;
    use Barryvdh\Snappy\Facades\SnappyPdf;
    use Illuminate\Support\Facades\View;
    use Illuminate\Http\Request;
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use ZipArchive;

    class ReportesController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            return view('reportes.index');
        }

        public function reportes(Request $request)
        {
            //Busqueda de informacion por RFC
            $rfc = $request->rfc_resguardante;

            // Obtener los datos principales
            $activos = Invantario::where('rfc_resguardante', $rfc)->get();
            $datos = $activos->first();
            $localizados = $activos->where('localizado', true);
            $nolocalizados = $activos->where('localizado', false);

            // Fechas y horas
            $carbon = Carbon::now('America/Mexico_City');
            $fecha = $carbon->toDateString();
            $hora = $carbon->toTimeString();
            $year = $carbon->year();
            $fecha_actual = $carbon->locale('es')->translatedFormat('l, j \d\e F \d\e Y');
            
            $pdfs = [
                //Creacion del reporte de todos los articulos
                'Resguardo_de_bienes_muebles.pdf' => SnappyPdf::loadView('reportes.articulos', compact('activos', 'datos'))
                    ->setOption('header-html', view('reportes.header', compact('fecha', 'hora'))->render())
                    ->setOption('margin-top', '70mm')
                    ->setOption('enable-local-file-access', true)
                    ->setOption('no-stop-slow-scripts', true)
                    ->setOption('disable-smart-shrinking', true)
                    ->setPaper('Letter')
                    ->output(),
                    
                //creacion del reporte de articulos localizados
                'Localizados.pdf' => SnappyPdf::loadView('reportes.localizados', compact('localizados', 'datos', 'year'))
                    ->setOption('header-html', null)
                    ->setOption('margin-top', '10mm')
                    ->setOption('footer-html', view('reportes.footer', compact('fecha_actual', 'hora'))->render())
                    ->setOption('margin-bottom', '20mm')
                    ->setOption('enable-local-file-access', true)
                    ->setOption('no-stop-slow-scripts', true)
                    ->setOption('disable-smart-shrinking', true)
                    ->setOrientation('landscape')
                    ->setPaper('Letter')
                    ->output(),
            
                //creacion del reporte de articulos no localizados
                'No_localizados.pdf' => SnappyPdf::loadView('reportes.nolocalizados', compact('nolocalizados', 'datos', 'year'))
                    ->setOption('header-html', null)
                    ->setOption('margin-top', '10mm')
                    ->setOption('footer-html', view('reportes.footer', compact('fecha_actual', 'hora'))->render())
                    ->setOption('margin-bottom', '20mm')
                    ->setOption('enable-local-file-access', true)
                    ->setOption('no-stop-slow-scripts', true)
                    ->setOption('disable-smart-shrinking', true)
                    ->setOrientation('landscape')
                    ->setPaper('Letter')
                    ->output(),
            ];
            // Crear el archivo ZIP
            $zipPath = storage_path('app/public/reportes.zip');
            $zip = new ZipArchive;

            if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
                foreach ($pdfs as $fileName => $pdfContent) {
                    $zip->addFromString($fileName, $pdfContent);
                }
                $zip->close();
            }        
            return response()->download($zipPath)->deleteFileAfterSend(true);
        }

        public function base()
        {
            return view('reportes.base');
        }

        public function excel()
        {
            $activos = Invantario::all();
            // Renderizar la vista
            $html = View::make('reportes.excel', compact('activos'))->render();

            // Crear una hoja de cálculo
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Cargar el contenido HTML en la hoja de cálculo
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Html();
            $spreadsheet = $reader->loadFromString($html);

            // Escribir el archivo Excel
            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

            // Guardar en un archivo temporal
            $fileName = 'inventario_general.xlsx';
            $tempFile = tempnam(sys_get_temp_dir(), $fileName);
            $writer->save($tempFile);

            // Descargar el archivo
            return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);   
        }
    }
