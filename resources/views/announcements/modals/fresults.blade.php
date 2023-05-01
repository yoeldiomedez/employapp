<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="fresults" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {{ html()->form('PATCH', route('announcements.delete', $announcement->id))->open() }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title text-center">
                    Resultado Final
                </h4>
            </div>
            <div class="modal-body">
                <embed src="{{ asset(config('app.link').'/announcement/'.$announcement->final_results) }}" type="application/pdf" width="100%" height="500">
                {{ html()->hidden('final_results', $announcement->final_results) }}
            </div>
            <div class="modal-footer">
                {{ html()->input('submit')->value('Eliminar')->class(['btn', 'btn-danger']) }}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
            {{ html()->form()->close() }}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->