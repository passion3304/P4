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
        // Get all the tasks "owned" by the current logged in users
        // Sort in descending order by id
        $tasks = \App\task::where('user_id','=',\Auth::id())->orderBy('id','DESC')->get();
        return view('tasks.index')->with('tasks',$tasks);
    }
    /**
    * Responds to requests to GET /tasks/edit/{$id}
    */
    public function getEdit($id = null) {
        # Get this task and eager load its tags
        $task = \App\task::with('tags')->find($id);
        if(is_null($task)) {
            \Session::flash('flash_message','task not found.');
            return redirect('\tasks');
        }
        # Get all the possible authors so we can build the authors dropdown in the view
        $authorModel = new \App\Author();
        $authors_for_dropdown = $authorModel->getAuthorsForDropdown();
        # Get all the possible tags so we can include them with checkboxes in the view
        $tagModel = new \App\Tag();
        $tags_for_checkbox = $tagModel->getTagsForCheckboxes();
        /*
        Create a simple array of just the tag names for tags associated with this task;
        will be used in the view to decide which tags should be checked off
        */
        $tags_for_this_task = [];
        foreach($task->tags as $tag) {
            $tags_for_this_task[] = $tag->name;
        }
        return view('tasks.edit')
            ->with([
                'task' => $task,
                'authors_for_dropdown' => $authors_for_dropdown,
                'tags_for_checkbox' => $tags_for_checkbox,
                'tags_for_this_task' => $tags_for_this_task,
            ]);
    }
    /**
    * Responds to requests to POST /tasks/edit
    */
    public function postEdit(Request $request) {
        $task = \App\task::find($request->id);
        $task->title = $request->title;
        $task->author_id = $request->author;
        $task->cover = $request->cover;
        $task->published = $request->published;
        $task->purchase_link = $request->purchase_link;
        $task->save();
        if($request->tags) {
            $tags = $request->tags;
        }
        else {
            $tags = [];
        }
        $task->tags()->sync($tags);
        \Session::flash('flash_message','Your task was updated.');
        return redirect('/tasks/edit/'.$request->id);
    }
    /**
     * Responds to requests to GET /tasks/create
     */
    public function getCreate() {
        # Instantiate a new task Model object
        $task = new \App\Task();

        # Set the parameters
        # Note how each parameter corresponds to a field in the table
        $task->title = 'New Task';
        $task->detail = 'Go to the Store';
        $task->owner = 'Charlie';
        $task->status = 'In progress';

        # Invoke the Eloquent save() method
        # This will generate a new row in the `tasks` table, with the above data
        $task->save();

        echo 'Added: '.$task->title;
    }
    /**
     * Responds to requests to POST /tasks/create
     */
    public function postCreate(Request $request) {
        $this->validate(
            $request,
            [
                'title' => 'required|min:5',
                'cover' => 'required|url',
                'published' => 'required|min:4',
              ]
        );
        # Enter task into the database
        $task = new \App\task();
        $task->title = $request->title;
        $task->author_id = $request->author;
        $task->user_id = \Auth::id(); # <--- NEW LINE
        $task->cover = $request->cover;
        $task->published = $request->published;
        $task->purchase_link = $request->purchase_link;
        $task->save();
        # Add the tags
        if($request->tags) {
            $tags = $request->tags;
        }
        else {
            $tags = [];
        }
        $task->tags()->sync($tags);
        # Done
        \Session::flash('flash_message','Your task was added!');
        return redirect('/tasks');
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
    public function getConfirmDelete($task_id) {
        $task = \App\task::find($task_id);
        return view('tasks.delete')->with('task', $task);
    }
    /**
	*
	*/
    public function getDoDelete($task_id) {
        $task = \App\task::find($task_id);
        if(is_null($task)) {
            \Session::flash('flash_message','task not found.');
            return redirect('\tasks');
        }
        if($task->tags()) {
            $task->tags()->detach();
        }
        $task->delete();
        \Session::flash('flash_message',$task->title.' was deleted.');
        return redirect('/tasks');
    }
}