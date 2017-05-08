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
                        <div class="col-md-4">
                            {!! Form::label('ROLES') !!}
                            {!! Form::select('idroles',$roles, null, ['class' => 'form-control', 'id' => 'idroles']) !!}
                        </div>
                    </div>
                    <br>