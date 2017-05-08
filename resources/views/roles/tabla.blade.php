                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th>DESCRIPCION</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody>      
                            {{ csrf_field() }}
                            @foreach($roles as $row)
                            <tr>
                                <th>{!! $row->descripcion !!}</th>
                                <th>
                                    <button class="btn-editar btn btn-primary" 
                                            data-id="{{$row->id}}" 
                                            data-descripcion="{{$row->descripcion}}" >
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
                    url     : "eliminar-roles",
                    data    : { 
                        '_token'  : $('input[name=_token]').val(),
                        id : id },
                    cache   : false,
                    success : function()
                    {
                        $("#tabla-roles").load("tabla-roles");
                    }
                });
            });

            $(".btn-editar").click(function(){
                document.FrmActualizar.descripcion.value = $(this).data('descripcion');
                document.FrmActualizar.id.value = $(this).data('id');
                $("#modal-actualizar").modal('show');
            });
        </script>