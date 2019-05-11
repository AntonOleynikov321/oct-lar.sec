<?php

use Illuminate\Http\Request;
use App\Task;
use App\News;

Route::get('/',function(){
    return view('index');
})->name('home');


Route::group(['prefix' => 'tasks'], function() {
    Route::get('/', function () {
        $tasks = Task::all();
        return view('tasks.index', [
            'tasks' => $tasks,
        ]); // в уроке это вид tasks
    })->name('tasks_index');
    Route::post('/', function (Request $request) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect(route('tasks_index'))
                            ->withInput()
                            ->withErrors($validator);
        }
        $task = new Task();
        $task->name = $request->name;
        $task->save();
        return redirect(route('tasks_index'));
    })->name('tasks_store');

    Route::delete('/{task}', function(Task $task) {
        $task->delete();
        return redirect(route('tasks_index'));
    })->name('tasks_destroy');

    Route::get("/{task}/edit", function(Task $task) {
        return view('tasks.edit', [
            'task' => $task,
        ]);
    })->name('tasks_edit');

    Route::put("/{task}", function(Request $request, Task $task) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect(route('tasks_edit', $task->id))
                            ->withInput()
                            ->withErrors($validator);
        }
        $task->name = $request->name;
        $task->save();
        return redirect(route('tasks_index'));
    })->name('tasks_update');
});

Route::group(['prefix'=>'news'],function (){
   Route::get('/', function () {
        $news = News::all();
        return view('news.index', [
            'news' => $news,
        ]); 
    })->name('news_index');
    Route::post('/', function (Request $request) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect(route('news_index'))
                            ->withInput()
                            ->withErrors($validator);
        }
        $news = new News();
        $news->title = $request->title;
        $news->text = $request->text;
        $news->save();
        return redirect(route('news_index'));
    })->name('news_store');

    Route::delete('/{news}', function(News $news) {
        $news->delete();
        return redirect(route('news_index'));
    })->name('news_destroy');

    Route::get("/{task}/edit", function(News $news) {
        return view('news.edit', [
            'news' => $news,
        ]);
    })->name('news_edit');

    Route::put("/{news}", function(Request $request, Task $task) {
        $validator = Validator::make($request->all(), [
                    'text' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return redirect(route('news_edit', $news->id))
                            ->withInput()
                            ->withErrors($validator);
        }
        $news->title = $request->title;
        $news->text = $request->text;
        $news->save();
        return redirect(route('news_index'));
    })->name('news_update'); 
    
     Route::get("/news/{news}", function(News $news) {
       return view('news.article');
    })->name('news_show');
});