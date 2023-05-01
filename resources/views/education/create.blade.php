@extends('layouts.main')
@section('pagetitle', 'Estudios')
@section('pagesubtitle', 'Education')

@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ route('education.index') }}">Estudios</a>
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

                {{ html()->form()->action(route('education.store'))->acceptsFiles()->open() }}  

                    @include('education.partials.form')

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