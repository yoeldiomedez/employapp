@extends('layouts.main')
@section('pagetitle', 'Empresas')
@section('pagesubtitle', 'Bussiness')
@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ route('business.index') }}">Empresas</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <span>Lista</span>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="portlet light">
            <div class="portlet-title">
                <a href="{{ route('business.create') }}" class="btn blue btn-outline"> 
                    <i class="fa fa-plus"></i> Agregar
                </a>                
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Entidad / Empresa</th>
                            <th class="text-center">RUC</th>
                            <th class="text-center">Dirección</th>
                            <th class="text-center">Teléfono / Celular</th>
                            <th class="text-center">Representante</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($companies as $company)
                        <tr>
                            <td>{{ $company->business_name }}</td>
                            <td>{{ $company->ruc }}</td>
                            <td>{{ $company->address }}</td>
                            <td>{{ $company->phone_or_mobile }}</td>
                            <td >
                                <span data-toggle="tooltip" data-placement="top" title="DNI — {{ $company->user->dni }}">
                                    {{ $company->user->name }} 
                                    {{ $company->user->paternal_surname }} 
                                    {{ $company->user->maternal_surname }}
                                </span>
                            </td>

                            @can('business.destroy')
                            <td class="text-center">
                                {{ html()->form('DELETE', route('business.destroy', $company->id) )->open() }}
                                    <button class="btn red btn-outline">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                {{ html()->form()->close() }}
                            </td>
                            @endcan 
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No tiene ningúna Entidad o Empresa agregado.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                </div>
                <div class="row">
                    <div class="col-ls-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        {{ $companies->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            if (window.navigator.userAgent.indexOf("Mobile") > -1) {
                // console.log('I am on a mobile screen')
                $( "#downPagination" ).hide()
            } else {
                // console.log('I am on a desktop screen')
                $( "#upPagination" ).hide()
            } 
            $('[data-toggle="tooltip"]').tooltip() 
        })
    </script>    
@endpush