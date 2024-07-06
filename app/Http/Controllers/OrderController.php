<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $title = 'Data Pemesanan Produk saya';

        $data = Order::whereHas('product', function ($query) {
            $query->where('user_id', auth()->id());
        })->paginate(10);

        return view('page.order.order', compact('title', 'data'));
    }
    public function checkout(Request $request){
        $validatedData = $request->validate([
            'qty' => ['required'],
            'tgl_kirim' => ['required'],
            'product_id' => ['required', 'exists:products,id']
        ]);

        $get = Product::findOrFail($validatedData['product_id']);

        $validatedData['total'] = $get->price * $validatedData['qty']; 
        $validatedData['user_id'] = auth()->user()->id;

        Order::create($validatedData);

        $successMessage = 'Pesanan anda berhasil dibuat. Silakan cek di halaman ini untuk status pesanan anda: <a href="' . route('order.pesanan') . '">Status Pesanan</a>';

        return back()->with('success-action', $successMessage);
    }

    public function pesanan(){
        $title = 'Data Pesanan';
        $orders = Order::where('user_id', auth()->user()->id)->paginate(10);

        return view('page.order.myorder', compact(
            'orders','title'
        ));
    }

    public function updateStatus(Request $request, $id){
        $item = Order::find($id);
        $item->status = $request->input('status');
        $item->save();
    
        return redirect()->back()->with('success', 'Status updated successfully');
    }

    public function cetak ($id){
        $title = 'Cetak Invoice';
        $invoice = Order::findOrFail($id);

        return view('page.order.cetak',compact(
            'invoice','title'
        ));
    }
}
