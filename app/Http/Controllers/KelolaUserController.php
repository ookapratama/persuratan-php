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
        // $kelolaUser = User::with('level')->get();
        // $data = [
        //     'kelolauser' => $kelolaUser,
        // ];
        return view('v_user');
    }

    public function read() {
        $data = User::with('level')->get();
        return view('v_readuser')->with([
            'readUser' => $data
        ]);
    }
        
    public function PanggilData($id) {
        $edit = User::find($id);
        
        return response()->json([
            'dataUser' => $edit,
        ]);
    }

    public function add() {
        return view('v_adduser');
    }
    // public function EditUser() {
    //     return view('v_edituser');
    // }
    public function insert(Request $request) {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'level_id' => 'required',
            'jabatan' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('user')->with('pesan', 'User berhasil ditambah !');
    }

    public function edit() {
        
    }

    public function update(Request $request, $id) {

        $data = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email,'.$id,
            'password' => 'required|min:8|confirmed',
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

        return redirect()->route('user')->with('pesan', 'User berhasil di-update !');
    }

    public function delete($id) {
        $data = User::find($id);
        $data->delete();

        return redirect()->back()->with('pesan', 'User dihapus !');
    }
}


