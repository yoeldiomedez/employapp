@extends('layouts.main')
@section('pagetitle', 'Capacitaciones')
@section('pagesubtitle', 'Trainings')

@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ route('trainings.index') }}">Capacitaciones</a>
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
                
                {{ html()->form('PUT', route('trainings.update', $training->id))->acceptsFiles()->open() }}  

                    @include('trainings.partials.form')

                    <div class="form-group">
                        {{ html()->input('submit')->value('Actualizar')->class(['btn', 'btn-warning']) }}
                        {{ html()->input('reset')->value('Cancelar')->class(['btn', 'btn-default']) }}
                    </div>

                {{ html()->form()->close() }}
            </div>
        </div>
    </div>
</div>

@if ($training->file)
    @include('trainings.modals.file')
@endif

@endsection