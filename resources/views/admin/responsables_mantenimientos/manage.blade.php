@extends('admin.layouts.app')
@section('content')
    <div class="page-inner">
        <h1 class="text-center"><b>Gestionar responsables mantenimientos</b></h1>
        <div class="mt-4">
            @component('components.table')
                @slot('thead')
                    <th>N°</th>
                    <th scope="col">Identificación</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Cargo</th>
                    <th scope="col" class="text-right">Acciones</th>
                @endslot
                @slot('tbody')
                    @foreach ($responsablesMantenimientos as $responsableMantenimiento)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-truncate">{{ $responsableMantenimiento->identificacion }}</td>
                            <td class="text-truncate">{{ $responsableMantenimiento->nombre }}</td>
                            <td class="text-truncate">{{ $responsableMantenimiento->apellido }}</td>
                            <td class="text-truncate">{{ $responsableMantenimiento->telefono }}</td>
                            <td class="text-truncate">{{ $responsableMantenimiento->cargo }}</td>
                            <td>
                                <div class="row float-right justify-content-end" style="font-size: 20px">
                                    @can('responsable_mantenimiento_editar')
                                        <div class="col-3">
                                            <a href="{{ route('responsables_mantenimientos.edit', $responsableMantenimiento->id) }}"
                                                style="color: #5C55BF;">
                                                <i class="la icon-note" data-toggle="tooltip"
                                                    title="Editar responsable"></i>
                                            </a>
                                        </div>
                                    @endcan
                                    <div class="col-3">
                                        <a href="{{ route('responsables_mantenimientos.show', $responsableMantenimiento->id) }}"
                                            style="color: #fa8c15;">
                                            <i class="la icon-eye" data-toggle="tooltip"
                                                title="Ver responsable"></i>
                                        </a>
                                    </div>
                                    @can('responsable_mantenimiento_eliminar')
                                        <div class="col-3 mr-1">
                                            <form action="{{ route('responsables_mantenimientos.destroy', $responsableMantenimiento->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-light bg-inherit p-0"
                                                    onclick="return confirm('Seguro que desea eliminar el responsable?')">
                                                    <i class="la icon-trash" data-toggle="tooltip"
                                                        data-placement="top" title="Eliminar responsable"
                                                        style="font-size: 20px; color: #f44336;"></i>
                                                </button>
                                            </form>
                                        </div>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endslot
                <span> Total registros <b>{{ $responsablesMantenimientos->total() }}</b></span>
                <span class="float-right">{{ $responsablesMantenimientos->links() }}</span>
            @endcomponent
        </div>
    </div>
@endsection
