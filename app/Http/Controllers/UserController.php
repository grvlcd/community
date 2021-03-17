<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function update(ProfileRequest $request)
    {
        $user = $request->user();
        $user->fill($request->validated());
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        }
        if ($request->hasFile('image')) {
            if ($user->image != null) {
                Storage::disk('images')->delete($user->image->path);
                $user->image->delete();
            }
            $user->image()->create([
                'path' => $request->image->store('users', 'images'),
            ]);
        }
        if (isset($request->password) && $request->password != "") {
            $this->validate($request, [
                'password' => 'nullable|sometimes|required|confirmed|min:8',
            ]);
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->route('profile.edit');
    }

    public function edit()
    {
        return view('profile.edit');
    }
}
