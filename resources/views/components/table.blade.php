<div class="card">
    <div class="card-body table-responsive">
        <div class="{{ (isset($noResponsive)) ? '' : 'table-responsive' }}">
            <table class="table table-hover" id="{{ (isset($id)) ? $id : '' }}">
                <thead>
                    @isset($theadTr)
                    {{ $theadTr }}
                    @endisset
                    <tr>
                        @isset($thead)
                        {{ $thead }}
                        @endisset
                    </tr>
                </thead>
                <tbody>
                    @if(isset($tbody) && $tbody != "")
                    {{ $tbody }}
                    @else
                    <tr class="text-center">
                        <td colspan="100%" scope="row"><i class="fas fa-info-circle"></i> No se encontraron registros.
                        </td>
                    </tr>
                    @endif
                </tbody>
                <tfoot>
                </tfoot>
            </table>
            {{ $slot }}
        </div>
    </div>
</div>
