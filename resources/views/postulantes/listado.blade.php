{!! Html::style('assets/global/plugins/select2/css/select2.min.css') !!}
{!! Html::style('assets/global/plugins/select2/css/select2-bootstrap.min.css') !!}
    <select class="form-control select2" name="participantes" id="participantes">
        @foreach($participantes as $row)
        <option  value="{!! $row->dni !!} {!! $row->paterno !!}-{!! $row->materno !!}-{!! $row->nombres !!} ">{!! $row->paterno !!} {!! $row->materno !!} {!! $row->nombres !!}</option>
        @endforeach
    </select>
{!! Html::script('assets/global/plugins/jquery.min.js') !!}  
{!! Html::script('assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}  
{!! Html::script('assets/global/plugins/select2/js/select2.full.min.js') !!}  
{!! Html::script('assets/global/scripts/app.min.js') !!}  
{!! Html::script('assets/pages/scripts/components-select2.min.js') !!}  