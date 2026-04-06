<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    return view('form-page');
})->name('home');

Route::get('/sign-in', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }

    return view('auth-custom-login');
})->name('signin');

Route::post('/sign-in', function (Request $request) {
    $validated = $request->validate([
        'identifier' => ['required', 'string'],
        'password' => ['required', 'string'],
    ]);

    $identifier = trim($validated['identifier']);

    $user = filter_var($identifier, FILTER_VALIDATE_EMAIL)
        ? User::where('email', $identifier)->first()
        : User::where('login_id', strtoupper($identifier))->first();

    if (! $user || ! Hash::check($validated['password'], $user->password)) {
        return back()
            ->withErrors(['identifier' => 'These credentials do not match our records.'])
            ->onlyInput('identifier');
    }

    Auth::login($user, $request->boolean('remember'));
    $request->session()->regenerate();

    if ($user->must_change_password) {
        return redirect()->route('force.password');
    }

    return redirect()->route('dashboard');
})->name('signin.store');

Route::get('/login', function () {
    return redirect()->route('signin');
})->name('login');

Route::get('/register', function () {
    return redirect()->route('home');
})->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/application/form', function () {
    return redirect()->route('user.dashboard');
    })->middleware('role:user')->name('application.form');
    Route::get('/force-password', function () {
        return view('force-password');
    })->name('force.password');

    Route::post('/force-password', function (Request $request) {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->must_change_password = false;
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Password changed successfully.');
    })->name('force.password.store');

    Route::get('/dashboard', function () {
        if (auth()->user()->must_change_password) {
            return redirect()->route('force.password');
        }

        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard');
    })->name('dashboard');

    Route::get('/admin/dashboard', function () {
        if (auth()->user()->must_change_password) {
            return redirect()->route('force.password');
        }

        return view('admin.dashboard');
    })->middleware('role:admin')->name('admin.dashboard');

    Route::get('/user/dashboard', function () {
        if (auth()->user()->must_change_password) {
            return redirect()->route('force.password');
        }

        return view('user.dashboard');
    })->middleware('role:user')->name('user.dashboard');

    Route::get('/admin/submissions', function () {
        if (auth()->user()->must_change_password) {
            return redirect()->route('force.password');
        }

        $submissions = DB::table('applications')
            ->join('users', 'applications.user_id', '=', 'users.id')
            ->select(
                'applications.*',
                'users.name',
                'users.email',
                'users.login_id'
            )
            ->orderByDesc('applications.id')
            ->get();

        return view('admin.submissions', compact('submissions'));
    })->middleware('role:admin')->name('admin.submissions');
        Route::get('/change-password', function () {
            return view('change-password');
        })->name('password.change');

    Route::post('/change-password', function (Request $request) {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('dashboard')->with('success', 'Password changed successfully.');
        })->name('password.change.store');
    });

// Route::middleware(['auth'])->group(function () {
    
//     Route::get('/application/form', function () {
//     return redirect()->route('user.dashboard');
//     })->middleware('role:user')->name('application.form');

//     Route::get('/force-password', function () {
//         return view('force-password');
//     })->name('force.password');


//     Route::post('/force-password', function (Request $request) {
//         $request->validate([
//             'password' => ['required', 'string', 'min:8', 'confirmed'],
//         ]);

//         $user = auth()->user();
//         $user->password = Hash::make($request->password);
//         $user->must_change_password = false;
//         $user->save();

//         return redirect()->route('dashboard')->with('success', 'Password changed successfully.');
//     })->name('force.password.store');

//     Route::get('/dashboard', function () {
//         if (auth()->user()->role === 'admin') {
//             return redirect()->route('admin.dashboard');
//         }

//         return redirect()->route('user.dashboard');
//     })->name('dashboard');

//     Route::view('/admin/dashboard', 'admin.dashboard')
//         ->middleware('role:admin')
//         ->name('admin.dashboard');

//     Route::view('/user/dashboard', 'user.dashboard')
//         ->middleware('role:user')
//         ->name('user.dashboard');
// });

require __DIR__.'/settings.php';