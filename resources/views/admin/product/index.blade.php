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
                                Index
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <form method="GET">
                <div class="row">
                    <div class="col-md-10 col-12">
                        <div class="form-group">
                            <input type="text" name="product" class="form-control" placeholder="Masukkan Nama Produk" value="{{ $product }}">
                        </div>
                    </div>
                    <div class="col-md-2 col-12">
                        <div class="form-group">
                            <input type="hidden" name="page" value="1">
                            <button class="btn btn-primary full-width">Cari Produk</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row match-height">
                @foreach ($products as $product)
                <div class="col-lg-3 col-md-3">
                    <div class="card">
                        <div class="card-body block-admin__card-body">
                            <h4 class="card-title block-admin__card-body-title">{{ $product->name }}</h4>
                        </div>
                        @if (count($product->images) > 0)
                        <img class="block-admin__card-image" src="{{ $product->images[0]->image }}" alt="{{ $product->name }}" loading="lazy">
                        @else
                        <img class="block-admin__card-image" src="https://lh3.googleusercontent.com/proxy/DReDjgReEru2bKs0FeGIhiW6Xkz6VwX5_h0VloWwO63B-zAfGXpCiqCGS4cQ_839H0FIxSTdpuzjyceOu5CExVReAwVWYmBXkKEcRcvfk6pK0U59TjM9-G07A3AtByRQ" alt="{{ $product->name }}" loading="lazy">
                        @endif
                        <div class="card-body text-center">
                            <span class="badge badge-primary">
                                Rp. {{ number_format($product->price) }}
                            </span>
                        </div>
                        <div class="card-footer block-admin__card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                            <div class="block-admin__card-footer-grid">
                                <div class="block-admin__card-footer-grid-item">
                                    <button class="btn btn-info full-width" title="Edit" onclick="window.location='{{ route('apps.product.edit', $product->id) }}'">
                                        <i class="ft-edit"></i> Edit
                                    </button>
                                </div>
                                <div class="block-admin__card-footer-grid-item">
                                    <form action="{{ route('apps.product.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
                    {{ $products->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary btn-sticky no-padding" title="Add New" onclick="window.location='{{ route('apps.product.create') }}'">
        <i class="ft-plus la-3x"></i>
    </button>
</div>
@endsection