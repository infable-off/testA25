<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{

    public function store(Request $request)
{
    $request->validate([
        'employee_id' => 'required|exists:employees,id',
        'date' => 'required|date',
        'hours_worked' => 'required|numeric|min:0',
    ]);

    $transaction = Transaction::create($request->all());

    return response()->json(['message' => 'Transaction created successfully', 'transaction' => $transaction], 201);
}
}