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
                                        <h6 class="fw-bold mt-3 mb-0">Equipos activos</h6>
                                    </div>
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="circles-2"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Mantenimientos realizados</h6>
                                    </div>
                                    <div class="px-2 pb-2 pb-md-0 text-center">
                                        <div id="circles-3"></div>
                                        <h6 class="fw-bold mt-3 mb-0">Equipos dados de baja</h6>
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
            value: {{($equiposTotal == null ) ? 1 : $equiposTotal }},
            maxValue: 100,
            width: 7,
            text: {{($equiposTotal == null ) ? 1 : $equiposTotal }},
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
            value: {{($mantenimientosTotal == null ) ? 1 : $mantenimientosTotal }},
            maxValue: 100,
            width: 7,
            text: {{($mantenimientosTotal == null ) ? 1 : $mantenimientosTotal }},
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
            value: {{($equiposBajasTotal == null ) ? 1 : $equiposBajasTotal }},
            maxValue: 100,
            width: 7,
            text: {{($equiposBajasTotal == null ) ? 1 : $equiposBajasTotal }},
            colors: ['#f1f1f1', '#F25961'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })
    </script>
@endsection
