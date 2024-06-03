<?php


namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        // return Employee::all();
        return response()->json(Employee::all());
    }

    

    public function store(Request $request)
{
    $request->validate([
        'email' => 'required|string|email|max:255|unique:employees',
        'password' => 'required|string|min:8',
        'hourly_rate' => 'required|numeric|min:0',
    ]);

    $employee = Employee::create([
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'hourly_rate' => $request->hourly_rate,
    ]);

    return response()->json(['message' => 'Employee created successfully', 'employee' => $employee], 201);
}

    public function show($id)
    {
        return Employee::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'hourly_rate' => 'sometimes|required|numeric|min:0',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return response()->json($employee, 200);
    }

    public function destroy($id)
    {
        Employee::destroy($id);

        return response()->noContent();
    }
}