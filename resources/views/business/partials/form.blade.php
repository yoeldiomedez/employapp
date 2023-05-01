<div class="form-group">
    {{ html()->label('Nombre de la Entidad o Empresa', 'business_name') }}
    {{ html()->text('business_name')->required()->class(['form-control', 'uppercase']) }}
</div>

<div class="form-group">
    {{ html()->label('RUC', 'ruc') }}
    {{ html()->input('number', 'ruc')
            ->required()
            ->attributes(['min' => 0])
            ->class(['form-control']) 
    }}
</div>

<div class="form-group">
    {{ html()->label('Dirección', 'address') }}
    {{ html()->text('address')->required()->class(['form-control', 'uppercase']) }}
</div>

<div class="form-group">
    {{ html()->label('Número Celular / Teléfono', 'phone_or_mobile') }}
    {{ html()->input('number', 'phone_or_mobile')
            ->required()
            ->attributes(['min' => 0])
            ->class(['form-control']) 
    }}
</div>

<h3 class="form-section">Representante</h3> <br>

<div class="form-group">
    {{ html()->label('DNI', 'dni') }}
    @if(!empty($company->user->dni) && $company->user->dni != null)
        {{ html()->input('number', 'dni', $company->user->dni)
            ->required()
            ->attributes(['min' => 0, 'max' => 99999999])
            ->class(['form-control']) 
        }}
    @else
        {{ html()->input('number', 'dni')
            ->required()
            ->attributes(['min' => 0, 'max' => 99999999])
            ->class(['form-control']) 
        }}
    @endif
</div>

<div class="form-group">
    {{ html()->label('Nombres', 'name') }}
    @if(!empty($company->user->name) && $company->user->name != null)
        {{ html()->text('name', $company->user->name)->required()->class(['form-control', 'uppercase']) }}
    @else
        {{ html()->text('name')->required()->class(['form-control', 'uppercase']) }}
    @endif
</div>

<div class="form-group">
    {{ html()->label('Apellido Paterno', 'paternal_surname') }}
    @if(!empty($company->user->paternal_surname) && $company->user->paternal_surname != null)
        {{ html()->text('paternal_surname', $company->user->paternal_surname)->required()->class(['form-control', 'uppercase']) }}
    @else
        {{ html()->text('paternal_surname')->required()->class(['form-control', 'uppercase']) }}
    @endif
</div>

<div class="form-group">
    {{ html()->label('Apellido Materno', 'maternal_surname') }}
    @if(!empty($company->user->maternal_surname) && $company->user->maternal_surname != null)
        {{ html()->text('maternal_surname', $company->user->maternal_surname)->required()->class(['form-control', 'uppercase']) }}
    @else
        {{ html()->text('maternal_surname')->required()->class(['form-control', 'uppercase']) }}
    @endif
</div>

<div class="form-group">
    {{ html()->label('Fecha de Nacimiento', 'birth_date') }}
    @if(!empty($company->user->birth_date) && $company->user->birth_date != null)
        <div id="birthDatePicker" class="input-group date" data-link-field="birth_date">
            {{ html()->input('text')
                ->value(($company->user->birth_date === null) ? null : Carbon\Carbon::parse($company->user->birth_date)->translatedFormat('d F Y'))
                ->required()
                ->isReadonly()
                ->class(['form-control'])
            }}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {{ html()->input('hidden', 'birth_date', $company->user->birth_date)->id('birth_date')->required() }}
    @else
        <div id="birthDatePicker" class="input-group date" data-link-field="birth_date">
            {{ html()->input('text')
                ->required()
                ->isReadonly()
                ->class(['form-control'])
            }}
            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
        </div>
        {{ html()->input('hidden', 'birth_date')->id('birth_date')->required() }}
    @endif
</div>

<div class="form-group">
    {{ html()->label('E-Mail', 'email') }}
    @if(!empty($company->user->email) && $company->user->email != null)
        {{ html()->email('email', $company->user->email)->required()->class(['form-control']) }}
    @else
        {{ html()->email('email')->required()->class(['form-control']) }}
    @endif
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
    });
</script>
@endpush