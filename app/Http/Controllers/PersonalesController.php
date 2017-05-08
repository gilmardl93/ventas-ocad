<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Rol;
use DB;

class PersonalesController extends Controller
{
	public function index()
	{
		$roles = Rol::where('estado',1)->pluck('descripcion','id');
		return view('personales.listado',['roles' => $roles]);
	}

	public function tabla()
	{
		$personales = DB::table('personales')
				->join('roles','personales.idroles','=','roles.id')
				->select('personales.id','personales.nombres','personales.paterno','personales.materno','roles.descripcion','roles.id as idrol')
				->where('personales.estado',1)
				->get();
		return view('personales.tabla',['personales' => $personales]);
	}

	public function formulario()
	{
		$roles = Rol::where('estado',1)->pluck('descripcion','id');
		return view('personales.formulario',['roles' => $roles]);
	}

	public function registrar(Request $request)
	{
		$data = new Personal();
		$data->nombres	= $request->nombres;
		$data->paterno 	= $request->paterno;
		$data->materno 	= $request->materno;
		$data->idroles 		= $request->idroles;
		$data->save();
	}

	public function actualizar(Request $request)
	{
		Personal::where('id', $request->id)
				->update([
					'nombres' 	=> $request->nombres,
					'paterno' 	=> $request->paterno,
					'materno' 	=> $request->materno,
					'idroles' 	=> $request->idroles
					]);
	}

	public function eliminar(Request $request)
	{
		Personal::where('id',$request->id)->update(['estado' => 0]);
	}
}
