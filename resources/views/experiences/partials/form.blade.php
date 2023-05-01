<div class="form-group">
    {{ html()->label('Nombre de la Entidad o Empresa', 'company') }}
    @if(!empty($experience->company) && $experience->company != null)
        {{ html()->text('company', $experience->company)->required()->class(['form-control', 'uppercase']) }}
    @else
        {{ html()->text('company')->required()->class(['form-control', 'uppercase']) }}
    @endif
</div>

<div class="form-group">
    {{ html()->label('Cargo Desempeñado', 'position') }}
    @if(!empty($experience->position) && $experience->position != null)
        {{ html()->text('position', $experience->position)->required()->maxlength(60)->class(['form-control', 'uppercase']) }}
    @else
        {{ html()->text('position')->required()->maxlength(60)->class(['form-control', 'uppercase']) }}
    @endif
</div>

<div class="form-group">
    {{ html()->label('Fecha de Inicio', 'start_date') }}
    @if(!empty($experience->start_date) && $experience->start_date != null)
        <div id="startDatePicker" class="input-group date" data-link-field="start_date">
            {{ html()->input('text')
                ->value(Carbon\Carbon::parse($experience->start_date)->translatedFormat('d F Y'))
                ->required()
                ->isReadonly()
                ->class(['form-control'])
            }}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {{ html()->input('hidden', 'start_date', $experience->start_date)->id('start_date')->required() }}
    @else
        <div id="startDatePicker" class="input-group date" data-link-field="start_date">
            {{ html()->text()->required()->isReadonly()->class(['form-control']) }}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {{ html()->input('hidden', 'start_date')->id('start_date')->required() }}
    @endif
</div>

<div class="form-group">
    {{ html()->label('Fecha de Finalización', 'end_date') }}
    @if(!empty($experience->end_date) && $experience->end_date != null)
        <div id="endDatePicker" class="input-group date" data-link-field="end_date">
            {{ html()->input('text')
                ->value(Carbon\Carbon::parse($experience->end_date)->translatedFormat('d F Y'))
                ->required()
                ->isReadonly()
                ->class(['form-control'])
            }}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {{ html()->input('hidden', 'end_date', $experience->end_date)->id('end_date')->required() }}
    @else
        <div id="endDatePicker" class="input-group date" data-link-field="end_date">
            {{ html()->text()->required()->isReadonly()->class(['form-control']) }}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {{ html()->input('hidden', 'end_date')->id('end_date')->required() }}
    @endif
</div>

<div class="form-group">
    {{ html()->label('Descripción del Trabajo Realizado', 'description') }}
    @if(!empty($experience->description) && $experience->description != null)
        {{ html()->textarea('description', $experience->description)->required()->rows(4)->class(['form-control', 'uppercase']) }}
    @else
        {{ html()->textarea('description')->required()->rows(4)->class(['form-control', 'uppercase']) }}
    @endif
</div>

{{ html()->label('Archivo', 'degree_file') }}

@if(!empty($experience->file) && $experience->file != null) 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal" href="#experienceFile">
            Mostrar <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
@else 
    <div id="experienceInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
            <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
        </div>
        <span class="input-group-addon btn btn-default btn-file">
            <span class="fileinput-new">Seleccionar</span>
            <span class="fileinput-exists">Cambiar</span>
            {{ html()->file('file')->accept('.pdf') }}
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
    });
    </script>
@endpush