@extends('layout.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Data Product</h1>
  </div>

  <h2>List Data Product</h2>
      <div class="table-responsive small">
        <a href="{{ route('tambah-data') }}" class="btn btn-primary">Tambah Data</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Image</th>
              <th scope="col">Title</th>
              <th scope="col">Harga</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($products as $paginate => $item)
                <tr>
                    <td>{{ $products->firstItem() + $paginate }}</td>
                    <td><img src="{{ $item->products_url }}" alt="{{ $item->title }}" width="70px"></td>
                    <td class="align-middle">{{ $item->title }}</td>
                    <td class="align-middle">{{ $item->priceText }}</td>
                    <td class="align-middle">{{ $item->category->name }}</td>
                    <td class="align-middle">
                        <div class="d-flex gap-1">
                            <a href="{{ route('product.edit', $item->id)  }}" class="btn btn-info btn-sm">Edit</a>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <p>Tidak Ada Data</p>
                </tr>
            @endforelse
            
          </tbody>
        </table>

        {{ $products->links('pagination::bootstrap-5') }}
      </div>

@endsection