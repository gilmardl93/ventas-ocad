                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th>NOMBRES</th>
                                <th>PATERNO</th>
                                <th>MATERNO</th>
                                <th>ROL</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody>      
                            {{ csrf_field() }}
                            @foreach($personales as $row)
                            <tr>
                                <th>{!! $row->nombres !!}</th>
                                <th>{!! $row->paterno !!}</th>
                                <th>{!! $row->materno !!}</th>
                                <th>{!! $row->descripcion !!}</th>
                                <th>
                                    <button class="btn-editar btn btn-primary" 
                                            data-id="{{$row->id}}" 
                                            data-nombres="{{$row->nombres}}" 
                                            data-paterno="{{$row->paterno}}" 
                                            data-materno="{{$row->materno}}"
                                            data-idroles="{{$row->idrol}}" >
                                    <span class="glyphicon glyphicon-edit"></span> EDITAR
                                    </button>
                                    <button class="btn-eliminar btn btn-danger" data-id="{{$row->id}}">
                                        <span class="glyphicon glyphicon-trash"></span> ELIMINAR
                                    </button>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
        {!! Html::script('assets/global/scripts/datatable.js') !!}
        {!! Html::script('assets/global/plugins/datatables/datatables.min.js') !!}
        {!! Html::script('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') !!}
        {!! Html::script('assets/pages/scripts/table-datatables-buttons.min.js') !!}
        <script type="text/javascript">
            $(".btn-eliminar").click(function(){
                var id = $(this).data('id');
                $.ajax({
                    type    : "POST",
                    url     : "eliminar-personal",
                    data    : { 
                        '_token'  : $('input[name=_token]').val(),
                        id : id },
                    cache   : false,
                    success : function()
                    {
                        $("#tabla-personales").load("tabla-personales");
                    }
                });
            });

            $(".btn-editar").click(function(){
                document.FrmActualizar.nombres.value = $(this).data('nombres');
                document.FrmActualizar.paterno.value = $(this).data('paterno');
                document.FrmActualizar.materno.value = $(this).data('materno');
                document.FrmActualizar.idroles.value = $(this).data('idroles');
                document.FrmActualizar.id.value = $(this).data('id');
                $("#modal-actualizar").modal('show');
            });
        </script>