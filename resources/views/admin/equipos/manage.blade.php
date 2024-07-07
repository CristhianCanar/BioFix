@extends('admin.layouts.app')
@section('content')
    <div class="page-inner">
        <h1 class="text-center"><b>Gestionar equipos</b></h1>

        <div class="mt-4">
            @component('components.table')
                @slot('thead')
                    <th>N°</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Serie</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Estado</th>
                    <th scope="col" class="text-right">Acciones</th>
                @endslot
                @slot('tbody')
                    @foreach ($equipos as $equipo)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-truncate">{{ $equipo->nombre }}</td>
                            <td class="text-truncate">{{ $equipo->serie }}</td>
                            <td class="text-truncate">{{ $equipo->marca }}</td>
                            <td class="text-truncate">{{ $equipo->empresas->razon_social }}</td>
                            <td class="text-truncate">{{ $equipo->estado ? 'Activo' : 'Inactivo' }}</td>
                            <td>
                                <div class="row float-right justify-content-end no-gutters" style="font-size: 20px">
                                    <div class="col-2 px-2">
                                        <a href="{{ route('equipos.show', $equipo->id) }}" style="color: #fa8c15;">
                                            <i class="la icon-eye" data-toggle="tooltip" title="Ver equipo"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 px-2">
                                        <a href="{{ route('mantenimientos.show.equipo', $equipo->id) }}" style="color: #fa8c15;">
                                            <i class="la icon-settings" data-toggle="tooltip" title="Ver mantenimientos"></i>
                                        </a>
                                    </div>

                                    <div class="col-2 px-2">
                                        <a href="{{ route('equipos.edit', $equipo->id) }}" style="color: #5C55BF;">
                                            <i class="la icon-note" data-toggle="tooltip" title="Editar equipo"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 px-2">
                                        <a href="{{ route('unsubscribe.create.observation', $equipo->id) }}" style="color: #5C55BF;">
                                            <i class="la icon-arrow-down-circle" data-toggle="tooltip" title="Agregar observación para dar de baja"></i>
                                        </a>
                                    </div>

                                    @can('dar_de_baja_ver')
                                        <div class="col-2 px-2">
                                            <a href="{{ route('unsubscribe.create', $equipo->id) }}" style="color: #f44336;">
                                                <i class="la icon-close" data-toggle="tooltip" title="Dar de baja equipo"></i>
                                            </a>
                                        </div>
                                    @endcan


                                    <div class="col-2 px-2">
                                        <form action="{{ route('equipos.destroy', $equipo->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-light p-0"
                                                onclick="return confirm('Seguro que desea eliminar el registro del equipo?')">
                                                <i class="la icon-trash" data-toggle="tooltip" data-placement="top"
                                                    title="Eliminar equipo" style="font-size: 20px; color: #f44336;"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endslot
                <span> Total registros <b>{{ $equipos->total() }}</b></span>
                <span class="float-right">{{ $equipos->links() }}</span>
            @endcomponent
        </div>
    </div>
@endsection
