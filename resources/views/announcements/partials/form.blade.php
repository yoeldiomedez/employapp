<div class="form-group">
    {{ html()->label('Entidad o Empresa Solicitante', 'company') }}
    {{ html()->text('company', $company->business_name)->isReadonly()->class(['form-control', 'uppercase'])}}
</div>

@if(!empty($announcement->careers))
    @foreach ($announcement->careers as $career)
        @php
            $selected[] = $career->id
        @endphp
    @endforeach
@endif

<div class="form-group">
    {{ html()->label('Escuela(s) Profesional(es) Solicitada(s)', 'start_date') }}    
    <select name="career_ids[]" id="careers" class="form-control" multiple required> 
        <optgroup label="Escuelas Profesionales de Ingenierías">
            @foreach ($careers as $career)
                <option value="{{ $career->id }}" 
                    @isset ($selected)
                        {{ (in_array($career->id, $selected) ? 'selected' : '') }}
                    @endisset             
                >
                    {{ $career->name }}
                </option>
                @break($career->id == 16)
            @endforeach
        </optgroup>

        <optgroup label="Escuelas Profesionales de Biomédicas">
            @foreach ($careers as $career)
                @continue($career->id < 17)
                    <option value="{{ $career->id }}"
                        @isset ($selected)
                            {{ (in_array($career->id, $selected) ? 'selected' : '') }}
                        @endisset 
                    >
                        {{ $career->name }}
                    </option>
                @break($career->id == 22)
            @endforeach
        </optgroup>

        <optgroup label="Escuelas Profesionales de Sociales">
            @foreach ($careers as $career)
                @continue($career->id < 23)
                    <option value="{{ $career->id }}"
                        @isset ($selected)
                            {{ (in_array($career->id, $selected) ? 'selected' : '') }}
                        @endisset 
                    >
                        {{ $career->name }}
                    </option>
            @endforeach
        </optgroup>
    </select>            
</div>

<div class="form-group">
    {{ html()->label('Fecha de Inicio', 'start_date') }}
    @if(!empty($announcement->start_date) && $announcement->start_date != null)
        <div id="startDatePicker" class="input-group date" data-link-field="start_date">
            {{ html()->text()->value(Carbon\Carbon::parse($announcement->start_date)->translatedFormat('d F Y'))->required()->isReadonly()->class(['form-control']) }}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {{ html()->hidden('start_date', $announcement->start_date)->required()->id('start_date') }}
    @else
        <div id="startDatePicker" class="input-group date" data-link-field="start_date">
            {{ html()->text()->required()->isReadonly()->class(['form-control']) }}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {{ html()->hidden('start_date')->required()->id('start_date') }}
    @endif
</div>

<div class="form-group">
    {{ html()->label('Fecha de Finalización', 'end_date') }}
    @if(!empty($announcement->end_date) && $announcement->end_date != null)
        <div id="endDatePicker" class="input-group date" data-link-field="end_date">
            {{ html()->text()->value(Carbon\Carbon::parse($announcement->end_date)->translatedFormat('d F Y'))->required()->isReadonly()->class(['form-control']) }}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {{ html()->hidden('end_date', $announcement->end_date)->required()->id('end_date') }}
    @else
        <div id="endDatePicker" class="input-group date" data-link-field="end_date">
            {{ html()->text()->required()->isReadonly()->class(['form-control']) }}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {{ html()->hidden('end_date')->required()->id('end_date') }}
    @endif
</div>

<div class="form-group">
    {{ html()->label('Cargo', 'position') }}
    {{ html()->text('position')->required()->class(['form-control', 'uppercase']) }}
</div>

{{ html()->label('Bases', 'bases') }}

@if(!empty($announcement->bases) && $announcement->bases != null) 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal" href="#bases">
            Mostrar <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
@else 
    <div id="basesInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
            <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Seleccionar</span>
            <span class="fileinput-exists">Cambiar</span>
            {{ html()->file('bases')->required()->accept('.pdf') }}
        </span>
        <a href="JavaScript:;" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
    </div>
@endif

{{ html()->label('Anexos', 'annexes') }}

@if(!empty($announcement->annexes) && $announcement->annexes != null) 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal" href="#annexes">
            Mostrar <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
@else 
    <div id="annexesInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
            <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Seleccionar</span>
            <span class="fileinput-exists">Cambiar</span>
            {{ html()->file('annexes')->accept('.pdf') }}
        </span>
        <a href="JavaScript:;" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
    </div>
@endif

{{ html()->label('Resultado de Evaluación Curricular', 'partial_results') }}

@if(!empty($announcement->partial_results) && $announcement->partial_results != null) 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal" href="#presults">
            Mostrar <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
@else 
    <div id="presultsInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
            <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Seleccionar</span>
            <span class="fileinput-exists">Cambiar</span>
            {{ html()->file('partial_results')->accept('.pdf') }}
        </span>
        <a href="JavaScript:;" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
    </div>
@endif

{{ html()->label('Resultado Final', 'final_results') }}

@if(!empty($announcement->final_results) && $announcement->final_results != null) 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal" href="#fresults">
            Mostrar <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
@else 
    <div id="fresultsInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
            <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Seleccionar</span>
            <span class="fileinput-exists">Cambiar</span>
            {{ html()->file('final_results')->accept('.pdf') }}
        </span>
        <a href="JavaScript:;" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
    </div>
@endif

@push('scripts')
    <script>
    $(document).ready(function() {

        $('#startDatePicker').datetimepicker({
            language:  'es',
            format: 'dd MM yyyy',
            startView: 'year',
            viewMode: 'month',
            minView: 'month',
            todayHighlight: 1,
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            collapse: 1,
            forceParse: 0
        });

        $('#endDatePicker').datetimepicker({
            language:  'es',
            format: 'dd MM yyyy',
            startView: 'year',
            viewMode: 'month',
            minView: 'month',
            todayHighlight: 1,
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            collapse: 1,
            forceParse: 0
        });

        $('#careers').select2({
            maximumSelectionLength: 10,
            language: 'es',
            allowClear: true
        });
    });
    </script>
@endpush