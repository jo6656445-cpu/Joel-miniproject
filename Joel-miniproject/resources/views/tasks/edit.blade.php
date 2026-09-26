<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            box-sizing: border-box;
        }

        button, a {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
        }

        button {
            background: #3498db;
            color: white;
            cursor: pointer;
        }

        .back {
            background: #ddd;
            color: black;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Edit Task</h1>

    @if($errors->any())

        @foreach($errors->all() as $error)

            <p style="color:red;">
                {{ $error }}
            </p>

        @endforeach

    @endif

    <form action="{{ route('tasks.update', $task->id) }}"
          method="POST">

        @csrf

        @method('PUT')

        <label>Task Name</label>

        <input type="text"
               name="task_name"
               value="{{ $task->task_name }}"
               required>

        <label>Description</label>

        <textarea name="description">{{ $task->description }}</textarea>

        <label>Status</label>

        <select name="status">

            <option value="Pending"
                {{ $task->status == 'Pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="Completed"
                {{ $task->status == 'Completed' ? 'selected' : '' }}>
                Completed
            </option>

        </select>

        <label>Due Date</label>

        <input type="date"
               name="due_date"
               value="{{ $task->due_date }}">

        <button type="submit">
            Update Task
        </button>

        <a href="{{ route('tasks.index') }}"
           class="back">
            Back to Tasks
        </a>

    </form>

</div>

</body>
</html>