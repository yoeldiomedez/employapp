<!-- CHANGE PASSWORD TAB -->
<div class="tab-pane" id="tab_1_3">
    {{ html()->form('PATCH', route('applicants.change'))->open() }}

        <div class="form-group">
            <label class="control-label">Contraseña Actual</label>
            {{ html()->password('current_password')->required()->class(['form-control']) }}
        </div>
        
        <div class="form-group">
            <label class="control-label">Nueva Contraseña</label>
            {{ html()->password('password')->required()->class(['form-control']) }}
        </div>
        
        <div class="form-group">
            <label class="control-label">Confirmar Contraseña</label>
            {{ html()->password('password_confirmation')->required()->class(['form-control']) }}
        </div>
        <div class="margin-top-10">
            {{ html()->input('submit')->value('Actualizar')->class(['btn', 'btn-warning']) }}
            {{ html()->input('reset')->value('Cancelar')->class(['btn', 'btn-default']) }}
        </div>
    {{ html()->form()->close() }}
</div>
<!-- END CHANGE PASSWORD TAB -->