<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

use App\Http\Resources\PortfolioResource; 
use App\Models\Portfolio; 

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

Route::redirect('/', 'project'); 

Route::resource('project', ProjectController::class);

Route::get('/api/portfolio/{id}', function ($id) {
    return new PortfolioResource(Portfolio::findOrFail($id));
});