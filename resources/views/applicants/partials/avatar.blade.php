<!-- CHANGE AVATAR TAB -->
<div class="tab-pane" id="tab_1_2">
    <p>Fotografia</p>
    {{ html()->form('PATCH', route('applicants.upload'))->acceptsFiles()->open() }}

        <div class="form-group">
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div class="fileinput-new thumbnail" style="width: 260px; height: 260px;">
                    @if(!Auth::user()->profile_picture)
                    <img src="{{ asset('img/user_default.png') }}" class="img-responsive" alt=""> 
                    @else
                    <img src="{{ asset(config('app.link').'/profile/'.Auth::user()->profile_picture) }}" class="img-responsive" alt=""> 
                    @endif 
                </div>
                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 260px; max-height: 260px;"> </div>
                <div>
                    <span class="btn default btn-file">
                        <span class="fileinput-new"> Seleccionar </span>
                        <span class="fileinput-exists"> Cambiar </span>
                        {{ html()->file('profile_picture')->required()->acceptImage() }}
                    </span>
                    <a href="JavaScript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Quitar </a>
                </div>
            </div>
            <div class="clearfix margin-top-10 text-justify">
                <span class="label label-danger">NOTA</span> 
                <span> Seleccione una fotografia tamaño pasaporte, fondo blanco y traje formal. </span>
            </div>
        </div>
        <div class="margin-top-10">
            {{ html()->input('submit')->value('Actualizar')->class(['btn', 'btn-warning']) }}
            {{ html()->input('reset')->value('Cancelar')->class(['btn', 'btn-default']) }}
        </div>
        
    {{ html()->form()->close() }}
</div>
<!-- END CHANGE AVATAR TAB -->