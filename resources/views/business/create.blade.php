@extends('layouts.main')
@section('pagetitle', 'Empresas')
@section('pagesubtitle', 'Bussiness')
@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('business.index') }}">Empresas</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Nuevo</span>
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
                {{ html()->form()->action(route('business.store'))->open() }}
                    
                    @include('business.partials.form')

                    <div class="form-group">
                        <label class="control-label">Contraseña</label>
                        {{ html()->password('password')->required()->class(['form-control']) }}
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Confirmar Contraseña</label>
                        {{ html()->password('password_confirmation')->required()->class(['form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ html()->label('Sexo', 'gender') }}
                        <div class="mt-radio-inline">
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
                    </div>

                    <div class="form-group">
                        {{ html()->input('submit')->value('Registrar')->class(['btn', 'btn-primary']) }}
                        {{ html()->input('reset')->value('Cancelar')->class(['btn', 'btn-default']) }}
                    </div>

                {{ html()->form()->close() }}  
            </div>
        </div>
    </div>
</div>
@endsection
