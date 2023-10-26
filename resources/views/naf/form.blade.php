<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Id_naf') }}
            {{ Form::text('Id_naf', $naf->Id_naf, ['class' => 'form-control' . ($errors->has('Id_naf') ? ' is-invalid' : ''), 'placeholder' => 'Id Naf']) }}
            {!! $errors->first('Id_naf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_naf') }}
            {{ Form::text('nombre_naf', $naf->nombre_naf, ['class' => 'form-control' . ($errors->has('nombre_naf') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Naf']) }}
            {!! $errors->first('nombre_naf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ubicacion_naf') }}
            {{ Form::text('ubicacion_naf', $naf->ubicacion_naf, ['class' => 'form-control' . ($errors->has('ubicacion_naf') ? ' is-invalid' : ''), 'placeholder' => 'Ubicacion Naf']) }}
            {!! $errors->first('ubicacion_naf', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $naf->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Id_area') }}
            {{ Form::text('Id_area', $naf->Id_area, ['class' => 'form-control' . ($errors->has('Id_area') ? ' is-invalid' : ''), 'placeholder' => 'Id Area']) }}
            {!! $errors->first('Id_area', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>