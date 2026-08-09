<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Models\Project;
use App\Services\ProjectService;
use Inertia\Inertia;
use Inertia\Response;

class ProjectController extends Controller
{
    public function __construct(private ProjectService $projectService) {}

    public function index(): Response
    {
        // dd($this->projectService->paginateProjects(15)->items());
        return Inertia::render('Projects/Index', [
            'projects' => $this->projectService
                ->paginateProjectsWithRelationships(15, [
                    'comments', 'files', 'tasks'
                ]),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Projects/Create');
    }

    public function store(StoreProjectRequest $request)
    {
        $project = $this->projectService->createProject($request->validated());

        return redirect()->route('projects.show', $project)
            ->with('success', 'Project created successfully.');
    }

    public function show(Project $project): Response
    {
        return Inertia::render('Projects/Show', ['project' => $project]);
    }

    public function edit(Project $project): Response
    {
        return Inertia::render('Projects/Edit', ['project' => $project]);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->projectService->updateProject($project->id, $request->validated());

        return redirect()->route('projects.show', $project)
            ->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $this->projectService->deleteProject($project->id);

        return redirect()->route('projects.index')
            ->with('success', 'Project deleted successfully.');
    }
}
