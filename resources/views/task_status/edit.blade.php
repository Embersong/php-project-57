@extends('layouts.app')

@section('content')
    <div class="grid col-span-full">
        <h1 class="mb-5">@lang('views.task_status.edit.form_header')</h1>
        {{ html()->modelForm($taskStatus, 'PATCH', route('task_statuses.update', $taskStatus))->class('w-50')->open() }}
        <div class="flex flex-col">
            <div>
                {{ html()->label(__('views.task_status.edit.labels.name'), 'name') }}
            </div>
            <div class="mt-2">
                {{  html()->input('text', 'name')->class('rounded border-gray-300 w-1/3') }}
            </div>
            @error('name')
            <div class="text-rose-600">{{ $message }}</div>
            @enderror
            <div class="mt-2">
                {{  html()->submit(__('views.task_status.edit.buttons.update'))->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded') }}
            </div>
        </div>
        {{ html()->closeModelForm() }}
    </div>
@endsection
