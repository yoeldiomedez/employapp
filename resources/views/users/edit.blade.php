@extends('layouts.main')
@section('pagetitle', 'Usuarios')
@section('pagesubtitle', 'Users')
@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('users.index') }}">Usuarios</a>
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
                    {{ html()->modelForm($user, 'PUT', route('users.update', $user->id))->open() }}
                    
                    @include('users.partials.form')
                    
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