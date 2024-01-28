@extends('layouts.app')

@section('styles')
<style>
    .error-message {
        color: red;
        font-size: 0.8rem;
    }
</style>
@endsection

@section('content')
<form action="{{ route('tasks.index') }}">
    @csrf
    <button type="submit" class="rounded-full bg-blue-500 text-white py-2 px-4 hover:bg-blue-600 ml-8">
        Home
    </button>
</form>
<div class="container mx-auto ">
    <form method="POST"
        action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}"
        class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
        @csrf
        @isset($task)
        @method('PUT')
        @endisset

        <div class="mb-4">
            <label for="title" class="block text-sm font-semibold mb-2">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500">
            @error('title')
            <p class='error-message mt-1'>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-semibold mb-2">Description</label>
            <textarea name="description" id="description" rows="5"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
            <p class='error-message mt-1'>{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_description" class="block text-sm font-semibold mb-2">Long Description</label>
            <textarea name="long_description" id="long_description" rows="5"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-500">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
            <p class='error-message mt-1'>{{ $message }}</p>
            @enderror
        </div>

        <div class="text-center">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-lg transition duration-300">
                {{ isset($task) ? 'Update Task' : 'Add Task' }}
            </button>
        </div>
    </form>
</div>
@endsection