@extends('layouts.administrador')
@section('content')
<button class="btn btn-primary btn-venta-hoy">VENTAS DE HOY</button>
<button class="btn btn-primary">ULTIMOS 30 DIAS</button>
<br>
<iframe src="{!! route('PDFDiario') !!}" width="900" height="950" id="recibo"></iframe>
@stop
