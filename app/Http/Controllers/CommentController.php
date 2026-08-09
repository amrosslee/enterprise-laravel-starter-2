<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Requests\Comment\UpdateCommentRequest;
use App\Models\Comment;
use App\Services\CommentService;
use Inertia\Inertia;
use Inertia\Response;

class CommentController extends Controller
{
    public function __construct(private CommentService $commentService) {}

    public function index(): Response
    {
        return Inertia::render('Comments/Index', [
            'comments' => $this->commentService->paginateComments(15),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Comments/Create');
    }

    public function store(StoreCommentRequest $request)
    {
        $comment = $this->commentService->createComment($request->validated());

        return redirect()->route('comments.show', $comment)
            ->with('success', 'Comment created successfully.');
    }

    public function show(Comment $comment): Response
    {
        return Inertia::render('Comments/Show', ['comment' => $comment]);
    }

    public function edit(Comment $comment): Response
    {
        return Inertia::render('Comments/Edit', ['comment' => $comment]);
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $this->commentService->updateComment($comment->id, $request->validated());

        return redirect()->route('comments.show', $comment)
            ->with('success', 'Comment updated successfully.');
    }

    public function destroy(Comment $comment)
    {
        $this->commentService->deleteComment($comment->id);

        return redirect()->route('comments.index')
            ->with('success', 'Comment deleted successfully.');
    }
}
