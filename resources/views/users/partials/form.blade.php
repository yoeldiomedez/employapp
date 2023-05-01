@if (in_array(2, $user->roles->pluck('id')->toArray())) 
<div class="form-group">
    {{ html()->label('Escuela(s) Profesinal(es)', 'careers') }}
    {{ html()->multiselect('careers[]', $careers, $selected)
            ->required()
            ->id('careers')
            ->class(['form-control'])
    }}
</div>
@endif

<div class="form-group">
    {{ html()->label('DNI', 'dni') }}
    {{ html()->input('number', 'dni')
            ->required()
            ->attributes(['min' => 0, 'max' => 99999999])
            ->class(['form-control']) 
    }}
</div>

<div class="form-group">
    {{ html()->label('Nombres', 'name') }}
    {{ html()->text('name')->required()->class(['form-control']) }}
</div>

<div class="form-group">
    {{ html()->label('Apellido Paterno', 'paternal_surname') }}
    {{ html()->text('paternal_surname')->required()->class(['form-control']) }}
</div>

<div class="form-group">
    {{ html()->label('Apellido Materno', 'maternal_surname') }}
    {{ html()->text('maternal_surname')->required()->class(['form-control']) }}
</div>

@if (in_array(1, $user->roles->pluck('id')->toArray())) 
    <div class="form-group">
        {{ html()->label('E-Mail', 'email') }}
        {{ html()->email('email')->required()->class(['form-control']) }}
    </div>   
@endif
 
<div class="form-group">
    {{ html()->label('Fecha de Nacimiento', 'birth_date') }}
    <div id="birthDatePicker" class="input-group date" data-link-field="birth_date">
        {{ html()->input('text')
                ->value(($user->birth_date === null) ? null : Carbon\Carbon::parse($user->birth_date)->translatedFormat('d F Y'))
                ->required()
                ->isReadonly()
                ->class(['form-control'])
        }}
        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
    </div>
    {{ html()->input('hidden', 'birth_date', $user->birth_date)->id('birth_date')->required() }}
</div>

<div class="form-group">
    {{ html()->label('Sexo', 'gender') }}
    <div class="mt-radio-inline">
        <label class="mt-radio">
            {{ html()->radio('gender')->value('F')->checked($user->gender === 'F') }}
            FEMENINO
            <span></span>
        </label>
        <label class="mt-radio">
            {{ html()->radio('gender')->value('M')->checked($user->gender === 'M') }}
            MASCULINO
            <span></span>
        </label>
    </div>
</div>

<h3 class="form-section">Roles</h3>

<div class="form-group">
    <div class="mt-checkbox-list">
        @foreach($roles as $role)
            <label class="mt-checkbox"> {{ $role->name }}
                {{ html()->checkbox('roles[]')
                        ->value($role->id)
                        ->checked(in_array($role->id, $user->roles->pluck('id')->toArray()))
                }}
                <span></span>
            </label>
        @endforeach
    </div>
</div>

@push('scripts')
    <script>
    $(document).ready(function() {
        
        $('#birthDatePicker').datetimepicker({
            language:  'es',
            format: "dd MM yyyy",
            minView: 'month',
            todayHighlight: 1,
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            collapse: 1,
            forceParse: 0
        });

        $('#careers').select2({
            maximumSelectionLength: 2,
            language: 'es',
            placeholder: 'Seleccione su(s) Escuela(s) Profesional(es)',
            allowClear: true
        });
    });
    </script>
@endpush()