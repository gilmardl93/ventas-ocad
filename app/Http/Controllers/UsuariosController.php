<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Rol;
use DB;

class UsuariosController extends Controller
{
	public function login()
	{
		return view('autenticacion.login');
	}

	public function autenticar(Request $request)
	{
		if (Auth::attempt(['username' => $request->username, 'password' =>  $request->password, 'estado' => 1])) 
		{	
			echo 1;
		}else
		{
			echo 0;
		}
	}

	public function logout(Request $request)
	{
		$this->guard()->logout();

		$request->session()->flush();

		$request->session()->regenerate();

		return redirect('/');
	}

	protected function guard()
	{
		return Auth::guard();
	}

	public function index()
	{
		$roles = Rol::where('estado',1)->pluck('descripcion','id');
		return view('usuarios.listado',['roles' => $roles]);
	}

	public function tabla()
	{
		$usuarios = DB::table('users')
				->join('roles','users.idroles','=','roles.id')
				->where('users.estado',1)
				->select('users.id','users.username','users.nombres','users.paterno','users.materno','roles.descripcion','roles.id as idrol')
				->get();
		return view('usuarios.tabla',['usuarios' => $usuarios]);
	}

	public function dashboard()
	{
		return view('usuarios.dashboard');
	}
	
	public function formulario()
	{
		$roles = Rol::where('estado',1)->pluck('descripcion','id');
		return view('usuarios.formulario',['roles' => $roles]);
	}

	public function registrar(Request $request)
	{
		$data = new User();
		$data->username 	= $request->username;
		$data->password 	= bcrypt($request->password);
		$data->nombres 	= $request->nombres;
		$data->paterno 	= $request->paterno;
		$data->materno 	= $request->materno;
		$data->idroles 		= $request->idroles;
		$data->save();
	}

	public function actualizar(Request $request)
	{
		User::where('id', $request->id)
			->update([
				'username' 	=> $request->username,
				'nombres' 	=> $request->nombres,
				'paterno' 	=> $request->paterno,
				'materno' 	=> $request->materno,
				'idroles' 	=> $request->idroles,
				]);
	}

	public function eliminar(Request $request)
	{
		User::where('id' ,$request->id)->update(['estado' => 0 ]);
	}
}
