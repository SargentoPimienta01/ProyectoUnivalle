<div class="box box-info padding-1">
    <div class="box-body">
        <!-- Hidden field for Id_requisito -->
        {{ Form::hidden('Id_requisito', $requisitoCaja->Id_requisito, ['class' => 'form-control' . ($errors->has('Id_requisito') ? ' is-invalid' : '')]) }}

        <!-- Field for nombre_requisito -->
        <div class="form-group">
            {{ Form::label('nombre_requisito') }}
            {{ Form::text('nombre_requisito', $requisitoCaja->nombre_requisito, ['class' => 'form-control' . ($errors->has('nombre_requisito') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Requisito', 'required' => 'required']) }}
            {!! $errors->first('nombre_requisito', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <!-- Field for descripcion_requisito -->
        <div class="form-group">
            {{ Form::label('descripcion_requisito') }}
            {{ Form::text('descripcion_requisito', $requisitoCaja->descripcion_requisito, ['class' => 'form-control' . ($errors->has('descripcion_requisito') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion Requisito', 'required' => 'required']) }}
            {!! $errors->first('descripcion_requisito', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <!-- Hidden field for estado -->
        {{ Form::hidden('estado', 1, ['class' => 'form-control', 'required' => 'required']) }}

        <!-- Hidden field for Id_caja -->
        {{ Form::hidden('Id_caja', $id_caja, ['class' => 'form-control', 'placeholder' => 'Id Caja']) }}
    </div>

    <div class="box-footer mt20">
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>

        <!-- Close button -->
        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
            {{ __('Cerrar') }}<span aria-hidden="true"></span>
        </button>
    </div>
</div>
