@extends('admin.layouts.extend')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Admin</h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('administrator.index') }}">Admin</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Index
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row match-height">
                @foreach ($admins as $admin)
                <div class="col-lg-3 col-md-3">
                    <div class="card">
                        <div class="card-body block-admin__card-body">
                            <h4 class="card-title block-admin__card-body-title">{{ $admin->name }}</h4>
                        </div>
                        <img class="block-admin__card-image" src="{{ $admin->avatar }}" alt="Card image">
                        <div class="card-body text-center">
                            <span class="badge badge-secondary">
                                {{ ($admin->role == 1) ? 'administrator' : '' }}
                            </span>
                        </div>
                        <div class="card-footer block-admin__card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                            <div class="block-admin__card-footer-grid">
                                <div class="block-admin__card-footer-grid-item">
                                    <button class="btn btn-info full-width" title="Edit" onclick="window.location='{{ route('administrator.edit', $admin->id) }}'">
                                        <i class="ft-edit"></i> Edit
                                    </button>
                                </div>
                                <div class="block-admin__card-footer-grid-item">
                                    <form action="{{ route('administrator.destroy', $admin->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger full-width" title="Delete">
                                            <i class="ft-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row block-nav justify-content-center">
                <div class="col-lg-12 col-7 block-nav__box">
                   {{ $admins->links() }}
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary btn-sticky no-padding" title="Add New" onclick="window.location='{{ route('administrator.create') }}'">
        <i class="ft-plus la-3x"></i>
    </button>
</div>
@endsection
