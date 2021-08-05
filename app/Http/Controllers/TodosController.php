<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    //Create Method
    public function index (){
        
        //fetch all todos from database
        //display them in the todos.index page


        return view('todos.index')->with('todos', Todo::all());

    }
    
    public function show (Todo $todo){

        return view('todos.show')->with('todo', $todo);
    }

    public function create(){

        return view('todos.create');
    }
    
    public function store(){

        $this->validate(request(), [
            'name' => 'required|min:6|max:12',
            'description' => 'required'
          ]);

        $data = request()->all();

        $todo = new Todo();

        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();

        session()->flash('success','Todo created Successfully.');

        return redirect('/todos');
        
    }
    public function edit (Todo $todo){
        return view('todos.edit')->with('todo', $todo);
    }

    public function update($todoId)
    {
      $this->validate(request(), [
        'name' => 'required|min:6',
        'description' => 'required'
      ]);

      $data = request()->all();

      $todo = Todo::find($todoId);

      $todo->name = $data['name'];
      $todo->description = $data['description'];

      $todo->save();

      session()->flash('success','Todo updated Successfully.');

      return redirect('/todos');
    }
    
    public function destroy($todoId)
    {
      $todo = Todo::find($todoId);

      $todo->delete();

      session()->flash('success','Todo deleted Successfully.');

      return redirect('/todos');
    }
    public function complete (Todo $todo)
    {

    $todo->completed = true;
    $todo->save();

    session()->flash('success','Todo Completed Successfully.');

    return redirect('/todos');

    }
}
