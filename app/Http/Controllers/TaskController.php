<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class taskController extends Controller {
    public function __construct() {
        # Put anything here that should happen before any of the other actions
    }
    /**
    * Responds to requests to GET /tasks
    */
    public function getIndex(Request $request) {
        $tasks = \App\Task::orderBy('id','DESC')->get();
        return view('tasks.index')->with('tasks',$tasks);
    }
    /**
    * Responds to requests to GET /tasks/edit/{$id}
    */
    public function getEdit($id = null) {
        $task = \App\Task::find($id); 
        if(is_null($task)) {
            \Session::flash('flash_message','Oops task not found.');
            \Session::flash('flash_type', 'alert-danger');
            return redirect('tasks');
        }

        return view('tasks.edit')
            ->with('task',$task);
    }
    /**
    * Responds to requests to POST /tasks/edit
    */
    public function postEdit(Request $request) {
        $task = \App\Task::find($request->id);
        $task->title = $request->title;
        $task->owner = $request->owner;
        $task->detail = $request->detail;
        $task->status = $request->status;
        $task->save();

        \Session::flash('flash_message','Success! Your task was updated.');
        \Session::flash('flash_type', 'alert-success');
        return redirect('/tasks/edit/'.$request->id);
    }
    /**
     * Responds to requests to GET /tasks/delete
     */
    public function getConfirmDelete($id = null) {
        $task = \App\Task::find($id); 

        return view('tasks.delete')
            ->with('task',$task);
    }
    public function getDoDelete($id = null) {
        $task = \App\Task::find($id);
        if(is_null($task)) {
            \Session::flash('flash_message','Oops task not found.');
            \Session::flash('flash_type', 'alert-danger');
            return redirect('tasks');
        }
        $task->delete();
        \Session::flash('flash_message','Success! '. $task->title.' was deleted.');
        \Session::flash('flash_type', 'alert-success');
        return redirect('tasks');
    }
    /**
     * Responds to requests to GET /tasks/create
     */
    public function getCreate() {
        return view('tasks.create');

        # Instantiate a new task Model object
        #$task = new \App\Task();

        # Set the parameters
        # Note how each parameter corresponds to a field in the table
        #$task->title = 'New Task';
        #$task->detail = 'Go to the Store';
        #$task->owner = 'Charlie';
        #$task->status = 'In progress';

        # Invoke the Eloquent save() method
        # This will generate a new row in the `tasks` table, with the above data
        #$task->save();

        #echo 'Added: '.$task->title;
    }
    /**
     * Responds to requests to POST /tasks/create
     */
    public function postCreate(Request $request) {
        
        $this->validate(
            $request,
            [
                'title' => 'required|min:5',
                'detail' => 'required|min:5',
                'owner' => 'required|min:5',
                'status' => 'required|min:5',
            ]
        );
        
        # Enter task into the database
        $task = new \App\Task();
        $task->title = $request->title;
        $task->detail = $request->detail;
        $task->owner = $request->owner;
        $task->status = $request->status;
        $task->save();

        # Done
        \Session::flash('flash_message','Success! Your task was added.');
        \Session::flash('flash_type', 'alert-success');
        return redirect('/tasks');
        #return 'Process adding new task: '.$request->input('title');
    }
    /**
     * Responds to requests to GET /tasks/show/{title}
     */
    public function getShow($title = null) {
        return view('tasks.show')->with('title', $title);
    }
    public function getAll($title = null) {
        $tasks = \App\Task::all();

        # Make sure we have results before trying to print them...
        if(!$tasks->isEmpty()) {

            // Output the tasks
            foreach($tasks as $task) {
                echo $task->title.'<br>';
            }
        }
        else {
            echo 'No tasks found';
        }
    }
}