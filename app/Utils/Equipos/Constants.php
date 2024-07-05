<?php

namespace App\Utils\Equipos;

class Constants
{
    const FRECUENCIA_CALIBRACION = ['Bimestral', 'Trimestral', 'Cuatrimestral', 'Anual'];
    const FRECUENCIA_MANTENIMIENTO = ['No aplica', 'Anual', 'Trimestral', 'Bimestral'];
    const ESTADO_FUNCIONAL = ['Bueno', 'Regular', 'Malo'];
    const MANT_VALIDACION = ['Anual', 'Bimestral'];
    const BAJA_MOTIVO = ['Baja garantia proveedor', 'Baja mal uso', 'Baja hurto', 'Baja obsoleto', 'Baja siniestro', 'Baja venta', 'Baja donacion', 'Baja fecha'];
}
