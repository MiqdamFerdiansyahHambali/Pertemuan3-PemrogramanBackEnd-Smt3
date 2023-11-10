<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::all();

        if (!empty($student)) {
            $response = [
                'message' => 'Menampilkan data semua student',
                'data' => $student,
            ];
            return response()->json($response, 200);
        } else {
            $error = ['massage' => 'Tidak ada data'];
            return response()->json($error, 404);
        }
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
        $validateData = $request->validate([
            'nama' => 'required|max:30',
            'nim' => 'required|numeric',
            'email' => 'required|max:24',
            'jurusan' => 'required|max:30',
        ]);

        $student = Student::create($validateData);

        $response = [
            'message' => 'Data Student Berhasil Dibuat',
            'data' => $student,
        ];

        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            $error = ['message' => 'Data student tidak ditemukan'];

            return response()->json($error, 404);
        } else {
            $response = [
                'message' => 'Menampilkan data student',
                'data' => $student,
            ];

            return response()->json($response, 200);
        }
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
        $student = Student::find($id);

        if (!$student) {
            $error = ['message' => 'Data student tidak ditemukan'];

            return response()->json($error, 404);
        } else {
            $validateData = $request->validate([
                'nama' => 'required|max:30',
                'nim' => 'required|numeric',
                'email' => 'required|email|max:24',
                'jurusan' => 'required|max:30',
            ]);

            $input = [
                'nama' => $validateData['nama'] ?? $student->nama,
                'nim' => $validateData['nim'] ?? $student->nim,
                'email' => $validateData['email'] ?? $student->email,
                'jurusan' => $validateData['jurusan'] ?? $student->jurusan,
            ];

            $student->update($input);

            $response = [
                'message' => 'Data student Berhasil Diubah',
                'data' => $student,
            ];
            return response()->json($response, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            $error = ['message' => 'Data student tidak ditemukan'];
            return response()->json($error, 404);
        } else {
            $student->delete();

            $response = [
                'message' => ' Data student berhasil di hapus',
                'data' => $student,
            ];
            return response()->json($response, 200);
        }
    }
}
