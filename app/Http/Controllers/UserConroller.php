<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use App\Http\Requests\UserValidation;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserOtpMail;


class UserConroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search', null);
        $users = User::paginate(5);

        if ($search) {
            $users = User::where('username', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')->paginate(5);
        }
        return view('list', compact('users', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserValidation $request)
    {
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('user.create')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('user.index')->with('success', 'User deleted successfully.');
        }
    }

    public function sendOtp(string $id)
    {
        $user = User::find($id);
        $data = [
            'id' => $user->id,
            'otp' => rand(100000, 999999),
            'username' => $user->username,
        ];

        dispatch(new \App\Jobs\jobs($data));

        // Mail::to($user->email)->send(new UserOtpMail($data));

        return redirect()->route('user.index')->with('success', 'Mail sent successfully.');
    }
}
