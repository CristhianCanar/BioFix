@extends('admin.layouts.app')
@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Gestionar Equipos</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Equipos</a>
                </li>
            </ul>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Basic Table</div>
                    </div>
                    <div class="card-body">
                        <div class="card-sub">
                            This is the basic table view of the ready dashboard :
                        </div>
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Striped Rows</div>
                    </div>
                    <div class="card-body">
                        <div class="card-sub">
                            Add <code class="highlighter-rouge">.table-striped</code> to rows the striped table
                        </div>
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="card-sub">
                            Add <code class="#highlighter-rouge">.table-striped-bg-*states</code> to change background from striped rows
                        </div>
                        <table class="table table-striped table-striped-bg-default mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-striped table-striped-bg-danger mt-4">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td colspan="2">Larry the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Responsive Table</div>
                    </div>
                    <div class="card-body">
                        <div class="card-sub">
                            Create responsive tables by wrapping any table with <code class="highlighter-rouge">.table-responsive</code> <code class="highlighter-rouge">DIV</code> to make them scroll horizontally on small devices
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Table heading</th>
                                        <th>Table heading</th>
                                        <th>Table heading</th>
                                        <th>Table heading</th>
                                        <th>Table heading</th>
                                        <th>Table heading</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                        <td>Table cell</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        @if (count($equipos) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Institución</th>
                                        <th scope="col" class="text-right">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($equipos as $equipos)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td class="text-truncate">{{ $equipos->name }}</td>
                                            <td class="text-truncate">{{ $equipos->name }}</td>
                                            <td>
                                                <div class="row float-right justify-content-end" style="font-size: 20px">
                                                    <div class="col-3">
                                                        <a href="{{ route('equipos.edit', $equipos->id) }}"
                                                            style="color: #5C55BF;">
                                                            <i class="la icon-note" data-toggle="tooltip"
                                                                title="Editar curso"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-3">
                                                        <a href="{{ route('equipos.show', $equipos->id) }}"
                                                            style="color: #fa8c15;">
                                                            <i class="la icon-eye" data-toggle="tooltip"
                                                                title="Ver curso"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-3 mr-1">
                                                        <form action="{{ route('equipos.destroy', $equipos->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn p-0"
                                                                onclick="return confirm('Seguro que desea eliminar el registro del curso?')">
                                                                <i class="la icon-trash" data-toggle="tooltip"
                                                                    data-placement="top" title="Eliminar curso"
                                                                    style="font-size: 20px; color: #f44336;"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="float-right">
                                {{-- {{ $equipos->links() }} --}}
                            </div>
                        @else
                            <h3 class="text-center">No hay Equipos aún 😔</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
