<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
public function edit(Request $request)
{
return view('profile.edit', [
'user' => $request->user(),
]);
}

public function update(Request $request)
{
$request->validate([
'name' => ['required', 'string', 'max:255'],
'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $request->user()->id],
]);

$request->user()->update([
'name' => $request->name,
'email' => $request->email,
]);

return redirect()->route('profile.edit')->with('status', 'profile-updated');
}

public function destroy(Request $request)
{
$request->validate([
'password' => ['required', 'current_password'],
]);

$user = $request->user();
$user->delete();

return redirect('/')->with('status', 'account-deleted');
}
}
