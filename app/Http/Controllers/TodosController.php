<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo; //Importamos a class todo (MODEL)

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todos = Todo::orderBy('created_at','desc')->paginate(4);
        return view('home', [
            'todos'=> $todos,
        ]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation Rules
        $rules = [
            'title' => 'required|string|unique:todos,title|min:2|max:191',
            'body' =>   'required|string|min:2|max: 1000',
        ];
        //Custom validation error messages
        $messages = [
            'title.unique' => 'Todo title should be unique', //syntax field_name.rule
        ];
        
        //first validate the form data

        $request->validate($rules,$messages);
        //Create a Todo
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->body = $request->body;
        $todo->save(); //save into database
        //Redirect to a specifield route with flash message
        return redirect()
            ->route('todos.index')
            ->with('status', 'Created a new Todo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $todos = Todo::find($id);
        return view('todos.show', [
            'todos' =>  $todos,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $todos = Todo::findOrFail($id);
        return view('todos.edit',
            [
                'todos'=> $todos,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validation Rules
        $rules = [
            'title' => 'required|string|min:2|max:191',
            'body' =>   'required|string|min:2|max: 1000',
        ];
        //first validate the form data
        $request->validate($rules);
        //Create a Todo
        $todo = Todo::findOrFail($id);
        $todo->title = $request->title;
        $todo->body = $request->body;
        $todo->update(); //can be used for both creating and updating
        //Redirect to a specifield route with flash message
        return redirect()
            ->route('todos.index',$id)
            ->with('status', 'Updated the selected Todo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete the todo
        $todo = Todo::findOrFail($id);
        $todo->delete();
        //redirect to a specifield route with flash message.
        return redirect()
            ->route('todos.index')
            ->with('status', 'Deleted the selected Todo!');
    }
}
