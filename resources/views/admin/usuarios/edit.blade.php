@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="col-10 mt-4 mx-auto">
            @component('components.card-form', ['title' => 'Actualizar usuario', 'show' => false])
                <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label class="form-label" for="identificacion">Identificación <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('identificacion') is-invalid @enderror" name="identificacion"
                            id="identificacion" value="{{ $usuario->identificacion }}" maxlength="50" required>

                        @error('identificacion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="nombre">Nombres <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre"
                            id="nombre" value="{{ $usuario->nombre }}" maxlength="50" required>

                        @error('nombre')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="apellido">Apellidos <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido"
                            id="apellido" value="{{ $usuario->apellido }}" maxlength="50" required>

                        @error('apellido')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="empresa_id">Empresa</label>
                        <select class="form-control" name="empresa_id" id="empresa_id" required>
                            <option value="" selected disabled>Seleccione...</option>
                            @foreach ($empresas as $empresa)
                                <option value="{{ $empresa->id }}" {{ (isset($usuario->empresa_id) && $usuario->empresa_id == $empresa->id) ? 'selected' : ''}}>
                                    {{ $empresa->nit.' - '.$empresa->razon_social }}
                                </option>
                            @endforeach
                        </select>

                        @error('empresa_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="rol">Rol</label>
                        <select class="form-control" name="rol" id="rol" required>
                            <option value="" selected disabled>Seleccione...</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->name }}" {{ (str_replace('"','',str_replace('[','',str_replace(']','',$usuario->getRoleNames()))) == $rol->name) ? 'selected' : '' }}>
                                    {{ $rol->name }}
                                </option>
                            @endforeach
                        </select>

                        @error('rol')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" value="{{ $usuario->email }}" required>

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password">Contraseña <span class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            id="password" required>

                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="password-confirm">Confirmar contraseña <span class="text-danger">*</span></label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                            id="password-confirm" required>
                    </div>

                    <div class="mt-4 d-flex justify-content-between mx-2">
                        <a href="{{ route('usuarios.index') }}" class="btn btn-default col-5" type="button">
                            <i class="la icon-close mr-2"></i> Cancelar
                        </a>

                        <button class="btn btn-success col-5" type="submit">
                            <i class="la icon-check mr-2"></i> Actualizar
                        </button>
                    </div>
                </form>
            @endcomponent
        </div>
    </div>
@endsection
