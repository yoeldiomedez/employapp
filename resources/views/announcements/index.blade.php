@extends('layouts.main')
@section('pagetitle', 'Convocatorias')
@section('pagesubtitle', 'Announcements')
@section('content')
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('announcements.index') }}">Convocatorias</a>
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
                @can('announcements.create')
                <div class="caption">
                    <a href="{{ route('announcements.create') }}" class="btn blue btn-outline">
                        <i class="fa fa-plus"></i>  Agregar
                    </a>
                </div>
                <div class="actions text-center">
                    @include('announcements.partials.search')
                </div>
                @endcan
                @can('announcements.apply')
                <div class="text-center">
                    @include('announcements.partials.search')
                </div>
                @endcan
            </div>
            <div class="portlet-body">
                <div class="row">
                    @forelse ($announcements as $announcement)
                    <div class="col-md-offset-2 col-md-offset-2 col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title text-center bold">
                                    PROCESO CAS № {{ str_pad($announcement->id,3,"0",STR_PAD_LEFT) }}-{{Carbon\Carbon::parse($announcement->posted_date)->format('Y') }}
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">

                                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6"><p class="bold">Fecha de Publicación:</p></div>
                                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6">
                                        <p>{{ Carbon\Carbon::parse($announcement->created_at)->format('d/m/Y') }}</p>
                                    </div>

                                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6"><p class="bold">Inicio de Postulación:</p></div>
                                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6">
                                        <p>{{ Carbon\Carbon::parse($announcement->start_date)->format('d/m/Y') }}</p>
                                    </div>

                                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6"><p class="bold">Fin de Postulación:</p></div>
                                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6">
                                        <p>{{ Carbon\Carbon::parse($announcement->end_date)->format('d/m/Y') }}</p>
                                    </div>

                                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6"><p class="bold">Codigo:</p></div>
                                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6">
                                        <p> CAS № {{ str_pad($announcement->id,3,"0",STR_PAD_LEFT) }}-{{Carbon\Carbon::parse($announcement->posted_date)->format('Y') }}</p>
                                    </div>

                                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6"><p class="bold">Solicitante:</p></div>
                                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6">
                                        <p>{{ $announcement->company->business_name }}</p>
                                    </div>

                                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6"><p class="bold">Cargo:</p></div>
                                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6">
                                        <p>{{ $announcement->position }}</p>
                                    </div>

                                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6"><p class="bold">Bases:</p></div>
                                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6">
                                        <p>
                                            @if($announcement->bases)
                                                <a href="{{ asset(config('app.link').'/announcement/'.$announcement->bases) }}" target="_blank" class="text-danger" data-toggle="tooltip" data-placement="right" title="Ver / Descargar Bases">
                                                    <i class="fa fa-2x fa-file-pdf-o"></i>
                                                </a>
                                            @else
                                                <i class="fa fa-2x fa-file-pdf-o"></i>
                                            @endif
                                        </p>
                                    </div>

                                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6"><p class="bold">Anexos:</p></div>
                                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6">
                                        <p>
                                            @if($announcement->annexes)
                                                <a href="{{ asset(config('app.link').'/announcement/'.$announcement->annexes) }}" target="_blank">COMUNICADO</a>
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>

                                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6"><p class="bold">Evaluación de CVs:</div>
                                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6">
                                        <p>
                                            @if($announcement->partial_results)
                                                <a href="{{ asset(config('app.link').'/announcement/'.$announcement->partial_results) }}" target="_blank">RESULTADO EVALUACION CV</a>
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>

                                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6"><p class="bold">Resultado Final:</div>
                                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6">
                                        <p>
                                            @if($announcement->final_results)
                                                <a href="{{ asset(config('app.link').'/announcement/'.$announcement->final_results) }}" target="_blank">RESULTADO FINAL</a>
                                            @else
                                                -
                                            @endif
                                        </p>
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="btn-group btn-group-justified">

                                            @can('announcements.select')
                                                @if ($announcement->state)
                                                    <a href="{{ route('announcements.show', $announcement->id) }}" class="btn dark btn-outline">
                                                        Evaluar <i class="fa fa-check-circle-o"></i>
                                                    </a>
                                                @endif
                                            @endcan

                                            @can('announcements.edit')
                                                @if ($announcement->state)
                                                    <a href="{{ route('announcements.edit', $announcement->id) }}" class="btn yellow btn-outline">
                                                        Editar <i class="fa fa-edit"></i>
                                                    </a>
                                                @endif
                                            @endcan

                                            @can('announcements.destroy')
                                                @if ($announcement->state)
                                                    <a class="btn red btn-outline" data-toggle="modal" href="#delete-{{$announcement->id}}">
                                                        Eliminar <i class="fa fa-trash"></i>
                                                    </a> 
                                                @endif
                                            @endcan

                                            @can('announcements.apply')
                                                @if(
                                                    !Auth::user()->applying && 
                                                    $announcement->state    &&
                                                    Carbon\Carbon::today() <= Carbon\Carbon::parse($announcement->end_date)
                                                )
                                                <a class="btn dark btn-outline" data-toggle="modal" href="#apply-{{$announcement->id}}">
                                                    Postular <i class="fa fa-send-o"></i>
                                                </a> 
                                                @else
                                                <a class="btn dark btn-outline disabled">
                                                        Postular <i class="fa fa-send-o"></i>
                                                    </a>                                                 
                                                @endif
                                            @endcan

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @can('announcements.destroy') @include('announcements.modals.delete') @endcan
                    @can('announcements.apply')   @include('announcements.modals.apply')  @endcan
                    @empty
                    <div class="row">
                        <div class="col-ls-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            @can('announcements.create')
                                No tiene ninguna Convocatoria agregada.
                            @endcan
                            @can('announcements.apply')
                                Aún no hay convocatorias publicadas.
                            @endcan
                        </div>
                    </div>
                    @endforelse
                </div>
                <div class="row">
                    <div class="col-ls-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        {{ $announcements->links() }}
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