<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;
use Illuminate\Support\Facades\Hash;

class KelolaUserController extends Controller
{
    public function __construct() {
        $this->User = new User();
        $this->middleware('auth');
    }

    
    public function index() {
        $kelolaUser = User::with('level')->get();
        $data = [
            'kelolauser' => $kelolaUser,
        ];
        return view('vUser.index', $data);
    }

    public function add() {
        return view('vUser.create');
    }

    public function insert(Request $request) {
        
        $notif = array(
            'pesan' => 'User berhasil ditambah !',
            'alert' => 'success',
        );

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'level_id' => 'required',
            'jabatan' => 'required',
        ]);
       
        $user = new User();

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->jabatan = $request->get('jabatan');
        $user->password = bcrypt($request->get('password'));
        $user->level_id = $request->get('level_id');
        $user->save();

        return redirect()->route('user')->with($notif);
    }

    public function edit($id) {
        $data = User::findOrFail($id);
        return view('vUser.edit')->with([
            'edit' => $data
        ]);
    }

    public function update(Request $request, $id) {

        $notif = array(
            'pesan' => 'User berhasil di-Update !',
            'alert' => 'success',
        );

        $data = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email,'.$id,
            'password' => 'required|min:6|confirmed',
            'level_id' => 'required',
            'jabatan' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $data->name = $request->get('name');
        $data->email = $request->get('email');
        $data->password = $validatedData['password'];
        $data->level_id = $request->get('level_id');
        $data->jabatan = $request->get('jabatan');
        $data->save();

        return redirect()->route('user')->with($notif);
    }

    public function delete($id) {

        $notif = array(
            'pesan' => 'User berhasil di-Hapus !',
            'alert' => 'success',
        );

        $data = User::findOrFail($id);
        $data->delete();

        return redirect()->back()->with($notif);
    }
}


