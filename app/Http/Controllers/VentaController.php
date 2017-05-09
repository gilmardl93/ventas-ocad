<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Postulante;
use App\Proceso;
use App\Producto;
use App\Venta;
use PDF;
use DB;

class VentaController extends Controller
{
	public function postulante()
	{
		$participantes = Postulante::all();
		return view('postulantes.listado', ['participantes' => $participantes]);
	}

	public function index()
	{
		$procesos = Proceso::where('estado',1)->pluck('descripcion','id');
		$productos = Producto::where('estado',1)->pluck('descripcion','id');
		return view('ventas.inicio',['procesos' => $procesos, 'productos' => $productos]);
	}

	public function registrar(Request $request)
	{
		date_default_timezone_set('America/Lima');
		$productos = Producto::where('id',$request->idproducto)->get();
		foreach($productos as $precio):
			$precio 	= $precio->precio ;
		endforeach;

		$maximo = Venta::where('anulado',0)->max('recibo');

		$data = new Venta();
		$data->idproceso 		= $request->idproceso;
		$data->idproducto 	= $request->idproducto;
		$data->cliente_dni		= substr($request->participantes,0,8);
		$data->cliente_datos	= substr($request->participantes,9);
		$data->cantidad 		= 1;
		$data->recibo			= $maximo +1;
		$data->precio 			= $precio;
		$data->idusuario 		= $request->idusuario;
		$data->fecha 			= date("Y-m-d");
		$data->hora 			= date("H:i:s");
		$data->save();
	}

	public function anular()
	{
		return view('ventas.anular');
	}

	public function buscar(Request $request)
	{
		$comprobante = Venta::where([['recibo', $request->recibo],['anulado',0]])->get();
		if($comprobante->count() == 1)
		{
			echo 1;
		}else 
		{
			echo 0;
		}
	}

	public function anularrecibo(Request $request)
	{
		$anulado = Venta::where('recibo', $request->recibo)->update([
					'anulado' 	=> 1,
					'motivo'	=> $request->motivo
					]);

		if($anulado)
		{
			echo 1;
		}else 
		{
			echo 0;
		}
	}

	public function EmitirReciboPDF()
	{
		$venta = DB::table('ventas')
				->join('productos','ventas.idproducto','=','productos.id')
				->join('procesos','ventas.idproceso','=','procesos.id')
				->where('ventas.idusuario',Auth::user()->id)
				->select('ventas.*','productos.descripcion as productos','procesos.descripcion as procesos')
				->orderBy('ventas.created_at','desc')
				->take(1)
				->get();
		foreach($venta as $row):
		endforeach;
		PDF::AddPage("L","A5");
		PDF::Image('logo-uni.jpg', 5, null, 25, null);
        	PDF::SetXY(30,15);
        	PDF::SetFontSize('10');
        	PDF::Cell(150,6,'UNIVERSIDAD NACIONAL DE INGENIERÍA',0,2);
        	PDF::Cell(150,6,'OFICINA CENTRAL DE ADMISIÓN',0,2);
        	PDF::Cell(150,6,'CONCURSO DE ADMISIÓN',0,2);
        	PDF::SetXY(40,45);
        	PDF::Cell(45,6,$row->procesos,0,2);
        	PDF::SetXY(15,55);
        	PDF::Cell(90,6,'CONCEPTO',1,1,'L');
        	PDF::SetXY(80,55);
        	PDF::Cell(10,6,'PRECIO',0,2);
        	PDF::SetXY(15,55);
        	PDF::Cell(150,25,str_replace("-"," ",$row->cliente_datos) . ' - ' .$row->cliente_dni,0,2);
        	PDF::SetXY(80,65);
        	PDF::Cell(150,6,'S/. ' . $row->precio ,0,2);
        	PDF::SetXY(60,110);
        	PDF::Cell(43,6,'TOTAL',1,1,'L');
        	PDF::SetXY(80,110);
        	PDF::Cell(150,6,'S/. ' . $row->precio ,0,2);
        	PDF::SetXY(75,120);
        	PDF::Cell(10,6,'POSTULANTE',0,2);
        	// DUPLICADO
        	PDF::SetXY(90,12);
		PDF::Image('logo-uni.jpg', 108, null, 25, null);
        	PDF::SetXY(132,15);
        	PDF::SetFontSize('10');
        	PDF::Cell(150,6,'UNIVERSIDAD NACIONAL DE INGENIERÍA',0,2);
        	PDF::Cell(150,6,'OFICINA CENTRAL DE ADMISIÓN',0,2);
        	PDF::Cell(150,6,'CONCURSO DE ADMISIÓN',0,2);
        	PDF::SetXY(140,45);
        	PDF::Cell(45,6,$row->procesos,0,2);
        	PDF::SetXY(115,55);
        	PDF::Cell(90,6,'CONCEPTO',1,1,'L');
        	PDF::SetXY(180,55);
        	PDF::Cell(10,6,'PRECIO',0,2);
        	PDF::SetXY(115,55);
        	PDF::Cell(115,25,str_replace("-"," ",$row->cliente_datos) . ' - ' .$row->cliente_dni,0,2);
        	PDF::SetXY(180,65);
        	PDF::Cell(150,6,'S/. ' . $row->precio ,0,2);
        	PDF::SetXY(160,110);
        	PDF::Cell(43,6,'TOTAL',1,1,'L');
        	PDF::SetXY(180,110);
        	PDF::Cell(150,6,'S/. ' . $row->precio ,0,2);
        	PDF::SetXY(175,120);
        	PDF::Cell(10,6,'POSTULANTE',0,2);
		ob_end_clean();
        	PDF::Output('RECIBO_PAGO.pdf');
	}
}
