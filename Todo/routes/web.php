<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::view('/', "Home")->name("todo.form");

Route::get("/todos", [TodoController::class, "allTodos"])->name("all.todo");

Route::post("/store", [TodoController::class, "storeTodo"])->name("todo.store");

Route::get("/edit/{id}", [TodoController::class, "editTodo"])->name("todo.edit");

Route::post("/update/{id}", [TodoController::class, "updateTodo"])->name("todo.update");

Route::get("/delete/{id}", [TodoController::class, "deleteTodo"])->name("todo.delete");

Route::get("/status/{id}", [TodoController::class, "statusTodo"])->name("todo.status");