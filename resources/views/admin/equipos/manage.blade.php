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
                            <td>
                                <div class="row float-right justify-content-end" style="font-size: 20px">
                                    <div class="col-3">
                                        <a href="{{ route('equipos.edit', $equipo->id) }}"
                                            style="color: #5C55BF;">
                                            <i class="la icon-note" data-toggle="tooltip"
                                                title="Editar equipo"></i>
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="{{ route('equipos.show', $equipo->id) }}"
                                            style="color: #fa8c15;">
                                            <i class="la icon-eye" data-toggle="tooltip"
                                                title="Ver equipo"></i>
                                        </a>
                                    </div>
                                    <div class="col-3 mr-1">
                                        <form action="{{ route('equipos.destroy', $equipo->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-light p-0"
                                                onclick="return confirm('Seguro que desea eliminar el registro del equipo?')">
                                                <i class="la icon-trash" data-toggle="tooltip"
                                                    data-placement="top" title="Eliminar equipo"
                                                    style="font-size: 20px; color: #f44336;"></i>
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
