@extends('admin.layouts.app')
@section('content')
    <div class="page-inner">
        <h1 class="text-center"><b>Gestionar Usuarios</b></h1>
        <div class="mt-4">
            @component('components.table')
                @slot('thead')
                    <th>N°</th>
                    <th scope="col">Nombres</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                    <th scope="col" class="text-right">Acciones</th>
                @endslot
                @slot('tbody')
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-truncate">{{ $usuario->nombre }}</td>
                            <td class="text-truncate">{{ $usuario->apellido }}</td>
                            <td class="text-truncate">{{ $usuario->email }}</td>
                            <td class="text-truncate">{{ str_replace('[','',str_replace(']','',$usuario->getRoleNames())) }}</td>
                            <td>
                                <div class="row float-right justify-content-end" style="font-size: 20px">
                                    @can('usuarios_editar')
                                        <div class="col-3">
                                            <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                                style="color: #5C55BF;">
                                                <i class="la icon-note" data-toggle="tooltip"
                                                    title="Editar usuario"></i>
                                            </a>
                                        </div>
                                    @endcan
                                    <div class="col-3">
                                        <a href="{{ route('usuarios.show', $usuario->id) }}"
                                            style="color: #fa8c15;">
                                            <i class="la icon-eye" data-toggle="tooltip"
                                                title="Ver usuario"></i>
                                        </a>
                                    </div>
                                    @can('usuarios_eliminar')
                                        <div class="col-3 mr-1">
                                            <form action="{{ route('usuarios.destroy', $usuario->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-light bg-inherit p-0"
                                                    onclick="return confirm('Seguro que desea eliminar el usuario?')">
                                                    <i class="la icon-trash" data-toggle="tooltip"
                                                        data-placement="top" title="Eliminar usuario"
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
                <span> Total registros <b>{{ $usuarios->total() }}</b></span>
                <span class="float-right">{{ $usuarios->links() }}</span>
            @endcomponent
        </div>
    </div>
@endsection
