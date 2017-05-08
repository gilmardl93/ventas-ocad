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
    <h1 class="page-title">ROLES</h1>
    <button id="btn-modal-registro" class="btn btn-primary btn-outline">NUEVO</button>
    <p></p>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject bold uppercase">LISTADO DE ROLES</span>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <div id="tabla-roles"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL DE REGISTROS -->
    <div class="modal fade bs-modal-lg in" tabindex="-1" role="dialog" id="modal-registro">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    REGISTRAR ROL
                </div>
                <div class="modal-body">
                    {!! Form::open(['id' => 'FrmRegistro', 'novalidate' => 'novalidate']) !!}
                    <div id="formulario-roles"></div>
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
                    ACTUALIZAR ROL
                </div>
                <div class="modal-body">
                    {!! Form::open(['id' => 'FrmActualizar', 'name' => 'FrmActualizar', 'novalidate' => 'novalidate']) !!}
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('DESCRIPCION') !!}
                            {!! Form::text('descripcion',null, ['class' => 'form-control', 'id' => 'descripcion']) !!}
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
        $("#tabla-roles").load("tabla-roles");
        $("#formulario-roles").load("formulario-roles");

        $("#btn-modal-registro").click(function(){
            $("#modal-registro").modal('show');
        });

        $("#FrmRegistro").validate({
            rules :
            {
                descripcion   : { required : true }
            },
            messages :
            {
                descripcion  : "Ingrese rol"
            },
            submitHandler : function()
            {
                var data = $("#FrmRegistro").serialize();
                $.ajax({
                    type    : "POST",
                    url     : "registrar-roles",
                    data    : data,
                    cache   : false,
                    success : function()
                    {
                        $("#modal-registro").modal('hide');
                        $("#tabla-roles").load("tabla-roles");
                    }
                }); 
            }
        });

        $("#FrmActualizar").validate({
            rules :
            {
                descripcion   : { required : true }
            },
            messages :
            {
                descripcion  : "Ingrese rol"
            },
            submitHandler : function()
            {
                var data = $("#FrmActualizar").serialize();
                $.ajax({
                    type    : "POST",
                    url     : "actualizar-roles",
                    data    : data,
                    cache   : false,
                    success : function()
                    {
                        $("#modal-actualizar").modal('hide');
                        $("#tabla-roles").load("tabla-roles");
                    }
                }); 
            }
        });

    </script>
@stop