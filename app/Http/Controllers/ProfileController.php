<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Product;
use app\Models\Facture;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function logins() {
        if (Auth::check()) {
            if (Auth::user()->type === 'admin') {
                $users = User::all();
                $products = Product::all();
                return view('dashboard', compact('users','products'));
            } elseif (Auth::user()->type === 'supplier') {
                return redirect()->route('supplier');
            }
        }
        return redirect()->route('login'); // Redirect if not authenticated or incorrect type
    }
    
    public function supplier() {
        if (Auth::check() && Auth::user()->type === 'supplier') {
            $users = User::all();
            $products = Product::all(); // Or any relevant data for suppliers
            return view('supplier', compact('users','products'));
        }
        return redirect()->route('login'); // Redirect if not authenticated or incorrect type
    }
    
    
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
