<div class="form-group">
    {{ html()->label('Capacitación', 'description') }}
    @if(!empty($training->description) && $training->description != null)
        {{ html()->text('description', $training->description)->required()->maxlength(60)->class(['form-control', 'uppercase']) }}
    @else
        {{ html()->text('description')->required()->maxlength(60)->class(['form-control', 'uppercase']) }}
    @endif
</div>

<div class="form-group">
    {{ html()->label('Fecha de Inicio', 'start_date') }}
    @if(!empty($training->start_date) && $training->start_date != null)
        <div id="startDatePicker" class="input-group date" data-link-field="start_date">
            {{ html()->input('text')
                ->value(Carbon\Carbon::parse($training->start_date)->translatedFormat('d F Y'))
                ->required()
                ->isReadonly()
                ->class(['form-control'])
            }}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {{ html()->input('hidden', 'start_date', $training->start_date)->id('start_date')->required() }}
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
    @if(!empty($training->end_date) && $training->end_date != null)
        <div id="endDatePicker" class="input-group date" data-link-field="end_date">
            {{ html()->input('text')
                ->value(Carbon\Carbon::parse($training->end_date)->translatedFormat('d F Y'))
                ->required()
                ->isReadonly()
                ->class(['form-control'])
            }}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {{ html()->input('hidden', 'end_date', $training->end_date)->id('end_date')->required() }}
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
    {{ html()->label('Institución', 'institution') }}
    @if(!empty($training->institution) && $training->institution != null)
        {{ html()->text('institution', $training->institution)->required()->class(['form-control', 'uppercase'])}}
    @else
        {{ html()->text('institution')->required()->class(['form-control', 'uppercase']) }}
    @endif
</div>

<div class="form-group">
    {{ html()->label('Ciudad', 'city') }}
    @if(!empty($training->city) && $training->city != null)
        {{ html()->text('city', $training->city)->required()->class(['form-control', 'uppercase']) }}
    @else
        {{ html()->text('city')->required()->class(['form-control', 'uppercase']) }}
    @endif
</div>

<div class="form-group">
    {{ html()->label('País', 'country_id') }}
    {{ html()->select(
            'country_id', 
            $countries,
            (!empty($training->country_id) && $training->country_id != null) ? $training->country_id : null  
        )->required()->id('countrySelector')->placeholder('Seleccione un País')->class(['form-control'])
    }}
</div>

<div class="form-group">
    {{ html()->label('Horas Lectivas', 'hours') }}
    @if(!empty($training->hours) && $training->hours != null)
        {{ html()->input('number', 'hours', $training->hours)->required()->attributes(['min' => 0])->class(['form-control']) }}
        
    @else
        {{ html()->input('number', 'hours')->required()->attributes(['min' => 0])->class(['form-control']) }}
    @endif
</div>

{{ html()->label('Archivo', 'file') }}

@if(!empty($training->file) && $training->file != null) 
    <div class="form-group">
        <a class="btn dark btn-outline" data-toggle="modal" href="#trainingFile">
            Mostrar <i class="fa fa-file-pdf-o"></i> 
        </a>
    </div>
@else 
    <div id="trainingInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
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

        $('#countrySelector').select2({
            language: 'es',
            placeholder: 'Busque y Seleccione un País',
            allowClear: true
        });
    });
    </script>
@endpush