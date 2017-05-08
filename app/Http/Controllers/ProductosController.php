<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductosController extends Controller
{
	public function index()
	{
		return view('productos.listado');
	}

	public function tabla()
	{
		$productos = Producto::where('estado',1)->get();
		return view('productos.tabla',['productos' => $productos]);
	}

	public function formulario()
	{
		return view('productos.formulario');
	}

	public function registrar(Request $request)
	{
		$data = new Producto();
		$data->nombre	 = $request->nombre;
		$data->codigo 	 	 = $request->codigo;
		$data->descripcion = $request->descripcion;
		$data->precio 		= $request->precio;
		$data->save();
	}

	public function actualizar(Request $request)
	{
		Producto::where('id', $request->id)
				->update([
					'nombre' 		=> $request->nombre,
					'codigo' 		=> $request->codigo,
					'descripcion' 	=> $request->descripcion,
					'precio' 		=> $request->precio
					]);
	}

	public function eliminar(Request $request)
	{
		Producto::where('id',$request->id)->update(['estado' => 0]);
	}
}
