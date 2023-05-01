@extends('layouts.auth')

@section('pagetitle', 'Register')

@section('content')
<!-- BEGIN REGISTRATION FORM -->
<form method="POST" action="{{ route('register') }}">
    @csrf
    <h3 class="form-title font-dark">Registro</h3>

        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">{{ __('Seleccione su(s) Escuela(s) Profesinal(es)') }}</label>
            <select name="career_ids[]" id="careers" class="form-control" multiple required> 
    
                <optgroup label="Escuelas Profesionales de Ingenierías">
                    @foreach ($careers as $career)
                        <option value="{{ $career->id }}" 
                            @if (old('career_ids'))
                                {{ (in_array($career->id, old('career_ids')) ? 'selected' : '') }}
                            @endif
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
                                @if (old('career_ids'))
                                    {{ (in_array($career->id, old('career_ids')) ? 'selected' : '') }}
                                @endif
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
                                @if (old('career_ids'))
                                    {{ (in_array($career->id, old('career_ids')) ? 'selected' : '') }}
                                @endif
                            >
                                {{ $career->name }}
                            </option>
                    @endforeach
                </optgroup>
            </select>            
        </div>
    
        <div class="form-group {{ $errors->has('dni') ? 'has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">{{ __('DNI') }}</label>
            <input id="dni" type="number" class="form-control" name="dni" value="{{ old('dni') }}" min="0" max="99999999" placeholder="DNI" required>
            @if ($errors->has('dni'))
                <span class="help-block text-center bold"> {{ $errors->first('dni') }} </span>
            @endif
        </div>
    
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">{{ __('Nombres') }}</label> 
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombres" required>
            @if ($errors->has('name'))
                <span class="help-block text-center bold"> {{ $errors->first('name') }} </span>   
            @endif
        </div>
    
        <div class="form-group {{ $errors->has('paternal_surname') ? 'has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">{{ __('Apellido Paterno') }}</label> 
            <input id="paternal_surname" type="text" class="form-control" name="paternal_surname" value="{{ old('paternal_surname') }}" placeholder="Apellido Paterno" required>
            @if ($errors->has('paternal_surname'))    
                <span class="help-block text-center bold"> {{ $errors->first('paternal_surname') }} </span>
            @endif
        </div>
    
        <div class="form-group {{ $errors->has('maternal_surname') ? 'has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">{{ __('Apellido Materno') }}</label> 
            <input id="maternal_surname" type="text" class="form-control" name="maternal_surname" value="{{ old('maternal_surname') }}" placeholder="Apellido Materno" required>
            @if ($errors->has('maternal_surname'))
                <span class="help-block text-center bold"> {{ $errors->first('maternal_surname') }} </span>
            @endif
        </div>
    
        <div class="form-group {{ $errors->has('birth_date') ? 'has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">{{ __('Fecha de Nacimiento') }}</label> 
    
            <div id="birthDatePicker" class="input-group date" data-link-field="birth_date">
                {{ html()->input('text')
                         ->value((old('birth_date') == null) ? null : Carbon\Carbon::parse(old('birth_date'))->translatedFormat('d F Y'))
                         ->required()
                         ->isReadonly()
                         ->placeholder('Fecha de Nacimiento')
                         ->class(['form-control'])
                }}
                <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
            </div>
            {{ html()->input('hidden', 'birth_date', old('birth_date'))->id('birth_date')->required() }}
            @if ($errors->has('birth_date'))
                <span class="help-block text-center bold"> {{ $errors->first('birth_date') }} </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">{{ __('E-Mail') }}</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail" required>
            @if ($errors->has('email'))
                <span class="help-block text-center bold"> {{ $errors->first('email') }} </span>
            @endif
        </div>
        
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">{{ __('Contraseña') }}</label>
            <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>
            @if ($errors->has('password'))
                <span class="help-block text-center bold"> {{ $errors->first('password') }} </span>
            @endif
        </div>
        
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">{{ __('Confirmar Contraseña') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar Contraseña"  required>
        </div>
    
        <div class="form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
            <div class="mt-radio-inline text-center">
                <label class="mt-radio">
                    {{ html()->radio('gender', old('gender') == 'F' ? true : false, 'F')->required() }}
                    FEMENINO
                    <span></span>
                </label>
                <label class="mt-radio">
                    {{ html()->radio('gender', old('gender') == 'M' ? true : false, 'M')->required() }}
                    MASCULINO
                    <span></span>
                </label>
            </div>
            @if ($errors->has('gender'))
                <span class="help-block text-center bold"> {{ $errors->first('gender') }} </span>
            @endif
        </div>

    <div class="form-actions">
        <button type="submit" id="register-btn" class="btn blue uppercase btn-block">
            {{ __('Registrase') }} <i class="icon-user-following "></i>
        </button>
    </div>
</form>
<!-- END REGISTRATION FORM -->
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#register-btn').click(function() {
        var t = $(this)
        t.button('loading'), setTimeout(function() {
            t.button('reset')
        }, 5e3)
    })

    $('#birthDatePicker').datetimepicker({
        language:  'es',
        format: 'dd MM yyyy',
        minView: 'month',
        todayHighlight: 1,
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        collapse: 1,
        forceParse: 0
    })

    $('#careers').select2({
        maximumSelectionLength: 2,
        language: 'es',
        placeholder: 'Seleccione su(s) Escuela(s) Profesional(es)',
        allowClear: true
    })

    $('input.select2-search__field').css('height', '42px')

    // $('#careers').select2('open')
})
</script>
@endpush