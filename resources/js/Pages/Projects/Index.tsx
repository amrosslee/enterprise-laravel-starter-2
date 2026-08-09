
import React from "react";
import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import { dashboard } from '@/routes';
import { Head } from "@inertiajs/react";
import Dashboard from "../dashboard";

interface Project {
    data: {
        id: number;
        title: string;
        description?: string;
        status?: string;
        start_date?: string;
        deadline?: string;
        owner_id?: number;
        tasks_count: number;
        files_count: number;
        comments_count: number;
        created_at?: string;
    };
}
interface Task {
    id: number;
    title: string;
    description?: string;
    status?: string;
    project_id?: number;
}

interface Props {
    projects: Project[];
}

export default function Index({ projects }: Props) {
    // console.log("Projects:", projects);
    return (
        <>
            <Head title="Projects" />

            <div className="mx-auto max-w-7xl p-6">
                <div className="mb-8 flex items-center justify-between">
                    <div>
                        <h1 className="text-3xl font-bold text-gray-900">
                            Projects
                        </h1>
                        <p className="mt-1 text-sm text-gray-500">
                            Overview of all projects and their resources.
                        </p>
                    </div>

                    <div className="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white">
                        {projects.length} Projects
                    </div>
                </div>

                {projects.length === 0 ? (
                    <div className="rounded-xl border border-dashed border-gray-300 p-12 text-center">
                        <p className="text-gray-500">
                            No projects found.
                        </p>
                    </div>
                ) : (
                    <div className="grid md:gap-2 xl:gap-4 md:grid-cols-3 xl:grid-cols-4">
                        {projects.data.map((project) => (
                            <div
                                key={project.id}
                                className="rounded-xl border bg-white shadow-sm transition hover:shadow-lg"
                            >
                                <div className="border-b p-5">
                                    <div className="flex items-start justify-between">
                                        <div>
                                            <h2 className="text-lg font-semibold text-gray-900">
                                                {project.title.substring(0, 30)}
                                            </h2>

                                            {project.description && (
                                                <p className="mt-2 line-clamp-2 text-sm text-gray-500">
                                                    {project.description.trim().substring(0, 100)}
                                                </p>
                                            )}
                                        </div>

                                        {project.status && (
                                            <span className="rounded-full bg-green-100 px-3 py-1 text-xs font-medium text-green-700">
                                                {project.status}
                                            </span>
                                        )}
                                    </div>
                                </div>

                                {/* <div className="grid grid-cols-3 divide-x text-center">
                                    <div className="p-4 grid grid-rows-2 gap-1 divide-y">
                                        <p className="text-2xl font-bold text-indigo-600">
                                            {project.tasks.length}
                                        </p>
                                        <p className="mt-1 text-xs uppercase tracking-wide text-gray-500">
                                            Tasks
                                        </p>
                                        <p>
                                            {project.tasks.map((task) => (
                                                <span key={task.id} className="text-sm text-gray-500">
                                                    {task.title}
                                                </span>
                                            ))}
                                        </p>
                                    </div>

                                    <div className="p-4 grid grid-rows-2 gap-1 divide-y">
                                        <p className="text-2xl font-bold text-emerald-600">
                                            {project.files.length}
                                        </p>
                                        <p className="mt-1 text-xs uppercase tracking-wide text-gray-500">
                                            Files
                                        </p>
                                        <p>
                                            {project.files.map((file) => (
                                                <span key={file.id} className="text-sm text-gray-500">
                                                    <a href={file.url} target="_blank" rel="noopener noreferrer" className="text-blue-500 hover:underline block">
                                                        {file.name}
                                                    </a>
                                                </span>
                                            ))}
                                        </p>
                                    </div>

                                    <div className="p-4 grid grid-rows-2 gap-1 divide-y">
                                        <p className="text-2xl font-bold text-orange-600">
                                            {project.comments.length}
                                        </p>
                                        <p className="mt-1 text-xs uppercase tracking-wide text-gray-500">
                                            Comments
                                        </p>
                                        <p>
                                            {project.comments.map((comment) => (
                                                <span key={comment.id} className="text-sm text-gray-500 border border-gray-300 rounded block">
                                                    {comment.content.substring(0, 30)}
                                                </span>
                                            ))}
                                        </p>
                                    </div>
                                </div> */}

                                <div className="border-t px-5 py-3 text-sm text-gray-500">
                                    Dead line: {project.deadline ? new Date(project.deadline).toLocaleDateString('en-UK', {'weekday': 'long', 'year': 'numeric', 'month': 'long', 'day': 'numeric'}) : 'N/A'}
                                </div>
                                <div className="grid grid-cols-3">
                                    <div className="border-t px-5 py-3 text-sm text-blue-500">
                                        {project.comments.length} <br/> Comments
                                    </div>
                                    <div className="border-t px-5 py-3 text-sm text-green-500">
                                        {project.files.length} <br/> Files
                                    </div>
                                    <div className="border-t px-5 py-3 text-sm text-indigo-500 grid-end">
                                        {project.tasks.length} <br/> Tasks
                                    </div>
                                </div>
                                <div className="border-t px-5 py-3 text-sm text-gray-500">
                                    Created at: {new Date(project.created_at).toLocaleDateString()}
                                </div>
                            </div>
                        ))}
                    </div>
                )}
            </div>
            <div className="mx-auto max-w-7xl p-6">
                {/* Pagination */}
                <div className="mt-6 flex justify-center">
                    {projects.links.map((link, index) => (
                        <a
                            key={index}
                            href={link.url || '#'}
                            className={`mx-1 rounded px-3 py-1 text-sm font-medium ${
                                link.active
                                    ? 'bg-indigo-600 text-white'
                                    : 'bg-white text-gray-700 hover:bg-gray-100'
                            }`}
                            dangerouslySetInnerHTML={{ __html: link.label }}
                        />
                    ))}
                </div>
            </div>
        </>
    );
}

Dashboard.layout = {
            breadcrumbs: [
                {
                    title: 'Dashboard',
                    href: dashboard(),
                    },
                    ],
                    };
