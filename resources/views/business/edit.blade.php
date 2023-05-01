@extends('layouts.main')
@section('pagetitle', 'Empresas')
@section('pagesubtitle', 'Bussiness')
@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('business.edit') }}">Empresas</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Edición</span>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="portlet light">
            
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="portlet-body">
                {{ html()->modelForm($company, 'PUT', route('business.update', $company->id))->open() }}

                    @include('business.partials.form')

                    <div class="form-group">
                        <label class="control-label">Contraseña Actual</label>
                        {{ html()->password('current_password')->class(['form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Nueva Contraseña</label>
                        {{ html()->password('password')->class(['form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Confirmar Contraseña</label>
                        {{ html()->password('password_confirmation')->class(['form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ html()->label('Sexo', 'gender') }}
                        <div class="mt-radio-inline">
                            <label class="mt-radio">
                                {{ html()->radio('gender')->value('F')->checked($company->user->gender === 'F') }}
                                FEMENINO
                                <span></span>
                            </label>
                            <label class="mt-radio">
                                {{ html()->radio('gender')->value('M')->checked($company->user->gender === 'M') }}
                                MASCULINO
                                <span></span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {{ html()->input('submit')->value('Actualizar')->class(['btn', 'btn-warning']) }}
                        {{ html()->input('reset')->value('Cancelar')->class(['btn', 'btn-default']) }}
                    </div>

                {{ html()->closeModelForm() }}
            </div>
        </div>
    </div>
</div>
@endsection