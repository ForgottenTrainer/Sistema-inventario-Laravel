<?php

use App\Http\Controllers\AlquilerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\Dashboard;

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
    return view('app');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/panel-control', [Dashboard::class, 'index'])->name('dash.index');
    Route::get('/productos', function () {
        return view('admin.producto.index');
    })->name('inv.index');
    Route::get('/agregar-productos', [TaskController::class, 'index'])->name('producto.index');
    Route::post('/agregar-productos', [TaskController::class, 'store'])->name('producto.store');
    Route::get('/actualizar-productos/{id}', [TaskController::class, 'show'])->name('producto.show');
    Route::put('/actualizar-productos/{id}', [TaskController::class, 'update'])->name('producto.update');
    Route::delete('/eliminar-producto/{id}', [TaskController::class, 'delete'])->name('producto.delete');
    
    //Sección de areas

    Route::get('/areas', [AreasController::class, 'index'])->name('areas.index');
    Route::get('/agregar-area', [AreasController::class, 'show'])->name('areas.show');
    Route::get('/editar-area/{id}', [AreasController::class, 'edit'])->name('area.edit');
    Route::put('/editar-area/{id}', [AreasController::class, 'update'])->name('area.update');
    //Route::delete('/delete-area/{id}', [AreasController::class, 'delete'])->name('area.delete');

    //Trabajador

    //Sección prestamos
    Route::get('alquiler', [AlquilerController::class, 'index'])->name('alquiler.index');
    Route::get('alquiler-formulario', [AlquilerController::class, 'show'])->name('alquiler.show');
    Route::get('alquiler/ver-mas/{id}', [AlquilerController::class, 'edit'])->name('alquiler.edit');
    Route::post('alquiler/ver-mas/{id}', [AlquilerController::class, 'update'])->name('alquiler.update');
    Route::post('alquiler/cancel/{id}', [AlquilerController::class, 'cancel'])->name('alquiler.cancel');
    Route::post('alquiler/activar/{id}', [AlquilerController::class, 'activar'])->name('alquiler.active');
    Route::get('alquiler/editar/{id}', [AlquilerController::class, 'edicion'])->name('edit.alquiler');
    Route::put('alquiler/editar-alquiler/{id}', [AlquilerController::class, 'actualizar'])->name('update.alquiler');
    //Sección contratos

    //URL para el PDF & excel
    Route::get('/productos/pdf', [TaskController::class, 'pdf'])->name('producto.pdf');
    Route::get('/productos/excel', [TaskController::class, 'excel'])->name('producto.excel');
    Route::get('/areas/pdf', [AreasController::class, 'pdf'])->name('areas.pdf');
    Route::get('/areas/excel', [AreasController::class, 'excel'])->name('areas.excel');
    Route::get('/alquiler/pdf/{id}', [AlquilerController::class, 'pdf'])->name('alquiler.pdf');

});

require __DIR__.'/auth.php';
