@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">

    <form action="{{ route('tasks.index') }}">
        @csrf
        <button type="submit" class="rounded-full bg-blue-500 text-white py-2 px-4 hover:bg-blue-600">
            Home
        </button>
    </form>
    <div class="bg-white p-8 rounded-lg shadow-md">
        <h1 class="text-xl font-semibold mb-4">{{ $task->title }}</h1>

        <p class="mb-4">{{ $task->description }}</p>

        @if ($task->long_description)
        <p class="mb-4">{{ $task->long_description }}</p>
        @endif

        <p class="mb-2"><b>Created At:</b> {{ $task->created_at }}</p>
        <p class="mb-4"><b>Last Updated At:</b> {{ $task->updated_at }}</p>

        <div class="mb-4">
            <p><b>Status</b>: {{ $task->completed ? 'Completed' : 'Not Completed' }}</p>
        </div>

        <div class="flex mb-4">
            <a href="{{ route('tasks.edit', ['task' => $task]) }}"
                class="rounded-full bg-purple-500 text-white py-2 px-4 mr-4 hover:bg-purple-600">
                Edit
            </a>

            <form method="POST" action="{{ route('tasks.togglecomplete', ['task' => $task]) }}">
                @csrf
                @method('PUT')
                <button type="submit" class="rounded-full bg-green-500 text-white py-2 px-4 hover:bg-green-600">
                    Mark as {{ $task->completed ? 'Not Completed' : 'Completed' }}
                </button>
            </form>
        </div>

        <div>
            <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded-full bg-red-500 text-white py-2 px-4 hover:bg-red-600">
                    Delete Task
                </button>
            </form>
        </div>
    </div>
</div>
@endsection