<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('nombre_requisito') }}
            {{ Form::text('nombre_requisito', $requisitosNaf->nombre_requisito ?? '', ['class' => 'form-control' . ($errors->has('nombre_requisito') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Requisito', 'required' => 'required',]) }}
            {!! $errors->first('nombre_requisito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion_requisito') }}
            {{ Form::text('descripcion_requisito', $requisitosNaf->descripcion_requisito ?? '', ['class' => 'form-control' . ($errors->has('descripcion_requisito') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Requisito', 'required' => 'required',]) }}
            {!! $errors->first('descripcion_requisito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <!--<div class="form-group" style="display: none;">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $requisitosNaf->estado ?? '', ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>-->
        <div class="form-group" style="display: none;">
            {{ Form::label('Id_naf') }}
            {{ Form::text('Id_naf', $requisitosNaf->Id_naf ?? '', ['class' => 'form-control' . ($errors->has('Id_naf') ? ' is-invalid' : ''), 'placeholder' => 'Id Naf', 'required' => 'required',]) }}
            {!! $errors->first('Id_naf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        <!--<a href="{{ route('nafs.index') }}" class="btn btn-danger">{{ __('Volver a Nafs') }}</a>-->
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
            {{ __('Cerrar') }}<span aria-hidden="true"></span>
        </button>
    </div>
</div>
