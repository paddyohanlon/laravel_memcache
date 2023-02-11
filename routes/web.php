<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Show Tasks
Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', [
        'tasks' => $tasks
    ]);
});

// Add New Task
Route::post('/task', function (Request $request) {
    // Validate input
    $request->validate([
        'name' => 'required|max:255',
    ]);

    // Create task
    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

// Delete Task
Route::delete('/task/{task}', function (Task $task) {
    $task->delete();

    return redirect('/');
});
