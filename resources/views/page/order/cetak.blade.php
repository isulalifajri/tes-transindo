<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ $title }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <!-- Core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <style>
        *,body,html{
            font-family: sans-serif;
            /* margin:40px 50px */
        }
        table, th, td{
            border: 1px solid #252323;
        }
        table th{
            padding: 7px 10px;
            text-align: center;
        }
        table td{
            padding: 5px;
        }
        @page { margin: 30px 10px; }
    </style>

  </head>

<body>

    <div class="container">
        <div class="text-center m-auto">
            <label class="p-0 m-0" style="font-size:1.5rem">INVOICE</label>
            <p class="p-0 m-0" style="font-size:1rem; line-height:1">Cetak Data Invoice barang</p>
            <hr style="height: 5px;background-color: #604d4d; margin:5px 0; opacity:1">
        </div>
        <br/>

        <div class="d-flex flex-wrap justify-content-between">
            <ul class="list-group">
                <h3>Data customer</h3>
                    <p class="col-sm-12">{{ $invoice->user->name }}</p>
                    <p class="col-sm-12">{{ $invoice->user->alamat }}</p>
                    <p class="col-sm-12"><span class="text-dark">{{ $invoice->user->email }}</span></p>
                    <p class="col-sm-12"><span class="text-dark px-1 ">{{ $invoice->user->no_telepon }}</span></p>
                    <p class="col-sm-12"><span class="fw-bold">{{ $invoice->created_at }}</span></p>
            </ul>
            <ul class="list-group">
                <h3>Data Penjual</h3>
                    <p class="col-sm-12">{{ $invoice->product->user->name }}</p>
                    <p class="col-sm-12">{{ $invoice->product->user->alamat }}</p>
                    <p class="col-sm-12"><span class="text-dark">{{ $invoice->product->user->email }}</span></p>
                    <p class="col-sm-12"><span class="text-dark px-1 ">{{ $invoice->product->user->no_telepon }}</span></p>
                    <p class="col-sm-12"><span class="fw-bold">Status : {{ $invoice->status }}</span></p>
            </ul>

        </div>


            <small class="title text-align-left">Dicetak : {{ date("l, M. d, Y.") . " Time : " . date("g:i a") }} </small>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Order</th>
                        <th>Product Name</th>
                        <th>Harga Satuan</th>
                        <th>Jml</th>
                        <th>Category</th>
                        <th>Tgl Kirim</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                        <tr> 
                            <td class="text-center">#{{ $invoice->id }}</td>
                            <td class="text-center">{{$invoice->product->title}}</td>
                            <td class="text-center">{{$invoice->product->priceText}}</td>
                            <td class="text-center">{{$invoice->qty}}</td>
                            <td class="text-center">{{$invoice->product->category->name}}</td>
                            <td class="text-center">{{$invoice->tgl_kirim}}</td>
                            <td class="text-center">{{$invoice->priceText}}</td>
                        </tr>
                </tbody>
            </table>

            <h1>Terimakasih atas pesanan anda.</h1>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  </body>
</html>