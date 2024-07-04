@extends('admin.layouts.app')
@section('content')
    <div class="page-inner">
        <h1 class="text-center"><b>Gestionar responsables equipos</b></h1>
        <div class="mt-4">
            @component('components.table')
                @slot('thead')
                    <th>N°</th>
                    <th scope="col">Identificación</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Empresa</th>
                    <th scope="col" class="text-right">Acciones</th>
                @endslot
                @slot('tbody')
                    @foreach ($responsablesEquipos as $responsableEquipo)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-truncate">{{ $responsableEquipo->identificacion }}</td>
                            <td class="text-truncate">{{ $responsableEquipo->nombre }}</td>
                            <td class="text-truncate">{{ $responsableEquipo->apellido }}</td>
                            <td class="text-truncate">{{ $responsableEquipo->telefono }}</td>
                            <td class="text-truncate">{{ $responsableEquipo->empresas->razon_social }}</td>
                            <td>
                                <div class="row float-right justify-content-end" style="font-size: 20px">
                                    @can('responsables_equipos_editar')
                                        <div class="col-3">
                                            <a href="{{ route('responsables_equipos.edit', $responsableEquipo->id) }}"
                                                style="color: #5C55BF;">
                                                <i class="la icon-note" data-toggle="tooltip"
                                                    title="Editar responsable"></i>
                                            </a>
                                        </div>
                                    @endcan
                                    <div class="col-3">
                                        <a href="{{ route('responsables_equipos.show', $responsableEquipo->id) }}"
                                            style="color: #fa8c15;">
                                            <i class="la icon-eye" data-toggle="tooltip"
                                                title="Ver responsable"></i>
                                        </a>
                                    </div>
                                    @can('responsables_equipos_eliminar')
                                        <div class="col-3 mr-1">
                                            <form action="{{ route('responsables_equipos.destroy', $responsableEquipo->id) }}"
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
                <span> Total registros <b>{{ $responsablesEquipos->total() }}</b></span>
                <span class="float-right">{{ $responsablesEquipos->links() }}</span>
            @endcomponent
        </div>
    </div>
@endsection
