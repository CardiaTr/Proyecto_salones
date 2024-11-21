@if(auth()->check() && auth()->user()->role === 'admin')<!-- Verifica que este el role como "admin"si no lo esta no da los privilegios del CRUD -->
    <div class="row padding-1 p-1">
        <div class="col-md-12">
            <div class="form-group mb-2 mb20">
                <label for="fecha_de_reserva" class="form-label">{{ __('Fecha De Reserva') }}</label>
                <!-- Asegúrate de que el valor sea el del post -->
                <input type="text" name="Fecha_de_reserva" class="form-control" id="fecha_de_reserva" placeholder="YYYY-MM-DD" value="{{ old('Fecha_de_reserva', $post->Fecha_de_reserva) }}">
                <div class="invalid-feedback" id="error_fecha_reserva"></div>
            </div>
            <div class="form-group mb-2 mb20">
                <label for="Lugar" class="form-label">{{ __('Lugar') }}</label>
                <!-- Pre-llenar con el valor existente -->
                <input type="text" name="Lugar" class="form-control" id="Lugar" placeholder="Lugar" value="{{ old('Lugar', $post->Lugar) }}">
            </div>
            <div class="form-group mb-2 mb20">
                <label for="duracion" class="form-label">{{ __('Duracion') }}</label>
                <!-- Pre-llenar con el valor existente -->
                <input type="text" name="Duracion" class="form-control" id="duracion" placeholder="Duracion" value="{{ old('Duracion', $post->Duracion) }}">
                <div class="invalid-feedback" id="error_duracion"></div>
            </div>
            <div class="form-group mb-2 mb20">
                <label for="nombre_del_alumno" class="form-label">{{ __('Nombre Del Alumno') }}</label>
                <!-- Pre-llenar con el valor existente -->
                <input type="text" name="Nombre_del_alumno" class="form-control" id="nombre_del_alumno" placeholder="Nombre Del Alumno" value="{{ old('Nombre_del_alumno', $post->Nombre_del_alumno) }}">
                <div class="invalid-feedback" id="error_nombre_alumno"></div>
            </div>
            <div class="form-group mb-2 mb20">
                <label for="codigo_del_alumno" class="form-label">{{ __('Codigo Del Alumno') }}</label>
                <!-- Pre-llenar con el valor existente -->
                <input type="text" name="Codigo_del_alumno" class="form-control" id="codigo_del_alumno" placeholder="Codigo Del Alumno" value="{{ old('Codigo_del_alumno', $post->Codigo_del_alumno) }}">
                <div class="invalid-feedback" id="error_codigo_alumno"></div>
            </div>
        </div>
        <div class="col-md-12 mt20 mt-2">
            <button type="submit" class="btn btn-primary" id="submit_button">{{ __('Submit') }}</button>
        </div>
    </div>

    <script>
        document.getElementById('submit_button').addEventListener('click', function (event) {
            let isValid = true;

            // Validación de fecha existente
            const fechaReserva = document.getElementById('fecha_de_reserva');
            const fechaRegex = /^\d{4}-\d{2}-\d{2}$/;
            if (!fechaRegex.test(fechaReserva.value)) {
                isValid = false;
                document.getElementById('error_fecha_reserva').textContent = 'La fecha debe estar en formato YYYY-MM-DD.';
                fechaReserva.classList.add('is-invalid');
            } else {
                const [year, month, day] = fechaReserva.value.split('-').map(Number);
                const fecha = new Date(year, month - 1, day);
                if (fecha.getFullYear() !== year || fecha.getMonth() + 1 !== month || fecha.getDate() !== day) {
                    isValid = false;
                    document.getElementById('error_fecha_reserva').textContent = 'La fecha ingresada no es válida.';
                    fechaReserva.classList.add('is-invalid');
                } else {
                    document.getElementById('error_fecha_reserva').textContent = '';
                    fechaReserva.classList.remove('is-invalid');
                }
            }
            // Validación de duración
            const duracion = document.getElementById('duracion');
            const duracionValue = parseInt(duracion.value, 10);
            if (isNaN(duracionValue) || duracionValue < 60 || duracionValue > 95) {
                isValid = false;
                document.getElementById('error_duracion').textContent = 'La duración debe estar entre 60 y 95.';
                duracion.classList.add('is-invalid');
            } else {
                document.getElementById('error_duracion').textContent = '';
                duracion.classList.remove('is-invalid');
            }

            // Validación de nombre del alumno
            const nombreAlumno = document.getElementById('nombre_del_alumno');
            const nombreRegex = /^[a-zA-Z\s]+$/;
            if (!nombreRegex.test(nombreAlumno.value)) {
                isValid = false;
                document.getElementById('error_nombre_alumno').textContent = 'El nombre no debe contener números.';
                nombreAlumno.classList.add('is-invalid');
            } else {
                document.getElementById('error_nombre_alumno').textContent = '';
                nombreAlumno.classList.remove('is-invalid');
            }

            // Validación de código del alumno
            const codigoAlumno = document.getElementById('codigo_del_alumno');
            if (!/^\d{10}$/.test(codigoAlumno.value)) {
                isValid = false;
                document.getElementById('error_codigo_alumno').textContent = 'El código debe tener exactamente 10 dígitos.';
                codigoAlumno.classList.add('is-invalid');
            } else {
                document.getElementById('error_codigo_alumno').textContent = '';
                codigoAlumno.classList.remove('is-invalid');
            }

            // Si alguna validación falla, previene el envío del formulario
            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
@else
    <p>No tienes permiso para acceder a esta página.</p>
@endif
