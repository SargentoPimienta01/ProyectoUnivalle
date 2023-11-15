<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group" style="display: none;">
            {{ Form::label('Id_requisito') }}
            {{ Form::text('Id_requisito', $requisitoCaja->Id_requisito, ['class' => 'form-control' . ($errors->has('Id_requisito') ? ' is-invalid' : ''), 'placeholder' => 'Id Requisito']) }}
            {!! $errors->first('Id_requisito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre_requisito') }}
            {{ Form::text('nombre_requisito', $requisitoCaja->nombre_requisito, ['class' => 'form-control' . ($errors->has('nombre_requisito') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Requisito']) }}
            {!! $errors->first('nombre_requisito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('descripcion_requisito') }}
            {{ Form::text('descripcion_requisito', $requisitoCaja->descripcion_requisito, ['class' => 'form-control' . ($errors->has('descripcion_requisito') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Requisito']) }}
            {!! $errors->first('descripcion_requisito', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="display: none;">
            {{ Form::label('estado') }}
            {{ Form::text('estado', 1, ['class' => 'form-control', 'placeholder' => 'Estado']) }}
        </div>
        <div class="form-group" style="display: none;">
            {{ Form::label('Id_caja') }}
            {{ Form::text('Id_caja', $id_caja, ['class' => 'form-control', 'placeholder' => 'Id Caja']) }}
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        <a href="{{ route('cajas.requisitos.index', $id_caja) }}" class="btn btn-danger">
            {{ __('Volver a requisitos') }}
        </a>
    </div>
</div>