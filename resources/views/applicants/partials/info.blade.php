<!-- PERSONAL INFO TAB -->
<div class="tab-pane active" id="tab_1_1">
    {{ html()->form('PUT', route('applicants.update', $applicant->id))->acceptsFiles()->open() }}

    <div class="form-group">
        {{ html()->label('RUC', 'ruc') }}
        {{ html()->input('number', 'ruc', $applicant->ruc)
                ->required()
                ->attributes(['min' => 0])
                ->class(['form-control']) 
        }}
    </div>

    <div class="form-group">
        {{ html()->label('Número Celular', 'cellphone_number') }}
        {{ html()->input('number', 'cellphone_number', $applicant->cellphone_number)
                ->required()
                ->attributes(['min' => 0])
                ->class(['form-control']) 
        }}
    </div>

    <div class="form-group">
        {{ html()->label('E-Mail', 'email') }}
        {{ html()->email('email', Auth::user()->email)->required()->class(['form-control']) }}
    </div>

    <div class="form-group">
        {{ html()->label('Estado Civil', 'marital_status') }}
        {{ html()->select(
            'marital_status', 
            [
                'S' => 'SOLTERO(A)', 
                'C' => 'CASADO(A)',
                'D' => 'DIVORCIADO(A)',
                'V' => 'VIUDO(A)'
            ], 
            $applicant->marital_status
            )->required()->placeholder('Seleccione un estado civil')->class(['form-control', 'selectpicker'])
        }}
    </div>

    <div class="form-group">
        {{ html()->label('Dirección', 'address') }}
        {{ html()->text('address', $applicant->address)->required()->class(['form-control', 'uppercase']) }}
    </div>

    <div class="form-group">
        {{ html()->label('Departamento', 'department_id') }}
        {{ html()->select('department_id')->required()->id('departments')->placeholder('Busque y Seleccione un Departamento')->class(['form-control']) }}
    </div>
    <div class="form-group">
        {{ html()->label('Provincia', 'province_id') }}
        {{ html()->select('province_id')->required()->id('provinces')->placeholder('Busque y Seleccione una Provincia')->class(['form-control']) }}
    </div>

    <div class="form-group">
        {{ html()->label('Distrito', 'district_id') }}
        {{ html()->select('district_id')->required()->id('districts')->placeholder('Busque y Seleccione un Distrito')->class(['form-control']) }}
    </div>

    <div class="form-group">
        {{ html()->label('№ de Colegiatura (solo si aplica)', 'tuition_number') }}
        {{ html()->input('number', 'tuition_number', $applicant->tuition_number)
                ->attributes(['min' => 0])
                ->class(['form-control']) 
        }}
    </div>

    {{ html()->label('¿Perteneció a las FF. AA.?', 'ffaa_file') }}
    @if(!$applicant->ffaa_file)
    <div id="FFAAInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
            <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Seleccionar</span>
            <span class="fileinput-exists">Cambiar</span>
            {{ html()->file('ffaa_file')->accept('.pdf') }}
        </span>
        <a href="JavaScript:;" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
    </div>
    @else 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal"  href="#ffaaFile">
            Ver Archivo <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
    @endif

    {{ html()->label('¿Es usted una persona con discapacidad?', 'disability_file') }}
    @if(!$applicant->disability_file)
    <div id="disabilityInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
            <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Seleccionar</span>
            <span class="fileinput-exists">Cambiar</span>
            {{ html()->file('disability_file')->accept('.pdf') }}
        </span>
        <a href="JavaScript:;" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
    </div>
    @else 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal"  href="#disabilityFile">
            Ver Archivo <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
    @endif
    <div class="form-group">
        {{ html()->input('submit')->value('Actualizar')->class(['btn', 'btn-warning']) }}
        {{ html()->input('reset')->value('Cancelar')->class(['btn', 'btn-default']) }}
    </div>
    {{ html()->form()->close() }}
</div>
<!-- END PERSONAL INFO TAB -->