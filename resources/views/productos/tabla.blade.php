                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th>NOMBRE</th>
                                <th>CODIGO</th>
                                <th>DESCRIPCION</th>
                                <th>PRECIO</th>
                                <th>ACCION</th>
                            </tr>
                        </thead>
                        <tbody>      
                            {{ csrf_field() }}
                            @foreach($productos as $row)
                            <tr>
                                <th>{!! $row->nombre !!}</th>
                                <th>{!! $row->codigo !!}</th>
                                <th>{!! $row->descripcion !!}</th>
                                <th>{!! $row->precio !!}</th>
                                <th>
                                    <button class="btn-editar btn btn-primary" 
                                            data-id="{{$row->id}}" 
                                            data-nombre="{{$row->nombre}}" 
                                            data-codigo="{{$row->codigo}}" 
                                            data-descripcion="{{$row->descripcion}}"
                                            data-precio="{{$row->precio}}">
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
                    url     : "eliminar-productos",
                    data    : { 
                        '_token'  : $('input[name=_token]').val(),
                        id : id },
                    cache   : false,
                    success : function()
                    {
                        $("#tabla-productos").load("tabla-productos");
                    }
                });
            });

            $(".btn-editar").click(function(){
                document.FrmActualizar.nombre.value = $(this).data('nombre');
                document.FrmActualizar.codigo.value = $(this).data('codigo');
                document.FrmActualizar.descripcion.value = $(this).data('descripcion');
                document.FrmActualizar.precio.value = $(this).data('precio');
                document.FrmActualizar.id.value = $(this).data('id');
                $("#modal-actualizar").modal('show');
            });
        </script>