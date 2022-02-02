<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as User;
use Exception;
// use Illuminate\Support\Facades\Hash;

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
        dd($request->all());
        $response = array();

        try{
            $user = new User();
            $user->name = request()->name;
            $user->email = request()->email;
            $user->jabatan = request()->jabatan;
            $user->password = bcrypt(request()->password);
            $user->level_id = request()->level_id;
            $user->save();

            $response['status'] = '200';
            $response['message'] = 'User berhasil ditambahkan !';

        }catch(Exception $e) {
            // $response['status'] = '500';
            // $response['message'] = 'User gagal ditambahkan !';

            $response['status'] = '500';
            $response['message'] = $e->getMessage();
        }

        echo json_encode($response);

        // $validatedData = $request->validate([
        //     'name' => 'required|max:255',
        //     'email' => 'required|unique:users',
        //     'password' => 'required|min:8',
        //     'level_id' => 'required',
        //     'jabatan' => 'required',
        // ]);

        // $validatedData['password'] = Hash::make($validatedData['password']);

        // User::create($validatedData);

        // return redirect()->route('user')->with('pesan', 'User berhasil ditambah !');
    }

    // public function edit($id) {
    //     $data = User::findOrFail($id);
    //     return view('vUser.edit')->with([
    //         'edit' => $data
    //     ]);
    // }

    // public function update(Request $request, $id) {

    //     $data = User::findOrFail($id);

    //     $validatedData = $request->validate([
    //         'name' => 'required|max:255',
    //         'email' => 'required|unique:users,email,'.$id,
    //         'password' => 'required|min:8|confirmed',
    //         'level_id' => 'required',
    //         'jabatan' => 'required',
    //     ]);

    //     $validatedData['password'] = Hash::make($validatedData['password']);

    //     $data->name = $request->get('name');
    //     $data->email = $request->get('email');
    //     $data->password = $validatedData['password'];
    //     $data->level_id = $request->get('level_id');
    //     $data->jabatan = $request->get('jabatan');
    //     $data->save();
    //     // User::updateOrCreate($validatedData);

    //     // return redirect()->route('user')->with('pesan', 'User berhasil di-update !');
    // }

    // public function delete($id) {
    //     $data = User::findOrFail($id);
    //     $data->delete();

    //     // return redirect()->back()->with('pesan', 'User dihapus !');
    // }
}


