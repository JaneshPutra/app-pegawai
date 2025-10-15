<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employee.index', compact('employees'));
    }


    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:employees,email',
            'nomor_telepon' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'tanggal_masuk' => 'required|date',
            'status' => 'required',
        ]);

        Employee::create($validated);

        Alert::toast('Data Berhasil ditambahkan!!', 'success');
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.show', compact('employee'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $employee = Employee::findOrFail($id); // pastikan $id adalah kolom yang dipakai di DB

        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('employees', 'email')->ignore($id, 'id'), // ganti 'id' jika perlu
            ],
            'nomor_telepon' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'tanggal_masuk' => 'required|date',
            'status' => 'required',
        ]);

        $employee->update($validated);

        Alert::toast('Data Berhasil Diperbarui!!', 'success');
        return redirect()->route('employees.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id); // ← tambahkan ini

        $employee->delete();
        Alert::toast('Data Berhasil dihapus!!', 'success');
        return redirect()->route('employees.index');
    }

}
