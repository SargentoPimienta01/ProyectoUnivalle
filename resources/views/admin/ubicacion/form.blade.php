<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre_ubicacion') }}
            {{ Form::text('nombre_ubicacion', $ubicacion->nombre_ubicacion, ['class' => 'form-control' . ($errors->has('nombre_ubicacion') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Ubicacion']) }}
            {!! $errors->first('nombre_ubicacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="imagen">Imagen Actual:</label>
            <div id="imagen-actual">
                @if(isset($ubicacion->Image))
                    <img src="{{ $ubicacion->Image }}" alt="Imagen Actual" class="img-thumbnail" style="max-width: 300px;">
                @else
                    <p>No hay imagen actual.</p>
                @endif
            </div>
            <img src="" alt="Imagen Preview" class="img-thumbnail" style="max-width: 300px; display: none;" id="imagen-preview">
        </div>

        <div class="form-group">
            {{ Form::label('imagen', 'Cambiar Imagen') }}
            {{ Form::file('imagen', ['class' => 'form-control', 'onchange' => 'previewImage(this, "imagen-preview")']) }}
        </div>
        <div class="form-group">
            {{ Form::label('edificio') }}
            {{ Form::text('edificio', $ubicacion->edificio, ['class' => 'form-control' . ($errors->has('edificio') ? ' is-invalid' : ''), 'placeholder' => 'Edificio']) }}
            {!! $errors->first('edificio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('planta') }}
            {{ Form::number('planta', $ubicacion->planta, ['class' => 'form-control' . ($errors->has('planta') ? ' is-invalid' : ''), 'placeholder' => 'Planta']) }}
            {!! $errors->first('planta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('horario') }}
            {{ Form::text('horario', $ubicacion->horario, ['class' => 'form-control' . ($errors->has('horario') ? ' is-invalid' : ''), 'placeholder' => 'Horario']) }}
            {!! $errors->first('horario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('detalles_direccion') }}
            {{ Form::text('detalles_direccion', $ubicacion->detalles_direccion, ['class' => 'form-control' . ($errors->has('detalles_direccion') ? ' is-invalid' : ''), 'placeholder' => 'Detalles Direccion']) }}
            {!! $errors->first('detalles_direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
        <a href="{{ route('ubicacion.index') }}" class="btn btn-danger">{{ __('Regresar') }}</a>
    </div>
</div>
<script>
    function previewImage(input, previewId) {
        var preview = document.getElementById(previewId);

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Llamada inicial para previsualizar la imagen actual al cargar la página en modo de edición
    window.onload = function () {
        var input = document.querySelector('input[type="file"]');
        var previewId = "imagen-preview";

        if (input) {
            input.addEventListener('change', function () {
                previewImage(this, previewId);

                // Muestra la imagen seleccionada como imagen actual
                document.getElementById('imagen-actual').style.display = 'none';
                document.getElementById('imagen-preview').style.display = 'block';
            });

            // Llamada inicial para previsualizar la imagen actual al cargar la página en modo de edición
            if (input.files && input.files.length > 0) {
                previewImage(input, previewId);
            }
        }
    }
</script>




