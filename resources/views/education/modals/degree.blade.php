<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="degreeFile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {{ html()->form('PATCH', route('applicants.delete', $education->id))->open() }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title text-center">
                    Título o Grado / Otros
                </h4>
            </div>
            <div class="modal-body">
                <embed src="{{ asset(config('app.link').'/education/'.$education->degree_file) }}" type="application/pdf" width="100%" height="500">
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