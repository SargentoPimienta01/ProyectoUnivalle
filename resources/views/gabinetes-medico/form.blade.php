<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Id_gabinetemedico') }}
            {{ Form::text('Id_gabinetemedico', $gabinetesMedico->Id_gabinetemedico, ['class' => 'form-control' . ($errors->has('Id_gabinetemedico') ? ' is-invalid' : ''), 'placeholder' => 'Id Gabinetemedico']) }}
            {!! $errors->first('Id_gabinetemedico', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_gabinetemedico') }}
            {{ Form::text('nombre_gabinetemedico', $gabinetesMedico->nombre_gabinetemedico, ['class' => 'form-control' . ($errors->has('nombre_gabinetemedico') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Gabinetemedico']) }}
            {!! $errors->first('nombre_gabinetemedico', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ubicacion_gabinetemedico') }}
            {{ Form::text('ubicacion_gabinetemedico', $gabinetesMedico->ubicacion_gabinetemedico, ['class' => 'form-control' . ($errors->has('ubicacion_gabinetemedico') ? ' is-invalid' : ''), 'placeholder' => 'Ubicacion Gabinetemedico']) }}
            {!! $errors->first('ubicacion_gabinetemedico', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $gabinetesMedico->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Id_area') }}
            {{ Form::text('Id_area', $gabinetesMedico->Id_area, ['class' => 'form-control' . ($errors->has('Id_area') ? ' is-invalid' : ''), 'placeholder' => 'Id Area']) }}
            {!! $errors->first('Id_area', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>