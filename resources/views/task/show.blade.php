@extends('layouts.app')

@section('content')
<div class="grid col-span-full">
    <h2 class="mb-5">
        @lang('views.task.show.header', ['name' => $task->name])
        <a href="{{ route('tasks.edit', $task) }}">&#9881;</a>
        </h1>
        <p><span class="font-black">@lang('views.task.show.name'):</span> {{ $task->name }}</p>
        <p><span class="font-black">@lang('views.task.show.status_id'):</span> {{ $task->status->name }}</p>
        <p><span class="font-black">@lang('views.task.show.description'):</span> {{ $task->description }}</p>

</div>
@endsection
