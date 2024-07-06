@extends('layout.app')

@section('content')
<div class="card-body">
 <h2>Detail Product</h2>
 <hr>
    <div class="mt-3">
        <div class="d-flex flex-wrap gap-2 mt-2 mb-5">
            <form action="{{ route('checkout', $data->id) }}" method="POST">
                <div class="card">
                    <div class="d-flex flex-wrap gap-5">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $data->id }}">
                        <div class="col-md-4">
                            <img src="{{ $data->products_url }}" class="card-img-top" alt="user default" style="border: 1px solid #e7e0e0;height:100%">
                        </div>
                        <div class="col-md-5 mt- mb-2">
                            <h2>{{ $data->title }}</h2>
                            <h3>Nama Merchant :{{ $data->user->name }}</h3>
                            <h3>Category : {{ $data->category->name }}</h3>
                            <h1 class="mt-3">{{ $data->priceText }}</h1>

                            <div class="mb-3">
                                <label for="qty" class="form-label">Mau Pesan Berapa?</label>
                                <input type="number" class="form-control @error('qty') @enderror" name="qty" id="qty" placeholder="e.g: 3" required>
                                <span class="text-small" style="font-size: 11px">*Jumlah pesanan anda</span> <br>
                                <label for="qty" class="form-label">Mau di kirim kapan?</label>
                                <input type="date" class="form-control @error('tgl_kirim') @enderror" name="tgl_kirim" id="tgl_kirim" required>
                              </div>

                            <div class="d-block mt-2">
                                <button type="submit" class="btn btn-success">Checkout Sekarang</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card w-100 mt-2">
                    <div class="card-body">
                        <h3>Description</h3>
                        <p>{{ $data->description }}</p>
                    </div>
                </div>
            </form>
        </div>
       
    </div>
</div>

@endsection