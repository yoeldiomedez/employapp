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
                {!! Form::open(['route' => 'business.store']) !!}
                    
                    @include('business.partials.form')

                    <div class="form-group">
                        <label class="control-label">Contraseña</label>
                        {{ Form::password('password', ['class' => 'form-control', 'required' => 'true']) }}
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Confirmar Contraseña</label>
                        {{ Form::password('password_confirmation', ['class' => 'form-control', 'required' => 'true']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('birth_date', 'Sexo') }}
                        <div class="mt-radio-inline">
                            <label class="mt-radio">
                                {{ Form::radio('gender', 'F') }}
                                FEMENINO
                                <span></span>
                            </label>
                            <label class="mt-radio">
                                {{ Form::radio('gender', 'M') }}
                                MASCULINO
                                <span></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::submit('Registrar', ['class' => 'btn btn-primary']) }}
                        {{ Form::reset('Cancelar', ['class' => 'btn btn-default']) }}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
