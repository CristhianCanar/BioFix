@extends('admin.layouts.app')
@section('content')
    <div class="page-inner">
        <h1 class="text-center"><b>Equipos con observaciones para ser dados de baja</b></h1>

        <div class="mt-4">
            @component('components.table')
                @slot('thead')
                    <th>N°</th>
                    <th scope="col">Equipo</th>
                    <th scope="col">Serie</th>
                    <th scope="col">Empresa</th>
                    <th scope="col">Observaciones</th>
                    <th scope="col" class="text-right">Acciones</th>
                @endslot
                @slot('tbody')
                    @foreach ($equipos as $equipo)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-truncate">{{ $equipo->nombre }}</td>
                            <td class="text-truncate">{{ $equipo->serie }}</td>
                            <td class="text-truncate">{{ $equipo->empresas->razon_social }}</td>
                            <td class="text-truncate">{{ $equipo->observacion_baja }}</td>
                            <td>
                                <div class="row float-right justify-content-end" style="font-size: 20px">
                                    <div>
                                        <a href="{{ route('unsubscribe.show.observation', $equipo->id) }}" style="color: #fa8c15;">
                                            <i class="la icon-eye" data-toggle="tooltip" title="Ver observaciones de equipo"></i>
                                        </a>
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
