<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Payment;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    // public function index()
    // {
    //     $employees = Employee::with('transactions')->get();

    //     $unpaidSalaries = $employees->map(function ($employee) {
    //         $totalHours = $employee->transactions->sum('hours_worked');
    //         $totalSalary = $totalHours * $employee->hourly_rate;

    //         $paidAmount = Payment::where('employee_id', $employee->id)->sum('amount');

    //         $unpaidSalary = $totalSalary - $paidAmount;

    //         return [
    //             'employee_id' => $employee->id,
    //             'unpaid_salary' => $unpaidSalary,
    //         ];
    //     });

    //     return response()->json($unpaidSalaries);
    // }
    public function index()
{
    $payments = Employee::with(['transactions' => function($query) {
        $query->where('paid', false);
    }])->get()->map(function($employee) {
        return [
            'employee_id' => $employee->id,
            'unpaid_salary' => $employee->transactions->sum(function($transaction) use ($employee) {
                return $transaction->hours_worked * $employee->hourly_rate;
            })
        ];
    });

    return response()->json($payments);
}

public function pay()
{
    $transactions = Transaction::where('paid', false)->get();
    $transactions->each(function($transaction) {
        $transaction->update(['paid' => true]);
    });

    return response()->json(['message' => 'All payments processed successfully']);
}

    
}