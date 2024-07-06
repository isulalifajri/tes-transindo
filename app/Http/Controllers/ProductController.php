<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(){
        $products = Product::where('user_id',auth()->user()->id)->orderBy('created_at', 'DESC')->paginate(5);
        $title = 'Halaman Data Product';
        return view('page.product.index', compact(
            'products', 'title'
        ));
    }

    public function create(){
        $title = 'Pages Create Products';
        $data = new Product();
        $categories = Category::all();
        return view('page.product.create', compact(
            'title', 'data','categories'
        ));
    }

    public function store(Request $request){
        $rules = [
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => ['required','image','file']
        ];

      
        
        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->id();
        $validatedData['price'] = str_replace('.','',$request->price);

        $dt = date('Y-m-d_His_a');

        if($request->file('image')){
            $names =  implode("",array_slice(explode(" ", $request->title),0 , 2)); // 2 dalam explode di gunakan untuk mengambail 2 kata pertama dalam request name
            $extension = $request->file('image')->extension();
            $nama_file = $names . "_" . $dt . "." . $extension;

            $request->file('image')->move('assets/images/products', $nama_file); //this for move to directory file with original name
            $validatedData['image'] = $nama_file; //this for create name images in database
        }


        Product::create($validatedData);

        return redirect('product')->with('success', 'Product Baru Berhasil di tambahkan');
    }

    public function edit($id){
        $data = Product::find($id);
        $title = 'Edit Product';
        $categories = Category::all();

        return view('page.product.edit', compact(
            'title', 'data','categories'
        ));
    }

    public function update(Request $request, $id){
        $data = Product::find($id);
        $rules = [
            'title' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => ['image','file'],
        ];

        $dt = date('Y-m-d_His_a');

        $validatedData = $request->validate($rules);
        
        $validatedData['price'] = str_replace('.','',$request->price);




        if($request->file('image')){
            if($data->image){
                File::delete('assets/images/products/'.$data->image);
                $data->images = $request->file('image')->getClientOriginalName();
            }
            $names =  implode("",array_slice(explode(" ", $request->title),0 , 2)); // 2 dalam explode di gunakan untuk mengambail 2 kata pertama dalam request name
            $extension = $request->file('image')->extension();
            $nama_file = $names . "_" . $dt . "." . $extension;

            $request->file('image')->move('assets/images/products', $nama_file); //this for move to directory file with original name
            $validatedData['image'] = $nama_file; //this for create name images in database
        }


        Product::find($data->id)->update($validatedData);
       
        return redirect('product')->with('success', "Data Updated Successfully");
    }

    public function destroy($id){
        $data = Product::find($id);

        File:: delete('assets/images/products/'.$data->image);

        $data->destroy($data->id); 
        return redirect('product')->with('success-danger', "Data Deleted Successfully");
    }
}
