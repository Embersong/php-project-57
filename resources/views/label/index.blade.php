@extends('layouts.app')

@section('content')
<div class="grid col-span-full">
    <h1 class="mb-5">@lang('views.label.index.header')</h1>

    <div>
        @can('create', App\Models\Label::class)
            <a href="{{ route('labels.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                @lang('views.label.index.create_button')
            </a>
        @endcan
    </div>

    <table class="mt-4">
        <thead class="border-b-2 border-solid border-black text-left">
            <tr>
                <th>@lang('views.label.index.id')</th>
                <th>@lang('views.label.index.name')</th>
                <th>@lang('views.label.index.description')</th>
                <th>@lang('views.label.index.created_at')</th>
                @can('seeActions', App\Models\Label::class)
                    <th>@lang('views.label.index.actions')</th>
                @endcan
            </tr>
        </thead>
        @foreach($labels as $label)
            <tr class="border-b border-dashed text-left">
                <td>{{ $label->id }}</td>
                <td>{{ $label->name }}</td>
                <td>{{ $label->description }}</td>
                <td>{{ $label->created_at->format('d.m.Y') }}</td>
                <td>
                    @can('delete', $label)
                        <a
                            data-confirm="@lang('views.label.index.delete_confirmation')"
                            data-method="delete"
                            class="text-red-600 hover:text-red-900"
                            href="{{ route('labels.destroy', $label) }}"
                        >
                            @lang('views.label.index.delete')
                        </a>
                    @endcan
                    @can('update', $label)
                        <a class="text-blue-600 hover:text-blue-900" href="{{ route('labels.edit', $label) }}">
                            @lang('views.label.index.edit')
                        </a>
                    @endcan
                </td>
            </tr>
        @endforeach
    </table>

    {{ $labels->links() }}
</div>
@endsection
