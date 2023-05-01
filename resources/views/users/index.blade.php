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
            <span>Lista</span>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="portlet light">
            <div class="portlet-title">

            </div>
            <div class="portlet-body">
                @if (session('info'))
                <div class="alert alert-info text-center">
                    <button class="close" data-close="alert"></button>
                    <span  role="alert">
                        <strong>{{ session('info') }}</strong>
                    </span>
                </div>
                @endif
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="text-center">
                                <tr>
                                    <th>#</th>
                                    <th>DNI</th>
                                    <th>Nombres</th>
                                    <th>E-Mail</th>
                                    <th class="text-center" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->dni }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>

                                    @can('users.edit')
                                    <td class="text-center">
                                        <a href="{{ route('users.edit', $user->id) }}" class="btn yellow btn-outline">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                    @endcan

                                    @can('users.destroy')
                                    <td class="text-center">
                                        {{ html()->form('DELETE', route('users.destroy', $user->id) )->open() }}
                                            <button class="btn red btn-outline">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        {{ html()->form()->close() }}
                                    </td>
                                    @endcan 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-ls-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            {{ $users->onEachSide(1)->links() }}
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