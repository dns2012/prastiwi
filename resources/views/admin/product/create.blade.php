@extends('admin.layouts.extend')

@section('content')
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
            <div class="content-header-left col-md-4 col-12 mb-2">
                <h3 class="content-header-title">Toko</h3>
            </div>
            <div class="content-header-right col-md-8 col-12">
                <div class="breadcrumbs-top float-md-right">
                    <div class="breadcrumb-wrapper mr-1">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('apps.product.index') }}">Toko</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Create
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
                                <form method="POST" action="{{ route('apps.product.store') }}" enctype="multipart/form-data" class="forms-sample">
                                    @csrf
                                    <div class="form-group">
                                        <label>Nama Produk</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Produk" value="{{ old('name') }}" required>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi Produk</label>
                                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Deskripsi Produk">{{ old('description') }}</textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Harga Produk" value="{{ old('price') }}" required>
                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Coret</label>
                                        <input type="number" name="fake_price" class="form-control @error('fake_price') is-invalid @enderror" placeholder="Harga Coret" value="{{ old('fake_price') }}" required>
                                        @error('fake_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar Produk</label>
                                        <input type="file" name="images[]" class="form-control @error('images') is-invalid @enderror" multiple required>
                                        <span>*ketika memilih file, tekan tombol ctrl untuk memilih beberapa gambar sekaligus <strong>(.jpg, .jpeg, .png, .webp)</strong></span>
                                        @error('images')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        @error('images.*')
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
