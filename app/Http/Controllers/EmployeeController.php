<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

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
            'email' => 'required|email|unique:employees',
            'nomor_telepon' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'tanggal_masuk' => 'required|date',
            'status' => 'required',
        ]);

        Employee::create($validated);
        return redirect()->route('employees.index')->with('success', 'Pegawai berhasil ditambahkan.');
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
        $employee = Employee::findOrFail($id); // ← tambahkan ini

        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|email|unique:employees,email,' . $id,
            'nomor_telepon' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'tanggal_masuk' => 'required|date',
            'status' => 'required',
        ]);

        $employee->update($validated);
        return redirect()->route('employees.index')->with('success', 'Data pegawai diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id); // ← tambahkan ini

        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Pegawai dihapus.');
    }

}
