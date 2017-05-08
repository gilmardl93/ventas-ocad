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
    <h1 class="page-title">NUEVA VENTA</h1>
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
                <div class="alert alert-success" role="alert" id="success">SE REGISTRO NUEVA VENTA</div>
                <div class="portlet-body">
                     {!! Form::open(['id' => 'FrmRegistro', 'name' => 'FrmRegistro', 'novalidate' => 'novalidate']) !!}
                    <input type="hidden" name="idusuario" id="idusuario" value="{!! Auth::user()->id !!}">
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('CONCURSO') !!}
                            {!! Form::select('idproceso',$procesos, null, ['class' => 'form-control', 'id' => 'idproceso']) !!}
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('PRODUCTO') !!}
                            {!! Form::select('idproducto',$productos, null, ['class' => 'form-control', 'id' => 'idproducto']) !!}
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-12">
                            {!! Form::label('POSTULANTES') !!}
                            <div id="listado-postulantes"></div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <button type="submit" class="btn btn-default mt-ladda-btn ladda-button" data-style="expand-left" data-spinner-color="#333">
                            <span class="ladda-label"><span class="glyphicon glyphicon-floppy-disk"></span> REGISTRAR VENTA</span>
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                            <button class="btn-eliminar btn btn-success btn-generar" data-id="{!! Auth::user()->id !!}">
                            <span class="glyphicon glyphicon-trash"></span> GENERAR BOLETA
                            </button>
                </div>
            </div>
        </div>
    </div>                   
    <iframe src="{!! route('PDFRecibo') !!}" width="900" height="650" id="recibo"></iframe>
    {!! Html::script('assets/global/plugins/jquery.min.js') !!}
    {!! Html::script('assets/pages/scripts/ui-buttons.min.js') !!}
    {!! Html::script('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') !!}

    <script type="text/javascript">
        $("#listado-postulantes").load("listado-postulantes");
        $("#success").hide();

        $(".btn-generar").on("click",function(){
            var id = $(this).data('id');
            $.ajax({
                type     : "post",
                url         : "generar-recibo",
                data       : { 
                        '_token'  : $('input[name=_token]').val(),
                        id : id },
                success : function(echo)
                {
                    console.log(echo);
                    $("#recibo").show();
                }
            });
        });

        $("#FrmRegistro").validate({
            rules :
            {
                idproceso   : { required : true }
            },
            messages :
            {
                idproceso  : "Seleccione proceso"
            },
            submitHandler : function()
            {
                var data = $("#FrmRegistro").serialize();
                console.log(data);
                $.ajax({
                    type    : "POST",
                    url     : "registrar-venta",
                    data    : data,
                    cache   : false,
                    success : function(echo)
                    {
                        $("#success").show();
                        $(".btn-generar").attr('disabled',false);
                        console.log(echo);
                    }
                }); 
            }
        });

    </script>
@stop