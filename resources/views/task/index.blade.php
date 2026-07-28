@extends('layouts.app')

@section('content')
<div class="grid col-span-full">
    <h1 class="mb-5">@lang('views.task.index.header')</h1>

    <div class="w-full flex items-center">
        <div>
            {{ html()->form('GET', route('tasks.index'))->open() }}
            <div class="flex">
                {{ html()->select('filter[status_id]', $taskStatusesForFilterForm, Arr::get($filterParams, 'status_id'))->placeholder(__('views.task.index.placeholders.status_id'))->class('rounded border-gray-300') }}
                {{ html()->select('filter[created_by_id]', $usersForFilterForm, Arr::get($filterParams, 'created_by_id'))->placeholder(__('views.task.index.placeholders.created_by_id'))->class('rounded border-gray-300') }}
                {{ html()->select('filter[assigned_to_id]', $usersForFilterForm, Arr::get($filterParams, 'assigned_to_id'))->placeholder(__('views.task.index.placeholders.assigned_to_id'))->class('rounded border-gray-300') }}
                {{ html()->submit(__('views.task.index.filter_button'))->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2') }}
                {{ html()->form()->close() }}
            </div>
        </div>

        <div class="ml-auto">
            @can('create', App\Models\Task::class)
            <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-2">
                @lang('views.task.index.create_button')
            </a>
            @endcan
        </div>
    </div>

    <table class="mt-4">
        <thead class="border-b-2 border-solid border-black text-left">
            <tr>
                <th>@lang('views.task.index.id')</th>
                <th>@lang('views.task.index.status')</th>
                <th>@lang('views.task.index.name')</th>
                <th>@lang('views.task.index.creator')</th>
                <th>@lang('views.task.index.assigned_to')</th>
                <th>@lang('views.task.index.created_at')</th>
                @can('seeActions', App\Models\Task::class)
                <th>@lang('views.task_status.index.actions')</th>
                @endcan
            </tr>
        </thead>
        @foreach($tasks as $task)
        <tr class="border-b border-dashed text-left">
            <td>{{ $task->id }}</td>
            <td>{{ $task->status->name }}</td>
            <td>
                <a class="text-blue-600 hover:text-blue-900" href="{{ route('tasks.show', $task) }}">
                    {{ $task->name }}
                </a>
            </td>
            <td>{{ $task->createdBy->name }}</td>
            <td>{{ $task->assignedTo->name ?? '' }}</td>
            <td>{{ $task->created_at->format('d.m.Y') }}</td>
            <td>
                @can('delete', $task)
                <a data-confirm="@lang('views.task.index.delete_confirmation')" data-method="delete" href="{{ route('tasks.destroy', $task) }}" class="text-red-600 hover:text-red-900">
                    @lang('views.task.index.delete')
                </a>
                @endcan
                @can('update', $task)
                <a href="{{ route('tasks.edit', $task) }}" class="text-blue-600 hover:text-blue-900">
                    @lang('views.task.index.edit')
                </a>
                @endcan
            </td>
        </tr>
        @endforeach
    </table>

    <div class="mt-4">
        {{ $tasks->links() }}
    </div>
</div>
@endsection
