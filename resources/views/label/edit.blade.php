@extends('layouts.app')

@section('content')
<div class="grid col-span-full">
    <h1 class="mb-5">@lang('views.label.edit.form_header')</h1>

    {{  html()->modelForm($label, 'PATCH', route('labels.update', $label))->class('w-50')->open() }}
    <div class="flex flex-col">
        <div>
            {{ html()->label(__('views.label.edit.labels.name'), 'name') }}
        </div>
        <div class="mt-2">
            {{  html()->input('text', 'name')->class('rounded border-gray-300 w-1/3') }}
        </div>
        @error('name')
        <div class="text-rose-600">{{ $message }}</div>
        @enderror
        <div class="mt-2">
            {{ html()->label(__('views.label.edit.labels.description'), 'description') }}
        </div>
        <div class="mt-2">
            {{ html()->textarea('description')->class('rounded border-gray-300 w-1/3 h-32') }}
        </div>
        @error('description')
            <div class="text-rose-600">{{ $message }}</div>
        @enderror
        <div class="mt-2">
            {{  html()->submit(__('views.label.edit.buttons.update'))->class('bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded') }}
        </div>
    </div>
    {{ html()->closeModelForm() }}
</div>
@endsection
