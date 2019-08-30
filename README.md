# ToDo List PHP Laravel

## Création d'une Todolist en php avec le Framework Laravel

--- 

## Les langages et outils utilisés 

* HTML5
* CSS3
* PHP
* Laravel
---

## Quand a t-il été réalisé ? 

Ce projet a été réalisé le 30 Aout 2019.

## Dans quel cadre ce projet a vu le jour ?

Il s'agit d'un travail réalisé dans le cadre de la formation BeCode.

--- 

## Présentation du code

<p>Dans cette partie, je vais vous présenter le code qui a été réalisé pour le projet. </p>

### Partie PHP
<details>
<summary>Fichier HTML</summary>

```markdown
<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('archive', false )->orderBy('due_date', 'asc')->paginate(5);
        $archive = Task::where('archive', true )->orderBy('due_date', 'asc')->paginate(5);

        return view('tasks.index', compact('archive', 'tasks'));
    }

    public function archive($id, $state)
    {
        Task::findOrFail($id)->update(['archive'=> $state]);
        return back();
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate ($request, [
            'name' =>'required|string|max:255|min:3',
            'description' => 'required|string|max:10000|min:10',
            'due_date' => 'required|date',
        ]);

        // create a new task
        $task = new Task;

        // Assign a task data from our request
        $task->name = $request->name;
        $task->description = $request->description;
        $task->due_date = $request->due_date;

        // save the task
        $task->save();

        // Flash Session Message with success
        Session::flash('success', 'Created Task Successfully');

        // Return a redirect
        return redirect()->route('task.index');

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        $task->dueDateFormatting = false;
        return view('tasks.edit')->withTask($task);
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
            // validate the data
            $this->validate ($request, [
                'name' =>'required|string|max:255|min:3',
                'description' => 'required|string|max:10000|min:10',
                'due_date' => 'required|date',
            ]);
    
            // find a task
            $task = Task::find($id);
    
            // Assign a task data from our request
            $task->name = $request->name;
            $task->description = $request->description;
            $task->due_date = $request->due_date;
    
            // save the task
            $task->save();
    
            // Flash Session Message with success
            Session::flash('success', 'Saved The Task Successfully');
    
            // Return a redirect
            return redirect()->route('task.index');
    
        }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function destroy($id)
     {
         $task = Task::find($id);

         $task->delete();

         Session::flash('success', 'Delete the task success');

         return redirect()->route('task.index');


     }
    }

```
</details>


## Le résultat en image :

<img src="Exemple01.jpg" width="500"/>

<img src="Exemple02.jpg" width="500"/>

<img src="Exemple03.jpg" width="500"/>
