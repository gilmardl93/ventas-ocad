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
    <h1 class="page-title">PERSONAL</h1>
    <button id="btn-modal-registro" class="btn btn-primary btn-outline">NUEVO</button>
    <p></p>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">LISTADO DE PERSONAL</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <div id="tabla-personal"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DE REGISTROS -->
    <div class="modal fade bs-modal-lg in" tabindex="-1" role="dialog" id="modal-registro">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    REGISTRAR PERSONAL
                </div>
                <div class="modal-body">
                    {!! Form::open(['id' => 'FrmRegistro', 'novalidate' => 'novalidate']) !!}
                    <div id="formulario-personal"></div>
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
                    ACTUALIZAR PERSONAL
                </div>
                <div class="modal-body">
                    {!! Form::open(['id' => 'FrmActualizar', 'name' => 'FrmActualizar', 'novalidate' => 'novalidate']) !!}
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-md-4">
                            {!! Form::label('NOMBRES') !!}
                            {!! Form::text('nombres',null, ['class' => 'form-control', 'id' => 'nombres']) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Form::label('PATERNO') !!}
                            {!! Form::text('paterno',null, ['class' => 'form-control', 'id' => 'paterno']) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Form::label('MATERNO') !!}
                            {!! Form::text('materno',null, ['class' => 'form-control', 'id' => 'materno']) !!}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::label('ROLES') !!}
                            {!! Form::select('idroles',$roles, null, ['class' => 'form-control', 'id' => 'idroles']) !!}
                        </div>
                    </div>
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
        $("#tabla-personal").load("tabla-personal");
        $("#formulario-personal").load("formulario-personal");

        $("#btn-modal-registro").click(function(){
            $("#modal-registro").modal('show');
        });

        $("#FrmRegistro").validate({
            rules :
            {
                nombres   : { required : true },
                paterno   : { required : true },
                materno   : { required : true }
            },
            messages :
            {
                nombres  : "Ingrese nombre",
                paterno  : "Ingrese su apellido paterno",
                materno  : "Ingrese su apellido materno"
            },
            submitHandler : function()
            {
                var data = $("#FrmRegistro").serialize();
                $.ajax({
                    type    : "POST",
                    url     : "registrar-personal",
                    data    : data,
                    cache   : false,
                    success : function()
                    {
                        $("#modal-registro").modal('hide');
                        $("#tabla-personal").load("tabla-personal");
                    }
                }); 
            }
        });

        $("#FrmActualizar").validate({
            rules :
            {
                nombres   : { required : true },
                paterno   : { required : true },
                materno   : { required : true }
            },
            messages :
            {
                nombres  : "Ingrese nombre",
                paterno  : "Ingrese su apellido paterno",
                materno  : "Ingrese su apellido materno"
            },
            submitHandler : function()
            {
                var data = $("#FrmActualizar").serialize();
                $.ajax({
                    type    : "POST",
                    url     : "actualizar-personal",
                    data    : data,
                    cache   : false,
                    success : function()
                    {
                        $("#modal-actualizar").modal('hide');
                        $("#tabla-personal").load("tabla-personal");
                    }
                }); 
            }
        });

    </script>
@stop