<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="fecha_de_reserva" class="form-label">{{ __('Fecha De Reserva') }}</label>
            <input type="text" name="Fecha_de_reserva" class="form-control @error('Fecha_de_reserva') is-invalid @enderror" value="{{ old('Fecha_de_reserva', $post?->Fecha_de_reserva) }}" id="fecha_de_reserva" placeholder="Fecha De Reserva">
            {!! $errors->first('Fecha_de_reserva', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="duracion" class="form-label">{{ __('Duracion') }}</label>
            <input type="text" name="Duracion" class="form-control @error('Duracion') is-invalid @enderror" value="{{ old('Duracion', $post?->Duracion) }}" id="duracion" placeholder="Duracion">
            {!! $errors->first('Duracion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nombre_del_alumno" class="form-label">{{ __('Nombre Del Alumno') }}</label>
            <input type="text" name="Nombre_del_alumno" class="form-control @error('Nombre_del_alumno') is-invalid @enderror" value="{{ old('Nombre_del_alumno', $post?->Nombre_del_alumno) }}" id="nombre_del_alumno" placeholder="Nombre Del Alumno">
            {!! $errors->first('Nombre_del_alumno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="codigo_del_alumno" class="form-label">{{ __('Codigo Del Alumno') }}</label>
            <input type="text" name="Codigo_del_alumno" class="form-control @error('Codigo_del_alumno') is-invalid @enderror" value="{{ old('Codigo_del_alumno', $post?->Codigo_del_alumno) }}" id="codigo_del_alumno" placeholder="Codigo Del Alumno">
            {!! $errors->first('Codigo_del_alumno', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>