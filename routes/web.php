<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks', function () {
    return view('tasks.index')->with([
        'task' => new App\Task(),
        'tasks' => \App\Task::all()
    ]);
});

Route::get('/tasks/{task}/edit', function (\App\Task $task) {
    return view('tasks.edit')->with([
        'task' => $task,
        'tasks' => \App\Task::all()
    ]);
});

Route::post('/tasks', function () {

	$taskCreateValidateRules = [
        'type' => 'required',
        'name' => 'required'
    ];

    $taskCreateValidateMessages = [
        'type.required' => 'ลงข้อมูล <a style="cursor: pointer;" onclick="document.getElementById(' . "'type'" . ').focus()"><i>ประเภทงาน</i> <b>ด้วย</b></a>',
        'name.required' => 'ลงข้อมูล <a style="cursor: pointer;" onclick="document.getElementById(' . "'name'" . ').focus()"><i>ชื่องาน</i> <b>ด้วย</b></a>'
    ];
    

    request()->validate($taskCreateValidateRules, $taskCreateValidateMessages);



	$data = request()->all();

	if(request()->has('status')){
		$data['status'] = true;
	}
	\App\Task::create($data);

	//return request()->all();
    //return view('tasks.index');

    return back();
});

Route::patch('/tasks/{task}', function (\App\Task $task) {
	$task->update(request()->all());
    return back();
});

Route::put('/tasks/{task}', function (\App\Task $task) {

    $taskCreateValidateRules = [
        'type' => 'required',
        'name' => 'required'
    ];

    $taskCreateValidateMessages = [
        'type.required' => 'ลงข้อมูล <a style="cursor: pointer;" onclick="document.getElementById(' . "'type'" . ').focus()"><i>ประเภทงาน</i> <b>ด้วย</b></a>',
        'name.required' => 'ลงข้อมูล <a style="cursor: pointer;" onclick="document.getElementById(' . "'name'" . ').focus()"><i>ชื่องาน</i> <b>ด้วย</b></a>'
    ];
    

    request()->validate($taskCreateValidateRules, $taskCreateValidateMessages);



    $data = request()->all();

    if(request()->has('status')){
        $data['status'] = true;
    } else {
        $data['status'] = false;
    }

    return $data;

    $task->update($data);
    //return redirect('/tasks');
    return back();
});

Route::delete('/tasks/{task}', function (\App\Task $task) {
    $task->delete();
    return back();
});

