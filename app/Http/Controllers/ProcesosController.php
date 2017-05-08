<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proceso;

class ProcesosController extends Controller
{
	public function index()
	{
		return view('procesos.listado');
	}

	public function tabla()
	{
		$procesos = Proceso::where('estado',1)->get();
		return view('procesos.tabla',['procesos' => $procesos]);
	}

	public function formulario()
	{
		return view('procesos.formulario');
	}

	public function registrar(Request $request)
	{
		$data = new Proceso();
		$data->descripcion = $request->descripcion;
		$data->save();
	}

	public function actualizar(Request $request)
	{
		Proceso::where('id', $request->id)
				->update([
					'descripcion' => $request->descripcion
					]);
	}

	public function eliminar(Request $request)
	{
		Proceso::where('id',$request->id)->update(['estado' => 0]);
	}
}
