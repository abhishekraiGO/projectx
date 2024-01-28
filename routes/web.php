<?php
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use \App\Models\Task;
use \App\Http\Requests\TaskRequest;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('home', ['tasks' => Task::latest()->paginate(10)]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', ['task' => $task]);
})->name('tasks.edit');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show', ['task' => $task]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task Created Successfully!');
})->name('tasks.store');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());
    return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task Updated Successfully!');
})->name('tasks.update');

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'Task Deleted Successfully!');
})->name('tasks.destroy');

Route::put('tasks/{task}/toggle-complete', function (Task $task) {
    $task->toggleComplete();
    return redirect()->back()->with('success', 'Task updated successfully');
})->name('tasks.togglecomplete');


























Route::get('/hello', function () {
    return 'hello route';
});
Route::get('/greet/{name}', function ($name) {
    return '<h1> hello' . $name . '</h1>';
})->name('firstroute');
Route::get('/greeta/{name}', function ($name) {
    return redirect()->route('firstroute', ['name' => $name]);
});
Route::fallback(function () {
    return 'still got somewhere';
});
Route::get('/firsttemplate', function () {
    return view('home', );
});