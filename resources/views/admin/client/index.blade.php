@extends('admin.layouts.extend')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Anggota</h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('apps.client.index') }}">Anggota</a>
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
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body block-admin__card-body">
                            @error('message')
                                <div class="alert alert-info" role="alert">
                                    {!! $message !!}
                                </div>
                            @enderror
                            <form method="GET">
                                <div class="row">
                                    <div class="col-md-10 col-12">
                                        <div class="form-group">
                                            <input type="text" name="client" class="form-control" placeholder="Masukkan No Anggota" value="{{ $client }}">
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-12">
                                        <div class="form-group">
                                            <input type="hidden" name="page" value="1">
                                            <button class="btn btn-primary full-width">Cari Anggota</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>No. Anggota</th>
                                        <th>NIK</th>
                                        <th>Name</th>
                                        <th>Jabatan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $index => $client)
                                    <tr>
                                        <th scope="row">{{ $index + $clients->firstItem() }}</th>
                                        <td>{{ $client->member_id }}</td>
                                        <td>{{ $client->employee_id }}</td>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->position }}</td>
                                        <td>
                                            <div class="block-admin__card-footer-grid">
                                                <!-- <div class="block-admin__card-footer-grid-item">
                                                    <button class="btn btn-info full-width" title="Edit" onclick="window.location='{{ route('apps.client.edit', $client->id) }}'">
                                                        <i class="ft-edit"></i> Edit
                                                    </button>
                                                </div> -->
                                                <div class="block-admin__card-footer-grid-item">
                                                    <form action="{{ route('apps.client.update', $client->id) }}" method="POST" onsubmit="return confirm('Anda yakin akan mereset password {{ $client->name }} ?')">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-danger full-width" title="Delete">
                                                            <i class="ft-refresh-ccw"></i> Reset Password
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row block-nav justify-content-center">
                <div class="col-lg-12 col-7 block-nav__box">
                    {{ $clients->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary btn-sticky no-padding" title="Add New" onclick="window.location='{{ route('apps.client.create') }}'">
        <i class="ft-plus la-3x"></i>
    </button>
</div>
@endsection
