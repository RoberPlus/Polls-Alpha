<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $user_coop_id = auth()->user()->coop_id;
        $users = User::where('coop_id', $user_coop_id)->paginate(5);

        return view('admin.user', ['users' => $users]);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Se ha eliminado el usuario con exito!');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'status' => 'required',
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->status = $data['status'];
        $user->role = $data['role'];

        $user->save();

        return redirect()->back()->with('success', 'Se ha modificado el usuario con exito!'); 
    }
}
