<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombres', __('Nombres')) }}
            {{ Form::text('nombres', $contacto->nombres, ['class' => 'form-control' . ($errors->has('nombres') ? ' is-invalid' : ''), 'placeholder' => __('Nombres'), 'required' => 'required',]) }}
            {!! $errors->first('nombres', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellidos', __('Apellidos')) }}
            {{ Form::text('apellidos', $contacto->apellidos, ['class' => 'form-control' . ($errors->has('apellidos') ? ' is-invalid' : ''), 'placeholder' => __('Apellidos'), 'required' => 'required',]) }}
            {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('celular_trabajo', __('Celular Trabajo')) }}
            {{ Form::tel('celular_trabajo', $contacto->celular_trabajo, ['class' => 'form-control' . ($errors->has('celular_trabajo') ? ' is-invalid' : ''), 'placeholder' => __('Celular Trabajo'), 'required' => 'required',]) }}
            {!! $errors->first('celular_trabajo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('correo_institucional', __('Correo Institucional')) }}
            {{ Form::email('correo_institucional', $contacto->correo_institucional, ['class' => 'form-control' . ($errors->has('correo_institucional') ? ' is-invalid' : ''), 'placeholder' => __('Correo Institucional'), 'required' => 'required',]) }}
            {!! $errors->first('correo_institucional', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('area_responsable', 'Área Responsable') }}
            <select name="Id_area" class="form-control" required>
                @foreach ($areas as $area)
                    <option value="{{ $area->Id_area }}" {{ $area->Id_area == $contacto->Id_area ? 'selected' : '' }}>
                        {{ $area->nombre_area }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group" style="display: none;">
            {{ Form::label('id_usuario', __('Id Usuario')) }}
            {{ Form::text('id_usuario', $contacto->id_usuario, ['class' => 'form-control' . ($errors->has('id_usuario') ? ' is-invalid' : ''), 'placeholder' => __('Id Usuario')]) }}
            {!! $errors->first('id_usuario', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        <a href="{{ route('contactos.index') }}" class="btn btn-danger">{{ __('Regresar') }}</a>
    </div>
</div>
