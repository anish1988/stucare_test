<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CompanyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('index');
}); */

Route::get('/', [EmployeeController::class, 'index']);
Route::post('/emp/store', [EmployeeController::class, 'store'])->name('emp/store');
Route::get('/emp/fetchall', [EmployeeController::class, 'fetchAll'])->name('emp/fetchAll');
Route::delete('/emp/delete', [EmployeeController::class, 'delete'])->name('emp/delete');
Route::get('/emp/edit', [EmployeeController::class, 'edit'])->name('emp/edit');
Route::post('/emp/update', [EmployeeController::class, 'update'])->name('emp/update');



Route::post('/store', [CompanyController::class, 'store'])->name('store');
Route::get('/fetchall', [CompanyController::class, 'fetchAll'])->name('fetchAll');
Route::delete('/delete', [CompanyController::class, 'delete'])->name('delete');
Route::get('/edit', [CompanyController::class, 'edit'])->name('edit');
Route::get('comp_update', [CompanyController::class,'comp_update'])->name('comp_update');
//Route::post('/compupdate', [CompanyController::class, 'compupdate'])->name('compupdate');