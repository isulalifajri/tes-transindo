<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index($id){
        $title = 'Halaman Profile';
        $data = User::findOrFail($id);

        return view('page.profile.profile',compact(
           'title','data'
        ));
    }
    
    public function updateprofile(Request $request, $id){

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:250'],
            'email' => ['required', 'email', 'max:250', 'unique:users,email,'.$id],
            'no_telepon' => ['required','numeric'],
            'alamat' => ['required'],
            'description' => ['required'],
        ]);

        $user = User::find($id);
        $user->update($validatedData);
        return back()->with('success', 'Data Profile Berhasil di update');
    }

    public function updatepassword(Request $request, $id){
        $validatedData = $request->validate([
            'current_password' => ['required', 'min:3'],
            'password' => ['required', 'min:3', 'confirmed'],
        ]);

        $user = User::find($id);

        $password = $validatedData['current_password'];

        if (!Hash::check($password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'Password yang Anda masukkan salah.',
            ])->withInput(['current_password']);
        }


        $user->update($validatedData);
        return back()->with('success', 'Password Profile Berhasil di update');
    }
}
