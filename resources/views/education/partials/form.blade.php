<div class="form-group">
    {{ html()->label('Título o Grado', 'degree_id') }}
    {{ html()->select(
            'degree_id', 
            $degrees,
            (!empty($education->degree_id) && $education->degree_id != null) ? $education->degree_id : null, 
        )->required()->id('degreeSelector')->placeholder('Seleccione un Título o Grado')->class(['form-control', 'selectpicker']) 
    }}
</div>

<div id="description" class="form-group">
    @if(!empty($education->description) && $education->description != null)
    {{ html()->label('Descripción', 'description') }}
    {{ html()->text('description', $education->description)->required()->class(['form-control', 'uppercase']) }}
    @endif
</div>

<div class="form-group">
    {{ html()->label('Especialidad', 'specialty') }}
    @if(!empty($education->specialty) && $education->specialty != null)
    {{ html()->text('specialty', $education->specialty)->required()->maxlength(60)->class(['form-control', 'uppercase']) }}
    @else
    {{ html()->text('specialty')->required()->maxlength(60)->class(['form-control', 'uppercase']) }}
    @endif
</div>

<div class="form-group">
    {{ html()->label('¿No tiene Título o Grado?', 'specialty') }}
    <label class="mt-checkbox"> 
        @if(!empty($education->degree_status) && $education->degree_status != null )
        <input type="checkbox" id="noDegree" name="lDegree" value="degree" checked />
        @else 
        <input type="checkbox" id="noDegree" name="lDegree" value="degree"/>
        @endif
        <span></span>
    </label> 
</div>

<div id="dateDegreeStatus" class="form-group">
    {{ html()->label('Fecha de Expedición del Título o Grado', 'degree_date') }}
@if(!empty($education->degree_date) && $education->degree_date != null)
    <div id="degreeDatePicker" class="input-group date" data-link-field="degree_date">
        {{ html()->input('text')
                ->value(Carbon\Carbon::parse($education->degree_date)->translatedFormat('F Y'))
                ->required()
                ->isReadonly()
                ->class(['form-control'])
        }}
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
    </div>
    {{ html()->input('hidden', 'degree_date', $education->degree_date)->id('degree_date')->required() }}
@else
    @if(!empty($education->degree_status) && $education->degree_status != null)
        {{ html()->label('Especificar', 'degree_status') }}
        {{ html()->select(
                'degree_status', 
                [
                    'E' => 'ES EGRESADO', 
                    'T' => 'EN TRAMITE',
                    'C' => 'ESTUDIO EN CURSO'
                ], 
                $education->degree_status
            )->required()->placeholder('Seleccione una Opción')->class(['form-control', 'selectpicker']) 
        }}
    @else
        <div id="degreeDatePicker" class="input-group date" data-link-field="degree_date">
            {{ html()->text()->required()->isReadonly()->class(['form-control']) }}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {{ html()->input('hidden', 'degree_date')->id('degree_date')->required() }}
    @endif
@endif
</div>

<div class="form-group">
    {{ html()->label('Universidad', 'college') }}
    @if(!empty($education->college) && $education->college != null)
        {{ html()->text('college', $education->college)->required()->class(['form-control', 'uppercase']) }}
    @else
        {{ html()->text('college')->required()->class(['form-control', 'uppercase']) }}
    @endif
</div>

<div class="form-group">
    {{ html()->label('Ciudad', 'city') }}
    @if(!empty($education->city) && $education->city != null)
        {{ html()->text('city', $education->city)->required()->class(['form-control', 'uppercase']) }}
    @else
        {{ html()->text('city')->required()->class(['form-control', 'uppercase']) }}
    @endif
</div>

<div class="form-group">
    {{ html()->label('País', 'country_id') }}
    {{ html()->select(
            'country_id', 
            $countries,
            (!empty($education->country_id) && $education->country_id != null) ? $education->country_id : null
        )->required()->id('countrySelector')->placeholder('Seleccione un País')->class(['form-control'])
    }}
</div>

{{ html()->label('Archivo', 'degree_file') }}

@if(!empty($education->degree_file) && $education->degree_file != null) 
<div class="form-group">
    <a class="btn dark btn-outline" data-toggle="modal" href="#degreeFile">
        Mostrar <i class="fa fa-file-pdf-o"></i> 
    </a>
</div>
@else 
<div id="degreeInputFile" class="fileinput fileinput-new input-group" data-provides="fileinput">
    <div class="form-control" data-trigger="fileinput">
        <i class="fa fa-file-pdf-o fileinput-exists"></i> <span class="fileinput-filename"></span>
    </div>
    <span class="input-group-addon btn btn-default btn-file">
        <span class="fileinput-new">Seleccionar</span>
        <span class="fileinput-exists">Cambiar</span>
        {{ html()->file('degree_file')->accept('.pdf') }}
    </span>
    <a href="JavaScript:;" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Quitar</a>
</div>
@endif

@push('scripts')
    <script>
    $(document).ready(function() {

        $('#degreeDatePicker').datetimepicker({
            language:  'es',
            format: 'MM yyyy',
            startView: 'year',
            viewMode: 'month',
            minView: 'year',
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

        $('#degreeSelector').on('change', function (e) {
            
            var valueSelected = this.value;

            // console.log(valueSelected);

            if (valueSelected == 10) {

                // console.log('Mostrar input descripción');

                $('#description').append(`
                    <label for="description">Descripción</label>
                    <input type="text" name="description" value="" class="form-control uppercase" required/>
                `);

            } else {
                // console.log('Ocultar input descripción');
                $('#description').empty();
            }
        });

        $('#noDegree').change(function() {

            if(this.checked) {

                // console.log('Mostrar dropdown Especificar');

                $('#dateDegreeStatus').empty();

                $('#dateDegreeStatus').append(`
                    <label for="description">Especificar</label>
                    <select id="degreeStatus" name="degree_status" class="form-control" required>
                        <option selected="selected" value="">Seleccione una Opción</option>
                        <option value="E">ES EGRESADO</option>
                        <option value="T">EN TRAMITE</option>
                        <option value="C">ESTUDIO EN CURSO</option>
                    </select>                
                `);

                $('#degreeStatus').selectpicker();
            }else{

                // console.log('Borrar dropdown Especificar, Mostrar input Fecha');

                $('#dateDegreeStatus').empty();

                $('#dateDegreeStatus').append(`
                <label for="degree_date">Fecha de Expedición del Título o Grado</label>  
                <div id="degreeDatePicker2" class="input-group date" data-link-field="degree_date">
                    <input type"text" name="" class="form-control" readonly required/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                    <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                </div>
                <input type="hidden" name="degree_date" id="degree_date" required/>             
                `);
                
                $('#degreeDatePicker2').datetimepicker({
                    language:  'es',
                    format: 'MM yyyy',
                    startView: 'year',
                    viewMode: 'month',
                    minView: 'year',
                    todayHighlight: 1,
                    weekStart: 1,
                    todayBtn:  1,
                    autoclose: 1,
                    collapse: 1,
                    forceParse: 0
                });
            }
        });
    });
    </script>
@endpush()