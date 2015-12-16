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
        $userTasks = \App\Task::where('user_id','=',\Auth::id())
                    ->orderBy('id','DESC');
        $completedTasks = \App\Task::where('status','=','Completed')
                    ->union($userTasks)
                    ->get();
        $inProgressTasks = \App\Task::where('status','=','In progress')
                    ->union($userTasks)
                    ->get();
        $notStartedTasks = \App\Task::where('status','=','Not Started')
                    ->union($userTasks)
                    ->get();
        $tasks =  $userTasks->get();
        return view('tasks.index')
            ->with('tasks',$tasks)
            ->with('notStartedTasks',$notStartedTasks)
            ->with('inProgressTasks',$inProgressTasks)
            ->with('completedTasks',$completedTasks);
    }
    /**
    * Responds to requests to GET /tasks/edit/{$id}
    */
    public function getEdit($id = null) {
        $task = \App\Task::find($id); 

        $ownerModel = new \App\Owner();
        $owners_for_dropdown = $ownerModel->getownersForDropdown();
    
        if(is_null($task)) {
            \Session::flash('flash_message','Oops task not found.');
            \Session::flash('flash_type', 'alert-danger');
            return redirect('tasks');
        }

       return view('tasks.edit')
            ->with([
                'task' => $task,
                'owners_for_dropdown' => $owners_for_dropdown,
            ]);
    }
    /**
    * Responds to requests to POST /tasks/edit
    */
    public function postEdit(Request $request) {
        $task = \App\Task::find($request->id);
        $task->title = $request->title;
        $task->owner_id = $request->owner;
        $task->detail = $request->detail;
        $task->status = $request->status;
        $task->save();

        \Session::flash('flash_message','Success! Your task was updated.');
        \Session::flash('flash_type', 'alert-success');
        return redirect('tasks');
    }
    /**
     * Responds to requests to GET /tasks/delete
     */
    public function getConfirmDelete($id = null) {
        $task = \App\Task::find($id);
        if(is_null($task)) {
            \Session::flash('flash_message','Oops task not found.');
            \Session::flash('flash_type', 'alert-danger');
            return redirect('tasks');
        }

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
        $ownerModel = new \App\Owner();
        $owners_for_dropdown = $ownerModel->getownersForDropdown();

    return view('tasks.create')->with('owners_for_dropdown',$owners_for_dropdown);
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
                'status' => 'required|min:5',
            ]
        );
        
        # Enter task into the database
        $task = new \App\Task();
        $task->title = $request->title;
        $task->detail = $request->detail;
        $task->owner_id = $request->owner;
        $task->user_id = \Auth::id();
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