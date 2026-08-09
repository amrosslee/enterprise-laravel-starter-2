<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use App\Services\TaskService;
use Inertia\Inertia;
use Inertia\Response;

class TaskController extends Controller
{
    public function __construct(private TaskService $taskService) {}

    public function index(): Response
    {
        return Inertia::render('Tasks/Index', [
            'tasks' => $this->taskService->paginateTasks(15),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Tasks/Create');
    }

    public function store(StoreTaskRequest $request)
    {
        $task = $this->taskService->createTask($request->validated());

        return redirect()->route('tasks.show', $task)
            ->with('success', 'Task created successfully.');
    }

    public function show(Task $task): Response
    {
        return Inertia::render('Tasks/Show', ['task' => $task]);
    }

    public function edit(Task $task): Response
    {
        return Inertia::render('Tasks/Edit', ['task' => $task]);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->taskService->updateTask($task->id, $request->validated());

        return redirect()->route('tasks.show', $task)
            ->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $this->taskService->deleteTask($task->id);

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }
}
