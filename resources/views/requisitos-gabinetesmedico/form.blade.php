<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Id_requisito') }}
            {{ Form::text('Id_requisito', $requisitosGabinetesMedico->Id_requisito, ['class' => 'form-control' . ($errors->has('Id_requisito') ? ' is-invalid' : ''), 'placeholder' => 'Id Requisito']) }}
            {!! $errors->first('Id_requisito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_requisito') }}
            {{ Form::text('nombre_requisito', $requisitosGabinetesMedico->nombre_requisito, ['class' => 'form-control' . ($errors->has('nombre_requisito') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Requisito']) }}
            {!! $errors->first('nombre_requisito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion_requisito') }}
            {{ Form::text('descripcion_requisito', $requisitosGabinetesMedico->descripcion_requisito, ['class' => 'form-control' . ($errors->has('descripcion_requisito') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Requisito']) }}
            {!! $errors->first('descripcion_requisito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $requisitosGabinetesMedico->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Id_gabinetemedico') }}
            {{ Form::text('Id_gabinetemedico', $requisitosGabinetesMedico->Id_gabinetemedico, ['class' => 'form-control' . ($errors->has('Id_gabinetemedico') ? ' is-invalid' : ''), 'placeholder' => 'Id Gabinetemedico']) }}
            {!! $errors->first('Id_gabinetemedico', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>