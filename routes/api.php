<?php

use App\Http\Controllers\ApiReaderController;
use Illuminate\Support\Facades\Route;

require base_path('routes/api_v1.php');

Route::get('/leer-apis', [ApiReaderController::class, 'index']);