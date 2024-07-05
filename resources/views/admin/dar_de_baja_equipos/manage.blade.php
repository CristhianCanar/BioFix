@extends('admin.layouts.app')
@section('content')
    <div class="page-inner">
        <h1 class="text-center"><b>Equipos dados de baja</b></h1>

        <div class="mt-4">
            @component('components.table')
                @slot('thead')
                    <th>N°</th>
                    <th scope="col">Equipo</th>
                    <th scope="col">Serie</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col" class="text-right">Acciones</th>
                @endslot
                @slot('tbody')
                    @foreach ($bajasEquipos as $bajasEquipo)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-truncate">{{ $bajasEquipo->equipo->nombre }}</td>
                            <td class="text-truncate">{{ $bajasEquipo->equipo->serie }}</td>
                            <td class="text-truncate">{{ $bajasEquipo->baja_fecha }}</td>
                            <td class="text-truncate">{{ $bajasEquipo->observaciones }}</td>
                            <td>
                                <div class="row float-right justify-content-end" style="font-size: 20px">
                                    <div>
                                        <a href="{{ route('unsubscribe.show', $bajasEquipo->id) }}" style="color: #fa8c15;">
                                            <i class="la icon-eye" data-toggle="tooltip" title="Ver baja de equipo"></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endslot
                <span> Total registros <b>{{ $bajasEquipos->total() }}</b></span>
                <span class="float-right">{{ $bajasEquipos->links() }}</span>
            @endcomponent
        </div>
    </div>
@endsection
