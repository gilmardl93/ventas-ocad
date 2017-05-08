<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rol;

class RolesController extends Controller
{
	public function index()
	{
		return view('roles.listado');
	}

	public function tabla()
	{
		$roles = Rol::where('estado',1)->get();
		return view('roles.tabla',['roles' => $roles]);
	}

	public function formulario()
	{
		return view('roles.formulario');
	}

	public function registrar(Request $request)
	{
		$data = new Rol();
		$data->descripcion = $request->descripcion;
		$data->save();
	}

	public function actualizar(Request $request)
	{
		Rol::where('id', $request->id)
				->update([
					'descripcion' => $request->descripcion
					]);
	}

	public function eliminar(Request $request)
	{
		Rol::where('id',$request->id)->update(['estado' => 0]);
	}
}
