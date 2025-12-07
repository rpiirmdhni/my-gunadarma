<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Courses;
use App\Models\Employee;
use App\Models\Courses_Schedule;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Major;
use App\Models\Classroom;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function indexManageCourse()
    {
        $courses = Courses::all();

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return view('admin.manage.course', compact('courses'));
    }

    public function storeManageCourse(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Courses::create([
            'name' => $request->name
        ]);

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.courses')->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    public function updateManageCourse(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $course = Courses::findOrFail($id);
        $course->update([
            'name' => $request->name
        ]);

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.courses')->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    public function destroyManageCourse(string $id)
    {
        $course = Courses::findOrFail($id);
        $course->delete();

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.courses')->with('success', 'Mata kuliah berhasil dihapus.');
    }

    public function indexManageCourseSchedule()
    {
        $courses = Courses::all();
        $course_schedule = Courses_Schedule::all();
        $classrooms = Classroom::all();
        $lecturers = Lecturer::all();

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return view('admin.manage.course-schedule', compact('courses', 'course_schedule', 'classrooms', 'lecturers'));
    }

    public function storeManageCourseSchedule(Request $request)
    {
        $request->validate([
            'classroom_id' => 'required',
            'course_id' => 'required',
            'day' => 'required',
            'course_time' => 'required',
            'lecturer_id' => 'required'
        ]);

        Courses_Schedule::create([
            'classroom_id' => $request->classroom_id,
            'course_id' => $request->course_id,
            'day' => $request->day,
            'course_time' => $request->course_time,
            'lecturer_id' => $request->lecturer_id
        ]);

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.courseschedule')->with('success', 'Jadwal mata kuliah berhasil ditambahkan.');
    }

    public function updateManageCourseSchedule(Request $request, string $id)
    {
        $request->validate([
            'classroom_id' => 'required',
            'course_id' => 'required',
            'day' => 'required',
            'course_time' => 'required',
            'lecturer_id' => 'required'
        ]);

        $course_schedule = Courses_Schedule::findOrFail($id);

        $course_schedule->update([
            'classroom_id' => $request->classroom_id,
            'course_id' => $request->course_id,
            'day' => $request->day,
            'course_time' => $request->course_time,
            'lecturer_id' => $request->lecturer_id
        ]);

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.courseschedule')->with('success', 'Jadwal mata kuliah berhasil diperbarui.');
    }

    public function destroyManageCourseSchedule(string $id)
    {
        $course_schedule = Courses_Schedule::findOrFail($id);
        $course_schedule->delete();

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.courseschedule')->with('success', 'Mata kuliah berhasil dihapus.');
    }

    public function indexManageMajors()
    {
        $majors = Major::all();

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return view('admin.manage.major', compact('majors'));
    }

    public function storeManageMajors(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Major::create([
            'name' => $request->name
        ]);

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.majors')->with('success', 'Jurusan berhasil ditambahkan.');
    }

    public function updateManageMajors(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $majors = Major::findOrFail($id);
        $majors->update([
            'name' => $request->name
        ]);

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.majors')->with('success', 'Jurusan berhasil diperbarui.');
    }

    public function destroyManageMajors(string $id)
    {
        $majors = Major::findOrFail($id);
        $majors->delete();

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.majors')->with('success', 'Jurusan berhasil dihapus.');
    }

    public function indexManageClassroom()
    {
        $classrooms = Classroom::all();

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return view('admin.manage.classroom', compact('classrooms'));
    }

    public function storeManageClassroom(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Classroom::create([
            'name' => $request->name
        ]);

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.classrooms')->with('success', 'Ruang Kelas berhasil ditambahkan.');
    }

    public function updateManageClassroom(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $classrooms = Classroom::findOrFail($id);
        $classrooms->update([
            'name' => $request->name
        ]);

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.classrooms')->with('success', 'Ruang Kelas berhasil diperbarui.');
    }

    public function destroyManageClassroom(string $id)
    {
        $classrooms = Classroom::findOrFail($id);
        $classrooms->delete();

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.courses')->with('success', 'Ruang Kelas berhasil dihapus.');
    }

    public function indexManageStudent()
    {
        $students = Student::with(['major', 'classroom'])->get();
        $classrooms = Classroom::all();
        $majors = Major::all();

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return view('admin.manage.student', compact('students', 'classrooms', 'majors'));
    }

    public function storeManageStudent(Request $request)
    {
        $request->validate([
            'npm' => 'required|unique:students,npm',
            'fullname' => 'required',
            'major_id' => 'required',
            'classroom_id' => 'required'
        ]);

        Student::create([
            'npm' => $request->npm,
            'fullname' => $request->fullname,
            'major_id' => $request->major_id,
            'classroom_id' => $request->classroom_id
        ]);

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.students')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function updateManageStudent(Request $request, string $id)
    {
        $request->validate([
            'fullname' => 'required',
            'major_id' => 'required',
            'classroom_id' => 'required'
        ]);

        $students = Student::where('npm', $id)->firstOrFail();

        $students->update([
            'npm' => $students->npm,
            'fullname' => $request->fullname,
            'major_id' => $request->major_id,
            'classroom_id' => $request->classroom_id
        ]);

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.students')->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    public function destroyManageStudent(string $id)
    {
        $students = Student::where('npm', $id)->firstOrFail();
        $students->delete();

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.students')->with('success', 'Mahasiswa berhasil dihapus.');
    }

    public function indexManageLecturer()
    {
        $lecturers = Lecturer::all();

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return view('admin.manage.lecturer', compact('lecturers'));
    }

    public function storeManageLecturer(Request $request)
    {
        $request->validate([
            'nidn' => 'required',
            'fullname' => 'required'
        ]);

        Lecturer::create([
            'nidn' => $request->nidn,
            'fullname' => $request->fullname
        ]);

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.lecturers')->with('success', 'Dosen berhasil ditambahkan.');
    }

    public function updateManageLecturer(Request $request, string $id)
    {
        $request->validate([
            'nidn' => 'required',
            'fullname' => 'required'
        ]);

        $lecturer = Lecturer::where('nidn', $id)->firstOrFail();

        $lecturer->update([
            'nidn' => $request->nidn,
            'fullname' => $request->fullname
        ]);

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.lecturers')->with('success', 'Dosen berhasil diperbarui.');
    }

    public function destroyManageLecturer(string $id)
    {
        $lecturer = Lecturer::where('nidn', $id)->firstOrFail();
        $lecturer->delete();

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.lecturers')->with('success', 'Dosen berhasil dihapus.');
    }

    public function indexManageEmployee()
    {
        $employees = Employee::all();

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return view('admin.manage.employee', compact('employees'));
    }

    public function storeManageEmployee(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'fullname' => 'required'
        ]);

        Employee::create([
            'nip' => $request->nip,
            'fullname' => $request->fullname
        ]);

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.employees')->with('success', 'Karyawan berhasil ditambahkan.');
    }

    public function updateManageEmployee(Request $request, string $id)
    {
        $request->validate([
            'nip' => 'required',
            'fullname' => 'required'
        ]);

        $employees = Employee::where('nip', $id)->firstOrFail();

        $employees->update([
            'nip' => $request->nip,
            'fullname' => $request->fullname
        ]);

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.employees')->with('success', 'Karyawan berhasil diperbarui.');
    }

    public function destroyManageEmployee(string $id)
    {
        $employees = Employee::where('nip', $id)->firstOrFail();
        $employees->delete();

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.employees')->with('success', 'Karyawan berhasil dihapus.');
    }

    public function indexManageUser()
    {
        $users = User::all();
        $students = Student::all();
        $lecturers = Lecturer::all();
        $employees = Employee::all();

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return view('admin.manage.user', compact('users', 'students', 'lecturers', 'employees'));
    }

    public function storeManageUser(Request $request)
    {
        $request->validate([
            'username' => ['required', 'max:255', 'unique:users,username'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $username = $request->username;
        $fullname = null;
        $role = null;

        // Cek di tabel students
        $student = Student::where('npm', $username)->first();
        if ($student) {
            $fullname = $student->fullname;
            $role = 4;
        }

        // Cek di tabel lecturers
        $lecturer = Lecturer::where('nidn', $username)->first();
        if ($lecturer) {
            $fullname = $lecturer->fullname;
            $role = 3;
        }

        // Cek di tabel employees
        $employee = Employee::where('nip', $username)->first();
        if ($employee) {
            $fullname = $employee->fullname;
            $role = 2;
        }

        // Kalau gak ketemu di ketiga tabel
        if (!($student || $lecturer || $employee)) {
            return redirect()->back()->with('error', 'Data tidak ditemukan di data mahasiswa, dosen, atau karyawan.');
        }

        User::create([
            'name' => $fullname,
            'username' => $username,
            'role' => $role,
            'password' => Hash::make($request->password),
        ]);

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.users')->with('success', 'User berhasil ditambahkan.');
    }

    public function updateManageUser(Request $request, string $id)
    {
        $request->validate([
            'role' => 'required',
            'password' => 'nullable|min:8'
        ]);

        $users = User::findOrFail($id);

        $users->update([
            'name' => $users->name,
            'role' => $request->role,
            'username' => $users->username,
            'password' => $request->password ? Hash::make($request->password) : $users->password,
        ]);

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.users')->with('success', 'User berhasil diperbarui.');
    }

    public function destroyManageUser(string $id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        if (Auth::user()->role != 0) {
            return abort(404);
        }

        return redirect()->route('admin.manage.users')->with('success', 'User berhasil dihapus.');
    }
}
