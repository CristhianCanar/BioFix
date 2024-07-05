@extends('admin.layouts.app')

@section('content')
    <div class="panel-header bg-dark-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">BioFix</h2>
                    <h5 class="text-white op-7 mb-2">Gestión de mantenimiento de equipos médicos</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row justify-content-center">
            <div class="col">
                <div class="row mt--2">
                    <div class="col-md-12">
                        <div class="card full-height">
                            <div class="card-body">
                                <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="circles-1"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Número de interacciones</h6>
                                    </div>
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="circles-2"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Fincas registradas</h6>
                                    </div>
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="circles-3"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Usuarios registrados</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        Circles.create({
            id: 'circles-1',
            radius: 80,
            value: {{($interactionsTotal == null ) ? 1 : $interactionsTotal }},
            maxValue: 100,
            width: 7,
            text: {{($interactionsTotal == null ) ? 1 : $interactionsTotal }},
            colors: ['#f1f1f1', '#FF9E27'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'circles-2',
            radius: 80,
            value: {{($fincasTotal == null ) ? 1 : $fincasTotal }},
            maxValue: 100,
            width: 7,
            text: {{($fincasTotal == null ) ? 1 : $fincasTotal }},
            colors: ['#f1f1f1', '#1572E8'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'circles-3',
            radius: 80,
            value: {{($usersTotal == null ) ? 1 : $usersTotal }},
            maxValue: 100,
            width: 7,
            text: {{($usersTotal == null ) ? 1 : $usersTotal }},
            colors: ['#f1f1f1', '#F25961'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })
    </script>
@endsection
