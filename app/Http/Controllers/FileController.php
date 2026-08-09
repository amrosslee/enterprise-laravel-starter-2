<?php

namespace App\Http\Controllers;

use App\Http\Requests\File\StoreFileRequest;
use App\Http\Requests\File\UpdateFileRequest;
use App\Models\File;
use App\Services\FileService;
use Inertia\Inertia;
use Inertia\Response;

class FileController extends Controller
{
    public function __construct(private FileService $fileService) {}

    public function index(): Response
    {
        return Inertia::render('Files/Index', [
            'files' => $this->fileService->paginateFiles(15),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Files/Create');
    }

    public function store(StoreFileRequest $request)
    {
        $file = $this->fileService->createFile($request->validated());

        return redirect()->route('files.show', $file)
            ->with('success', 'File created successfully.');
    }

    public function show(File $file): Response
    {
        return Inertia::render('Files/Show', ['file' => $file]);
    }

    public function edit(File $file): Response
    {
        return Inertia::render('Files/Edit', ['file' => $file]);
    }

    public function update(UpdateFileRequest $request, File $file)
    {
        $this->fileService->updateFile($file->id, $request->validated());

        return redirect()->route('files.show', $file)
            ->with('success', 'File updated successfully.');
    }

    public function destroy(File $file)
    {
        $this->fileService->deleteFile($file->id);

        return redirect()->route('files.index')
            ->with('success', 'File deleted successfully.');
    }
}
