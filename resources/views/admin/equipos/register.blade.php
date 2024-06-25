@extends('admin.layouts.app')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Registrar Curso</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{ route('dashboard') }}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('course.index') }}">Cursos</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('course.create') }}">Registrar Curso</a>
                </li>
            </ul>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <form class="needs-validation" method="POST" action="{{ route('course.store') }}" novalidate>
                                @csrf
                                @method('POST')
                                <div class="form-row justify-content-center">

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Institución educativa</label>
                                        <select class="custom-select" name="id_institution" id="id_institution" required>
                                            <option value="" selected disabled>
                                                Seleccione la institución o colegio
                                            </option>
                                            @foreach ($institutions as $institution)
                                                <option value="{{ $institution->id_institution }}">
                                                    {{ $institution->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">
                                            Selecciona una institución educativa
                                        </div>
                                    </div>

                                    <div class="form-group col-10 col-lg-8">
                                        <label class="form-label" for="text"><span data-toggle="tooltip"
                                                title="Campo Obligatorio">*</span> Nombre del curso</label>
                                        <input type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" value="{{ old('name') }}"
                                            maxlength="15" required>
                                        <div class="invalid-feedback">
                                            Escribe el nombre del curso
                                        </div>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                El name no cumple con las características mínimas
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-10 col-lg-8 mt-3">
                                        <button class="btn btn-success w-100" type="submit"><i class="la icon-pencil mr-3"></i>
                                            Registrar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
