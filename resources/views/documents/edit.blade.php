@extends('layouts.main')
@section('pagetitle', 'Documentos')
@section('pagesubtitle', 'Documents')
@section('content')

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ route('documents.edit') }}">Documentos</a>
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
            <div class="portlet-body">
    
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! Form::open([
                    'route'  => ['documents.update'],
                    'method' => 'PUT',
                    'files'  => true
                ]) !!}
                    
                    @include('documents.partials.form')

                <div class="form-group">
                    {{ Form::submit('Actualizar', ['class' => 'btn btn-warning']) }}
                    {{ Form::reset('Cancelar', ['class' => 'btn btn-default']) }}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@if ($document->affidavit_file)
    @include('documents.modals.affidavit')    
@endif

@if ($document->dni_file)
    @include('documents.modals.dni')
@endif

@if ($document->vacancy_file)
    @include('documents.modals.vacancy')
@endif

@if ($document->aditional_file)
    @include('documents.modals.aditional')
@endif

@endsection