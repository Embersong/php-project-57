@extends('layouts.app')

@section('content')
    <div class="grid col-span-full">
        <h1 class="mb-5">@lang('views.task.edit.form_header')</h1>
        {{ html()->modelForm($task, 'PATCH', route('tasks.update', $task))->class('w-50')->open() }}
        <div class="flex flex-col">
            <div>
                {{ html()->label(__('views.task.create.labels.name'), 'name') }}
            </div>
            <div class="mt-2">
                {{  html()->input('text', 'name')->class('rounded border-gray-300 w-1/3') }}
            </div>
            @error('name')
            <div class="text-rose-600">{{ $message }}</div>
            @enderror
            <div class="mt-2">
                {{ html()->label(__('views.task.create.labels.description'), 'description') }}
            </div>
            <div>
                {{ html()->textarea('description')->class('rounded border-gray-300 w-1/3 h-32') }}
            </div>
            <div class="mt-2">
                {{ html()->label(__('views.task.create.labels.status_id'), 'status_id') }}
            </div>
            <div>
                {{ html()->select('status_id', $taskStatuses->pluck('name', 'id'))->class('rounded border-gray-300 w-1/3') }}
            </div>
            @error('status_id')
            <div class="text-rose-600">{{ $message }}</div>
            @enderror
            <div class="mt-2">
                {{ html()->label(__('views.task.create.labels.assigned_to_id'), 'status_id') }}
            </div>
            <div>
                {{ html()->select('assigned_to_id', $users->pluck('name', 'id'))->placeholder(null)->class('rounded border-gray-300 w-1/3') }}
            </div>
            <div class="mt-2">
                {{ html()->label(__('views.task.create.labels.labels'), 'status_id') }}
            </div>
            <div>
                {{  html()->multiselect('labels[]', $labels->pluck('name', 'id'), $task->labels->pluck('id'))->class('rounded border-gray-300 w-1/3 h-32') }}
            </div>
            <div class="mt-2">
                {{  html()->submit(__('views.task.edit.buttons.update'))->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded') }}
            </div>
        </div>
        {{ html()->closeModelForm() }}
    </div>
@endsection
