<!-- /.modal -->
<div class="modal fade bs-modal-lg" id="experienceFile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {!! Form::open([
                'route'  => ['experiences.delete', $experience->id],
                'method' => 'PATCH'
            ]) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title text-center">
                    Constancia de Trabajo
                </h4>
            </div>
            <div class="modal-body">
                <embed src="{{ asset(config('app.link').'/experience/'.$experience->file) }}" type="application/pdf" width="100%" height="500">
            </div>
            <div class="modal-footer">
                {{ Form::submit('Eliminar', ['class' => 'btn btn-danger']) }}
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
            
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->