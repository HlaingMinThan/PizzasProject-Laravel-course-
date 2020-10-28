<?php

use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get("/",[PizzaController::class,'index'])->name("home");
// crate
Route::post("/",[PizzaController::class,"insert"])->name("insert");
// read
Route::middleware(['auth:sanctum', 'verified'])->get('/pizzas', [PizzaController::class,'pizzas'])->name("pizzas");
// delete
Route::get("/pizzas/{id}",[PizzaController::class,"delete"])->name("delete");
// edit form route
Route::get("/pizzas/edit/{id}",[PizzaController::class,"edit"])->name("edit");
// update
Route::post("/pizzas/update/{id}",[PizzaController::class,"update"])->name("update");

Route::get("/logout",function(){
    Auth::logout();
    return redirect()->route("login");
})->name("logout");

// Route::get('/dashboard', function () {
//     return Inertia\Inertia::render('Dashboard');
// })->name('dashboard');
