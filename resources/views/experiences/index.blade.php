@extends('layouts.main')
@section('pagetitle', 'Experiencia Laboral')
@section('pagesubtitle', 'Experience')
@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ route('experiences.index') }}">Experiencia Laboral</a>
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
                <a href="{{ route('experiences.create') }}" class="btn blue btn-outline"> 
                    <i class="fa fa-plus"></i> Agregar
                </a>                
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Entidad / Empresa</th>
                            <th class="text-center">Cargo Desempeñado</th>
                            <th class="text-center">F. Inicio</th>
                            <th class="text-center">F. Fin</th>
                            <th class="text-center" colspan="3">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($experiences as $experience)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $experience->company }}</td>
                            <td>{{ $experience->position }}</td>
                            <td class="uppercase">{{ Carbon\Carbon::parse($experience->start_date)->translatedFormat('d F Y') }}</td>
                            <td class="uppercase">
                                @if ($experience->end_date != null)
                                    {{ Carbon\Carbon::parse($experience->end_date)->translatedFormat('d F Y') }}
                                @else
                                    Presente
                                @endif
                            </td>
                            <td>
                                @if($experience->file)
                                <a href="{{ asset(config('app.link').'/experience/'.$experience->file) }}" class="btn dark btn-outline" target="_blank">
                                    <i class="fa fa-file-pdf-o"></i>
                                </a>
                                @else
                                <button class="btn dark btn-outline" disabled="disabled">
                                    <i class="fa fa-file-pdf-o"></i> 
                                </button>
                                @endif
                            </td>

                            @can('experiences.edit')
                            <td class="text-center">
                                <a href="{{ route('experiences.edit', $experience->id) }}" class="btn yellow btn-outline">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            @endcan 

                            @can('experiences.destroy')
                            <td class="text-center">
                                {!! Form::open([
                                    'route' => ['experiences.destroy', $experience->id],
                                    'method' => 'DELETE'
                                ]) !!}
                                    <button class="btn red btn-outline">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                {!! Form::close() !!}
                            </td>
                            @endcan 
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No tiene ningúna Experiencia Laboral agregado.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                </div>
                <div class="row">
                    <div class="col-ls-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        {{ $experiences->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // CONDITION TO DETECT SYSTEM SCREEN
    if (window.navigator.userAgent.indexOf("Mobile") > -1) {
        // console.log('I am on a mobile screen')
        $( "#downPagination" ).hide()
    } else {
        // console.log('I am on a desktop screen')
        $( "#upPagination" ).hide()
    }                                      
</script>
@endpush