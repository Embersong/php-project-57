<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    public function __construct()
    {
      $this->authorizeResource(Task::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters(
                'name',
                AllowedFilter::exact('status_id'),
                AllowedFilter::exact('created_by_id'),
                AllowedFilter::exact('assigned_to_id'),
            )
            ->orderBy('id')
            ->paginate(15);

        $taskStatusesForFilterForm = TaskStatus::pluck('name', 'id');
        $usersForFilterForm = User::pluck('name', 'id');
        $filterParams = $request->input('filter');
        return view('task.index', compact(
            'tasks',
            'taskStatusesForFilterForm',
            'usersForFilterForm',
            'filterParams'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $task = new Task();
        $taskStatuses = TaskStatus::all();
        $users = User::all();
        return view('task.create', [
            'task' => $task,
            'taskStatuses' => $taskStatuses,
            'users' => $users,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => ['required', 'unique:tasks', 'max:255'],
                'description' => 'max:500',
                'status_id' => 'required',
                'assigned_to_id' => ['nullable', 'exists:users,id'],
                'labels' => ['nullable', 'array'],
            ],
            [
                'name.unique' => __('validation.task.unique')
            ]
        );

        $currentUser = Auth::user();

        $currentUser->createdTasks()->make($validated)->save();


        flash(__('flashes.tasks.store.success'))->success();

        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('task.show', [
            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $taskStatuses = TaskStatus::all();
        $users = User::all();

        return view('task.edit', compact('task', 'taskStatuses', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate(
            [
                'name' => 'required|unique:tasks,name,' . $task->id,
                'description' => 'nullable|string|max:255',
                'assigned_to_id' => ['nullable', 'exists:users,id'],
                'status_id' => 'required|integer',
                'labels' => ['nullable', 'array'],
            ],
            [
                'name.unique' => __('validation.task.unique')
            ]
        );


        $task->fill($validated);
        $task->save();
        flash(__('flashes.tasks.updated'))->success();

        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        flash(__('flashes.tasks.deleted'))->success();

        return redirect()->route('tasks.index');
    }
}
