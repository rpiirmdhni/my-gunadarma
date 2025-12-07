<?php

namespace App\Http\Controllers;

use App\Models\attendances;
use App\Models\Courses_Schedule;
use App\Models\Classroom;
use App\Models\Courses;
use App\Models\Student;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lectureId = Auth::user()->username;

        $today = now()->dayOfWeek;

        $schedules = Courses_Schedule::where('lecturer_id', $lectureId)
            ->where('day', $today)
            ->with(['classroom', 'course'])
            ->get();

        $classroomIds = $schedules->pluck('classroom_id')->unique();

        $students = Student::whereIn('classroom_id', $classroomIds)
            ->get();

        $attendanceIds = $schedules->pluck('id');

        $attendances = attendances::whereIn('courseschedule_id', $attendanceIds)
            ->whereDate('created_at', now()->toDateString())
            ->get();

        $userIds = $attendances->pluck('user_id')->unique()->toArray();

        $usersMap = User::whereIn('id', $userIds)
            ->get()
            ->keyBy('id');

        $npmKeys = $usersMap->pluck('username')->unique()->toArray();

        $studentsMap = Student::whereIn('npm', $npmKeys)
            ->with('classroom')
            ->get()
            ->keyBy('npm');

        $attendances = $attendances->map(function ($att) use ($usersMap, $studentsMap) {

            $user = $usersMap->get($att->user_id);

            $student = $user ? $studentsMap->get($user->username) : null;

            $att->user = $user ?? (object)['username' => 'N/A'];

            if ($student) {
                $att->user->student = $student;
            } else {
                $att->user->student = (object)['npm' => 'N/A', 'fullname' => 'Mahasiswa Tidak Ditemukan', 'classroom' => (object)['name' => 'N/A']];
            }

            return $att;
        });

        if (Auth::user()->role != 2) {
            return abort(404);
        }

        return view('lecturer.attendances.manage', compact(
            'schedules',
            'students',
            'attendances',
            'today'
        ));
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
    public function store(Request $request)
    {
        $request->validate([
            'courseschedule_id' => 'required',
            'student_id' => 'required',
        ]);

        $schedule = Courses_Schedule::find($request->courseschedule_id);

        if (!$schedule) {
            return back()->with('error', 'Jadwal tidak ditemukan.');
        }

        // check hari
        $today = now()->dayOfWeek;
        if ($schedule->day != $today) {
            return back()->with('error', 'Tidak bisa membuat QR untuk jadwal yang bukan hari ini.');
        }

        // cek mahasiswa
        $student = Student::where('npm', $request->student_id)->first();

        if (!$student) {
            return back()->with('error', 'Mahasiswa tidak ditemukan.');
        }

        // cari user berdasarkan npm student
        $user = User::where('username', $student->npm)->first();

        if (!$user) {
            return back()->with('error', 'User tidak ditemukan.');
        }

        // ambil id user
        $userId = $user->id;

        // generate QR
        $attendanceId = Str::uuid()->toString();

        attendances::create([
            'id' => $attendanceId,
            'user_id' => $userId,
            'courseschedule_id' => $request->courseschedule_id,
            'status' => '0'
        ]);

        if (Auth::user()->role != 2) {
            return abort(404);
        }

        return back()->with('success', 'QR absensi berhasil dibuat!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uuid)
    {
        $username = Auth::user()->username;

        // cek apakah user ini mahasiswa
        $student = Student::where('npm', $username)->first();
        if (!$student) {
            return redirect('/dashboard')->with('error', 'Hanya mahasiswa yang bisa absen.');
        }

        // cari user_id dari npm mahasiswa
        $user = User::where('username', $student->npm)->first();
        if (!$user) {
            return redirect('/dashboard')->with('error', 'User tidak ditemukan.');
        }

        // cari attendance berdasarkan UUID dari URL
        $attendance = attendances::where('id', $uuid)->first();
        if (!$attendance) {
            return redirect('/dashboard')->with('error', 'QR tidak valid.');
        }

        // pastikan mahasiswa yang scan = mahasiswa QR
        if ($attendance->user_id != $user->id) {
            return redirect('/dashboard')->with('error', 'QR ini bukan milik kamu.');
        }

        // ubah status jadi hadir
        $attendance->status = '1';
        $attendance->save();

        if (Auth::user()->role != 2) {
            return abort(404);
        }

        return redirect('/dashboard')->with('success', 'Absensi berhasil dicatat!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($uuid)
    {
        // cari attendance berdasarkan UUID dari URL
        $attendance = attendances::where('id', $uuid)->first();
        if (!$attendance) {
            return redirect('/dashboard')->with('error', 'QR tidak valid.');
        }

        $attendance->delete();

        if (Auth::user()->role != 2) {
            return abort(404);
        }

        return back()->with('success', 'Absensi berhasil dihapus!');
    }
}
