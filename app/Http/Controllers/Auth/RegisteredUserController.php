<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Log;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'max:255', 'unique:users,username'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $username = $request->username;
        $fullname = null;
        $role = null;

        // Cek di tabel students
        $student = DB::table('students')->where('npm', $username)->first();
        if ($student) {
            $fullname = $student->fullname;
            $role = 4;
        }

        // Cek di tabel lecturers
        $lecturer = DB::table('lecturers')->where('nidn', $username)->first();
        if ($lecturer) {
            $fullname = $lecturer->fullname;
            $role = 3;
        }

        // Cek di tabel employees
        $employee = DB::table('employees')->where('nip', $username)->first();
        if ($employee) {
            $fullname = $employee->fullname;
            $role = 2;
        }

        // Kalau gak ketemu di ketiga tabel
        if (!($student || $lecturer || $employee)) {
            Log::create([
                'ip' => $request->ip(),
                'event' => 'ActivationUser',
                'desc' => 'Failed: Data ('.$username.') not found in the database'
            ]);
            return redirect()->back()->with('error', 'Data tidak ditemukan di data mahasiswa, dosen, atau karyawan.');
        }
        
        // Simpan ke tabel users
        $user = User::create([
            'name' => $fullname,
            'username' => $username,
            'role' => $role,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        if($user){
            Log::create([
                'ip' => $request->ip(),
                'event' => 'ActivationUser',
                'desc' => 'Success: Data ('.$username.') has been successfully registered in the database'
            ]);
        }

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
