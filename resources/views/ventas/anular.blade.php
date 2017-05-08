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
    <h1 class="page-title">ANULAR VENTA</h1>
    <p></p>
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-dark">
                        <i class="icon-settings font-dark"></i>
                    </div>
                    <div class="tools"> </div>
                </div>
                <div class="alert alert-danger" role="alert" id="anulado">RECIBO ANULADO</div>
                <div class="alert alert-danger" role="alert" id="danger">EL RECIBO INGRESADO NO EXISTE O ESTA SE ENCUENTRA ANULADO</div>
                <div class="portlet-body">
                     {!! Form::open(['id' => 'FrmBuscar', 'name' => 'FrmRegistro', 'novalidate' => 'novalidate']) !!}
                    <input type="hidden" name="idusuario" id="idusuario" value="{!! Auth::user()->id !!}">
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('BUSCAR COMPROBANTE') !!}
                            {!! Form::text('recibo',null,['class' => 'form-control','id' => 'recibo'])!!}
                        </div>
                    </div><br>
                    <div class="row" id="anular">
                        <div class="col-md-12">
                            {!! Form::label('MOTIVO PARA ANULAR') !!}
                            {!! Form::text('motivo',null,['class' => 'form-control','id' => 'motivo'])!!}
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <button type="submit" class="btn btn-default mt-ladda-btn ladda-button" data-style="expand-left" data-spinner-color="#333">
                            <span class="ladda-label"><span class="glyphicon glyphicon-search"></span> BUSCAR COMPROBANTE</span>
                            </button>
                            <button class="btn btn-danger mt-ladda-btn ladda-button" id="anular-comprobante"> ANULAR COMPROBANTE</button>
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
        $("#anular").hide();
        $("#anulado").hide();
        $("#danger").hide();
        $("#anular-comprobante").hide();

        $("#anular-comprobante").on('click',function(){
                var motivo = document.getElementById('motivo').value;
                if(motivo == "")
                {
                    $("#anulado").show().html("Ingrese el motivo");
                }else 
                {
                     var data = $("#FrmBuscar").serialize();
                    console.log(data);
                    $.ajax({
                        type    : "post",
                        url         : "anular-comprobante",
                        data    : data,
                        cache : false,
                        success : function(echo)
                        {
                                if(echo  ==  1)
                                {
                                    $("#anulado").show().html("Recibo anulado");
                                }else if(echo  == 0)
                                {
                                    $("#anulado").show().html("Error al anular el recibo");
                                }
                        }
                    });
                }
               
        });


        $("#FrmBuscar").validate({
            rules :
            {
                numerocp   : { required : true }
            },
            messages :
            {
                numerocp  : "Ingrese numero de comprobante"
            },
            submitHandler : function()
            {
                var data = $("#FrmBuscar").serialize();
                $.ajax({
                    type    : "POST",
                    url     : "buscar-comprobante",
                    data    : data,
                    cache   : false,
                    success : function(echo)
                    {
                            if(echo == 1)
                            {
                                    $("#anular-comprobante").show();
                                    $("#anular").show();
                                    $("#danger").hide();
                            }else if(echo == 0)
                            {
                                    $("#danger").show();
                                    $("#anular").hide();
                            }
                    }
                }); 
            }
        });

    </script>
@stop