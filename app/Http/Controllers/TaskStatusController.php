<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(TaskStatus::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taskStatuses = TaskStatus::paginate(15);

        return view('task_status.index', [
            'taskStatuses' => $taskStatuses,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $taskStatus = new TaskStatus();
        return view('task_status.create', [
            'taskStatus' => $taskStatus,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|unique:task_statuses|max:255',
            ],
            [
                'name.unique' => __('validation.task_status.unique'),
            ]
        );

        TaskStatus::create($validated);

        return redirect()->route('task_statuses.index')->with('success', __('flashes.statuses.store.success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskStatus $taskStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskStatus $taskStatus)
    {
        return view('task_status.edit', [
            'taskStatus' => $taskStatus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskStatus $taskStatus)
    {
        $validated = $request->validate(
            [
                'name' => 'required|unique:task_statuses|max:255' . $taskStatus->id,
            ],
            [
                'name.unique' => __('validation.task_status.unique'),
            ]
        );

        $taskStatus->fill($validated)->save();

        flash(__('flashes.statuses.updated'))->success();
        return redirect()->route('task_statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskStatus $taskStatus)
    {
        if ($taskStatus->tasks()->exists()) {
            flash(__('flashes.statuses.delete.error'))->error();
            return back();
        }

        $taskStatus->delete();

        flash(__('flashes.statuses.deleted'))->success();
        return redirect()->route('task_statuses.index');
    }
}
