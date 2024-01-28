@extends('layouts.app')
<h1 class="text-3xl"> Blog Posts </h1>
<nav class='mb-4 mt-4'>
    <a href="{{route('tasks.create')}}"
        class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full shadow-md hover:shadow-lg '>Add
        Task</a>
</nav>
@forelse ($tasks as $task)
<div>
    <li class="py-2">
        <a href="{{ route('tasks.show',['task'=>$task])}}"
            class='text-black transition duration-500 hover:shadow-md hover:bg-blue-200 px-2 py-1 rounded-lg'>
            {{$task->title}}
        </a>

    </li>
</div>
@empty
<p>There are no tasks</p>
@endforelse


@if ($tasks->count())
<nav>
    {{$tasks->links()}}
</nav>
@endif
<div class="py-48 px-48">
    Developed by @ig Raisah3b
</div>