@extends('layout.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Order</h1>
  </div>

  <h2>Data Pesanan Saya</h2>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Product Name</th>
              <th scope="col">Category</th>
              <th scope="col">Total</th>
              <th scope="col">Status</th>
              <th scope="col">Tgl Order</th>
              <th scope="col">Tgl Kirim</th>
              <th scope="col">Invoice</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($orders as $paginate => $item)
                <tr>
                    <td>{{ $orders->firstItem() + $paginate }}</td>
                    <td class="align-middle">{{ $item->user->name }}</td>
                    <td class="align-middle">{{ $item->product->title }}</td>
                    <td class="align-middle">{{ $item->product->category->name }}</td>
                    <td class="align-middle">{{ $item->priceText }}</td>
                    <td class="align-middle">
                        <span class="badge {{ $item->status == 'selesai' ? 'bg-primary' : ($item->status == 'dikirim' ? 'bg-info' : 'bg-secondary') }}">
                            {{ $item->status }}
                        </span>
                    </td>                    
                    <td class="align-middle">{{ $item->created_at }}</td>
                    <td class="align-middle">{{ $item->tgl_kirim }}</td>
                    <td><a href="{{ route('cetak',$item->id) }}" class="btn btn-sm btn-primary">Cetak</a></td>
                </tr>
            @empty
                <tr>
                    <p>Tidak Ada Data</p>
                </tr>
            @endforelse
            
          </tbody>
        </table>

        {{ $orders->links('pagination::bootstrap-5') }}
      </div>

@endsection