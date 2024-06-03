<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Testing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">API Testing Interface</h1>

        <!-- Create Employee Form -->
        <div class="mb-4">
            <h2 class="text-xl font-bold">Create Employee</h2>
            <form method="POST" action="{{ route('test.employees.store') }}" class="bg-white p-4 rounded shadow-md">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">Email:</label>
                    <input type="email" name="email" class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Password:</label>
                    <input type="password" name="password" class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Hourly Rate:</label>
                    <input type="number" name="hourly_rate" step="0.01" class="w-full p-2 border rounded">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Employee</button>
            </form>
        </div>

        <!-- Create Transaction Form -->
        <div class="mb-4">
            <h2 class="text-xl font-bold">Create Transaction</h2>
            <form method="POST" action="{{ route('test.transactions.store') }}" class="bg-white p-4 rounded shadow-md">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">Employee ID:</label>
                    <input type="number" name="employee_id" class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Date:</label>
                    <input type="date" name="date" class="w-full p-2 border rounded">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Hours Worked:</label>
                    <input type="number" name="hours_worked" step="0.01" class="w-full p-2 border rounded">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Transaction</button>
            </form>
        </div>

        <!-- Get Payments -->
        <div class="mb-4">
            <h2 class="text-xl font-bold">Get Payments</h2>
            <form method="GET" action="{{ route('test.payments.index') }}" class="bg-white p-4 rounded shadow-md">
                @csrf
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Get Payments</button>
            </form>
        </div>

        <!-- Pay All -->
        <div class="mb-4">
            <h2 class="text-xl font-bold">Pay All</h2>
            <form method="POST" action="{{ route('test.payments.pay') }}" class="bg-white p-4 rounded shadow-md">
                @csrf
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Pay All</button>
            </form>
        </div>
    </div>
</body>
</html>