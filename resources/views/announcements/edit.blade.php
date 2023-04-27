@extends('layouts.main')
@section('pagetitle', 'Convocatorias')
@section('pagesubtitle', 'Announcements')

@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ route('announcements.index') }}">Convocatorias</a>
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

                {!! Form::model(
                    $announcement,
                    [
                        'route'  => ['announcements.update', $announcement->id],
                        'method' => 'PUT',
                        'files'  => true
                    ] 
                ) !!}

                    @include('announcements.partials.form')

                <div class="form-group">
                    {{ Form::submit('Actualizar', ['class' => 'btn btn-warning']) }}
                    {{ Form::reset('Cancelar', ['class' => 'btn btn-default']) }}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@if ($announcement->bases)
    @include('announcements.modals.bases')    
@endif

@if ($announcement->annexes)
    @include('announcements.modals.annexes')    
@endif

@if ($announcement->partial_results)
    @include('announcements.modals.presults')    
@endif

@if ($announcement->final_results)
    @include('announcements.modals.fresults')    
@endif

@endsection