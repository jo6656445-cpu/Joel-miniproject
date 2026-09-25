<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Task Manager</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .add-btn {
            background: #2563eb;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 6px;
        }

        .success {
            background: #d1fae5;
            color: #065f46;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        .table-container {
            background: white;
            border-radius: 8px;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #2563eb;
            color: white;
            padding: 14px;
            text-align: left;
        }

        td {
            padding: 14px;
            border-bottom: 1px solid #ddd;
        }

        .complete {
            color: green;
            font-weight: bold;
        }

        .pending {
            color: orange;
            font-weight: bold;
        }

        .edit {
            background: #f59e0b;
            color: white;
            padding: 7px 12px;
            text-decoration: none;
            border-radius: 5px;
        }

        .delete {
            background: #dc2626;
            color: white;
            padding: 7px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .status {
            background: #16a34a;
            color: white;
            padding: 7px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form {
            display: inline;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #777;
        }

        .actions {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Personal Task Manager</h1>

    @if(session('success'))

        <div class="success">
            {{ session('success') }}
        </div>

    @endif

    <div class="top">

        <h2>My Tasks</h2>

        <a href="/tasks/create" class="add-btn">
            + Add Task
        </a>

    </div>

    <div class="table-container">

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Due Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                @forelse($tasks as $task)

                    <tr>

                        <td>
                            {{ $task->id }}
                        </td>

                        <td>
                            {{ $task->task_name }}
                        </td>

                        <td>
                            {{ $task->description ?? 'No description' }}
                        </td>

                        <td>

                            @if($task->status == 'Completed')

                                <span class="complete">
                                    Completed
                                </span>

                            @else

                                <span class="pending">
                                    Pending
                                </span>

                            @endif

                        </td>

                        <td>
                            {{ $task->due_date ?? 'No date' }}
                        </td>

                        <td>

                            <div class="actions">

                                {{-- EDIT --}}
                                <a
                                    href="/tasks/{{ $task->id }}/edit"
                                    class="edit">
                                    Edit
                                </a>


                                {{-- DELETE --}}
                                <form
                                    action="/tasks/{{ $task->id }}"
                                    method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="delete"
                                        onclick="return confirm('Are you sure you want to delete this task?')">

                                        Delete

                                    </button>

                                </form>


                                {{-- COMPLETE / PENDING --}}
                                <form
                                    action="/tasks/{{ $task->id }}/status"
                                    method="POST">

                                    @csrf
                                    @method('PUT')

                                    @if($task->status == 'Pending')

                                        <input
                                            type="hidden"
                                            name="status"
                                            value="Completed">

                                        <button
                                            type="submit"
                                            class="status">

                                            Complete

                                        </button>

                                    @else

                                        <input
                                            type="hidden"
                                            name="status"
                                            value="Pending">

                                        <button
                                            type="submit"
                                            class="status">

                                            Set Pending

                                        </button>

                                    @endif

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="empty">

                            No tasks found.
                            Click "Add Task" to create your first task.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</body>

</html>