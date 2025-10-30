<?php

use App\Livewire\Home;
use App\Livewire\About;
use App\Livewire\Users;
use App\Livewire\Counter;
use Illuminate\Support\Facades\Route;


Route::get('/', Home::class);
Route::get('/counter', Counter::class);
Route::get('/users', Users::class);
Route::get('/about', About::class);
