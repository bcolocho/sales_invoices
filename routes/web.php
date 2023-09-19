<?php


use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::resource('/dashboard/customer', CustomerController::class);

Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');

Route::get('/customer/{customer}', [CustomerController::class, 'show'])->name('customer.show');

Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');



Route::resource('/dashboard/employee', EmployeeController::class);

Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');

Route::get('/employee/{employee}', [EmployeeController::class, 'show'])->name('employee.show');

Route::get('/employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');