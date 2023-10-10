<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Id_caja') }}
            {{ Form::text('Id_caja', $caja->Id_caja, ['class' => 'form-control' . ($errors->has('Id_caja') ? ' is-invalid' : ''), 'placeholder' => 'Id Caja']) }}
            {!! $errors->first('Id_caja', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_caja') }}
            {{ Form::text('nombre_caja', $caja->nombre_caja, ['class' => 'form-control' . ($errors->has('nombre_caja') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Caja']) }}
            {!! $errors->first('nombre_caja', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion_caja') }}
            {{ Form::text('descripcion_caja', $caja->descripcion_caja, ['class' => 'form-control' . ($errors->has('descripcion_caja') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Caja']) }}
            {!! $errors->first('descripcion_caja', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $caja->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Id_area') }}
            {{ Form::text('Id_area', $caja->Id_area, ['class' => 'form-control' . ($errors->has('Id_area') ? ' is-invalid' : ''), 'placeholder' => 'Id Area']) }}
            {!! $errors->first('Id_area', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>