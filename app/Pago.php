<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
	protected $connection = "admision";

	protected $table = "PAGOS_OCAD";
}
