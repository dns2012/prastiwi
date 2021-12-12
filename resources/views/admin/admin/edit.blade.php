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
                                Edit
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row match-height justify-content-center">
                <div class="col-xl-10 col-lg-10 col-md-10 col-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="card-body">
                                <form method="POST" action="{{ route('administrator.update', $user->id) }}" enctype="multipart/form-data" class="forms-sample">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ $user->name }}" required>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ $user->email }}" required>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select name="role" class="form-control @error('role') is-invalid @enderror">
                                            <option value="1" @if($user->role == 1) selected @endif>Admin</option>
                                            <option value="2" @if($user->role == 2) selected @endif>Koperasi</option>
                                            <option value="3" @if($user->role == 3) selected @endif>Toko</option>
                                        </select>
                                        @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Avatar</label>
                                        <br>
                                        <img src="{{ $user->avatar }}" class="img-fluid mb-1" alt="avatar">
                                        <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror">
                                        @error('avatar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-rounded mr-2">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
