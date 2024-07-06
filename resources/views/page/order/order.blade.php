@extends('layout.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Order</h1>
  </div>

  <h2>Data Pesanan dari Penjualan saya</h2>
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
            @forelse ($data as $paginate => $item)
                <tr>
                    <td>{{ $data->firstItem() + $paginate }}</td>
                    <td class="align-middle">{{ $item->user->name }}</td>
                    <td class="align-middle">{{ $item->product->title }}</td>
                    <td class="align-middle">{{ $item->product->category->name }}</td>
                    <td class="align-middle">{{ $item->priceText }}</td>
                    <td class="align-middle">
                        <span class="badge {{ $item->status == 'selesai' ? 'bg-primary' : ($item->status == 'dikirim' ? 'bg-success' : 'bg-secondary') }}">
                            {{ $item->status }}
                        </span><br>

                        <button class="btn badge bg-info" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $item->id }}" {{ $item->status == 'selesai' ? 'disabled' : ''  }}> 
                          <i class="bx bx-detail me-2"></i> Update Status
                      </button>
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

        {{ $data->links('pagination::bootstrap-5') }}
      </div>

      
      {{-- Modal Update status --}}
      @foreach ($data as $item)
      <div class="modal" id="exampleModal{{ $item->id }}" tabindex="-1" style="padding-top:0px ">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-primary">Update Status Produk Ini</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('updateStatus', $item->id) }}" method="POST">
                @method('PUT')
                @csrf
                    <div class="modal-body" style="overflow-wrap: anywhere;">
                        <div class="mb-3">
                            <label for="title" class="form-label">Nama Product</label>
                            <input type="text" class="form-control" id="title" value="{{ $item->product->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            @php
                              $status = ['diproses','selesai','dikirim'];  
                            @endphp
                             <select class="form-select @error('status') is-invalid @enderror cursor-pointer" name="status" id="status" required>
                                  <option value="">Select Category</option>
                                  @foreach ($status as $s)
                                      @if(old('status', $item->status) == $s)
                                          <option value="{{ $s }}" selected>{{$s}}</option>
                                      @else 
                                          <option value="{{ $s}}">{{$s}}</option>
                                      @endif
                                  @endforeach
                            </select>
                            @error('status')
                              <div class="invalid-feedback d-block">
                                  {{ $message }}
                              </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                    
                        <button type="submit" class="btn btn-info">Update</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    @endforeach


@endsection