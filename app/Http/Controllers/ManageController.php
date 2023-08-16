<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManageController extends Controller
{
    public function index()
    {
        $users= User::all();
        return view('manage', ['users' => $users]);
    }

    public function delete($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('manage')->with('success', 'User deleted successfully.');
        } else {
            return redirect()->route('manage')->with('error', 'User not found.');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'new-password' => 'nullable',
            'role' => 'required',
            'phone' =>'required'
        ]);

        $user = User::find($id);

        if ($user) {
            $user->name = $validatedData['username'];

            if ($validatedData['new-password']) {
                $user->password = Hash::make($validatedData['new-password']);
            }

            $user->role = $validatedData['role'];
            $user->phone = $validatedData['phone'];
            $user->save();
            return response()->json(['message' => 'User updated successfully'], 200);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        if (empty($searchTerm)) {
            $users = User::whereIn('role', 'user','admin')->get();
        } else {
            $users = User::where('role', 'user')->where('name', 'like', '%' . $searchTerm . '%')->get();
        }

        return view('manage')->with('users', $users);
    }
} 