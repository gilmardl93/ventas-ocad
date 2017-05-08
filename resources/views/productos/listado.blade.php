@extends('layouts.administrador')
@section('content')
	<!-- BEGIN PAGE BAR -->
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <span>Panel de Administrador</span>
            </li>
        </ul>
    </div>
    <h1 class="page-title">PRODUCTOS</h1>
    <button id="btn-modal-registro" class="btn btn-primary btn-outline">NUEVO</button>
    <p></p>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">LISTADO DE PRODUCTOS</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <div id="tabla-productos"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DE REGISTROS -->
    <div class="modal fade bs-modal-lg in" tabindex="-1" role="dialog" id="modal-registro">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    REGISTRAR PRODUCTO
                </div>
                <div class="modal-body">
                    {!! Form::open(['id' => 'FrmRegistro', 'novalidate' => 'novalidate']) !!}
                    <div id="formulario-productos"></div>
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <button type="submit" class="btn btn-default mt-ladda-btn ladda-button" data-style="expand-left" data-spinner-color="#333">
                            <span class="ladda-label"><span class="glyphicon glyphicon-floppy-disk"></span></span>
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL DE ACTUALIZAR -->
    <div class="modal fade bs-modal-lg in" tabindex="-1" role="dialog" id="modal-actualizar">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    ACTUALIZAR PRODUCTO
                </div>
                <div class="modal-body">
                    {!! Form::open(['id' => 'FrmActualizar', 'name' => 'FrmActualizar', 'novalidate' => 'novalidate']) !!}
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-md-3">
                            {!! Form::label('CODIGO') !!}
                            {!! Form::text('codigo',null, ['class' => 'form-control', 'id' => 'codigo']) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::label('NOMBRE') !!}
                            {!! Form::text('nombre',null, ['class' => 'form-control', 'id' => 'paterno']) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::label('DESCRIPCION') !!}
                            {!! Form::text('descripcion',null, ['class' => 'form-control', 'id' => 'descripcion']) !!}
                        </div>
                        <div class="col-md-3">
                            {!! Form::label('PRECIO') !!}
                            {!! Form::text('precio',null, ['class' => 'form-control', 'id' => 'precio']) !!}
                        </div>
                    </div>
                    <br>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <button type="submit" class="btn btn-default mt-ladda-btn ladda-button" data-style="expand-left" data-spinner-color="#333">
                            <span class="ladda-label"><span class="glyphicon glyphicon-floppy-disk"></span></span>
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    {!! Html::script('assets/global/plugins/jquery.min.js') !!}
    {!! Html::script('assets/pages/scripts/ui-buttons.min.js') !!}
    {!! Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') !!}

    <script type="text/javascript">
        $("#tabla-productos").load("tabla-productos");
        $("#formulario-productos").load("formulario-productos");

        $("#btn-modal-registro").click(function(){
            $("#modal-registro").modal('show');
        });

        $("#FrmRegistro").validate({
            rules :
            {
                nombre   : { required : true },
                codigo   : { required : true },
                descripcion   : { required : true }
            },
            messages :
            {
                nombres  : "Ingrese nombre",
                codigo  : "Ingrese el codigo",
                descripcion  : "Ingrese la descripcion"
            },
            submitHandler : function()
            {
                var data = $("#FrmRegistro").serialize();
                $.ajax({
                    type    : "POST",
                    url     : "registrar-productos",
                    data    : data,
                    cache   : false,
                    success : function()
                    {
                        $("#modal-registro").modal('hide');
                        $("#tabla-productos").load("tabla-productos");
                    }
                }); 
            }
        });

        $("#FrmActualizar").validate({
            rules :
            {
                nombre   : { required : true },
                codigo   : { required : true },
                descripcion   : { required : true }
            },
            messages :
            {
                nombres  : "Ingrese nombre",
                codigo  : "Ingrese el codigo",
                descripcion  : "Ingrese la descripcion"
            },
            submitHandler : function()
            {
                var data = $("#FrmActualizar").serialize();
                $.ajax({
                    type    : "POST",
                    url     : "actualizar-productos",
                    data    : data,
                    cache   : false,
                    success : function()
                    {
                        $("#modal-actualizar").modal('hide');
                        $("#tabla-productos").load("tabla-productos");
                    }
                }); 
            }
        });

    </script>
@stop