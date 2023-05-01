{{ html()->label('Declaración Jurada', 'affidavit_file') }} 
<a href="{{ asset('fut/DECLARACION_JURADA_PROCESO_CAS.pdf') }}" target="_blank"> 
    (Ver / Descargar FUT)
</a>
@if(!empty($document->affidavit_file) && $document->affidavit_file != null) 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal" href="#affidavitFile">
            Mostrar <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
@else 
    <div id="affidavitInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
            <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Seleccionar</span>
            <span class="fileinput-exists">Cambiar</span>
            {{ html()->file('affidavit_file')->required(($document->affidavit_file == null) ? true : false)->accept('.pdf') }}
        </span>
        <a href="JavaScript:;" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
    </div>
@endif

{{ html()->label('Declaración Jurada Elección de Vacante', 'vacancy_file') }}
<a href="{{ asset('fut/DECLARACION_JURADA_POSTULANTE_VACANTE.pdf') }}" target="_blank"> 
    (Ver / Descargar FUT)
</a>
@if(!empty($document->vacancy_file) && $document->vacancy_file != null) 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal" href="#vacancyFile">
            Mostrar <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
@else 
    <div id="vacancyInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
            <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Seleccionar</span>
            <span class="fileinput-exists">Cambiar</span>
            {{ html()->file('vacancy_file')->required(($document->vacancy_file == null ? true : false))->accept('.pdf') }}
        </span>
        <a href="JavaScript:;" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
    </div>
@endif

{{ html()->label('Copia del DNI', 'dni_file') }}

@if(!empty($document->dni_file) && $document->dni_file != null) 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal" href="#dniFile">
            Mostrar <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
@else 
    <div id="dniInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
            <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Seleccionar</span>
            <span class="fileinput-exists">Cambiar</span>
            {{ html()->file('dni_file')->required(($document->dni_file == null ? true : false))->accept('.pdf') }}
        </span>
        <a href="JavaScript:;" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
    </div>
@endif

{{ html()->label('Declaración Jurada Adicional', 'aditional_file') }}

@if(!empty($document->aditional_file) && $document->aditional_file != null) 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal" href="#aditionalFile">
            Mostrar <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
@else 
    <div id="aditionalInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
            <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Seleccionar</span>
            <span class="fileinput-exists">Cambiar</span>
            {{ html()->file('aditional_file')->accept('.pdf') }}
        </span>
        <a href="JavaScript:;" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
    </div>
@endif