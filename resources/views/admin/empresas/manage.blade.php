@extends('admin.layouts.app')
@section('content')
    <div class="page-inner">
        <h1 class="text-center"><b>Gestionar empresas</b></h1>
        <div class="mt-4">
            @component('components.table')
                @slot('thead')
                    <th>N°</th>
                    <th scope="col">NIT</th>
                    <th scope="col">Razón social</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col" class="text-right">Acciones</th>
                @endslot
                @slot('tbody')
                    @foreach ($empresas as $empresa)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td class="text-truncate">{{ $empresa->nit }}</td>
                            <td class="text-truncate">{{ $empresa->razon_social }}</td>
                            <td class="text-truncate">{{ $empresa->telefono }}</td>
                            <td>
                                <div class="row float-right justify-content-end" style="font-size: 20px">
                                    <div class="col-3">
                                        <a href="{{ route('empresas.edit', $empresa->id) }}"
                                            style="color: #5C55BF;">
                                            <i class="la icon-note" data-toggle="tooltip"
                                                title="Editar empresa"></i>
                                        </a>
                                    </div>
                                    <div class="col-3">
                                        <a href="{{ route('empresas.show', $empresa->id) }}"
                                            style="color: #fa8c15;">
                                            <i class="la icon-eye" data-toggle="tooltip"
                                                title="Ver empresa"></i>
                                        </a>
                                    </div>
                                    <div class="col-3 mr-1">
                                        <form action="{{ route('empresas.destroy', $empresa->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-light bg-inherit p-0"
                                                onclick="return confirm('Seguro que desea eliminar el registro del empresa?')">
                                                <i class="la icon-trash" data-toggle="tooltip"
                                                    data-placement="top" title="Eliminar empresa"
                                                    style="font-size: 20px; color: #f44336;"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endslot
                <span> Total registros <b>{{ $empresas->total() }}</b></span>
                <span class="float-right">{{ $empresas->links() }}</span>
            @endcomponent
        </div>
    </div>
@endsection
