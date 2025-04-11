<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatbotController;

Route::post('/chatbot/message', [ChatbotController::class, 'sendMessage']);