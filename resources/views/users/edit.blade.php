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
                    {!! Form::model(
                        $user,
                        [
                            'route'  => ['users.update', $user->id],
                            'method' => 'PUT'
                        ] 
                    ) !!}

                    @include('users.partials.form')
                    
                    <div class="form-group">
                        {{ Form::submit('Actualizar', ['class' => 'btn btn-warning']) }}
                        {{ Form::reset('Cancelar', ['class' => 'btn btn-default']) }}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection