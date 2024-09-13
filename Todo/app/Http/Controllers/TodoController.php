<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function allTodos()
    {
        $todos = Todo::get();

        return view("Todos", compact("todos"));
    }

    public function storeTodo(Request $request)
    {
        $request->validate([
            "title" => "required",
            "detail" => "required",
            "user" => "required",
        ], [
            "title.required" => "Title is Required!",
            "detail.required" => "Detail is Required!",
            "user.required" => "User is Required!",
        ]);

        $todo = new Todo();
        $todo->title = $request->title;
        $todo->detail = $request->detail;
        $todo->user = $request->user;
        $todo->save();

        return back()->with("msg", "Todo added successfully");
    }

    public function editTodo($id)
    {
        $todo = Todo::find($id);
        return view("EditTodo", compact("id", "todo"));
    }

    public function updateTodo(Request $request, $id)
    {
        $request->validate([
            "title" => "required",
            "detail" => "required",
            "user" => "required",
        ], [
            "title.required" => "Title is Required!",
            "detail.required" => "Detail is Required!",
            "user.required" => "User is Required!",
        ]);

        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->detail = $request->detail;
        $todo->user = $request->user;

        $todo->save();
        return redirect("/todos")->with('msg', 'Todo updated successfully');
    }

    public function deleteTodo($id)
    {
        Todo::destroy($id);
        return redirect("/todos");
    }

    public function statusTodo($id)
    {
        $todo = Todo::find($id);
        $todo->is_completed = !($todo->is_completed);

        $todo->save();
        return redirect("/todos")->with('msg', 'Todo updated successfully');
    }
}