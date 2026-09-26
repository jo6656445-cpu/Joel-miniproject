<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        .add-btn {
            display: inline-block;
            background: #000;
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #222;
            color: white;
            padding: 12px;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        .edit {
            background: orange;
            color: black;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 4px;
        }

        .delete {
            background: red;
            color: white;
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .complete {
            background: green;
            color: white;
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .empty {
            text-align: center;
            padding: 30px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Personal Task Manager</h1>

    <a href="{{ route('tasks.create') }}" class="add-btn">
        + Add Task
    </a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if($tasks->count() > 0)

        <table>

            <tr>
                <th>Task Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Actions</th>
            </tr>

            @foreach($tasks as $task)

                <tr>

                    <td>{{ $task->task_name }}</td>

                    <td>{{ $task->description }}</td>

                    <td>{{ $task->status }}</td>

                    <td>{{ $task->due_date }}</td>

                    <td>

                        <a href="{{ route('tasks.edit', $task->id) }}"
                           class="edit">
                            Edit
                        </a>

                        @if($task->status != 'Completed')

                            <form action="{{ route('tasks.complete', $task->id) }}"
                                  method="POST"
                                  style="display:inline;">

                                @csrf
                                @method('PUT')

                                <button type="submit" class="complete">
                                    Complete
                                </button>

                            </form>

                        @endif

                        <form action="{{ route('tasks.destroy', $task->id) }}"
                              method="POST"
                              style="display:inline;">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="delete">
                                Delete
                            </button>

                        </form>

                    </td>

                </tr>

            @endforeach

        </table>

    @else

        <div class="empty">
            <p>No tasks yet.</p>
            <p>Click <b>+ Add Task</b> to create your first task.</p>
        </div>

    @endif

</div>

</body>
</html>