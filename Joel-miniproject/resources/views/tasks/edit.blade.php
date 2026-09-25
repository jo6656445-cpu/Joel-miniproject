<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f8; padding: 30px; }
        .container { max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 10px; }
        input, textarea, select { width: 100%; padding: 10px; margin-top: 5px; margin-bottom: 15px; box-sizing: border-box; }
        button { background: #2563eb; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer; }
        a { text-decoration: none; color: #2563eb; }
        .error { color: #dc2626; }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit Task</h1>

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="task_name">Task Name</label>
        <input id="task_name" type="text" name="task_name" value="{{ old('task_name', $task->task_name) }}" required>

        <label for="description">Description</label>
        <textarea id="description" name="description" rows="5">{{ old('description', $task->description) }}</textarea>

        <label for="status">Status</label>
        <select id="status" name="status">
            <option value="Pending" @selected(old('status', $task->status) === 'Pending')>Pending</option>
            <option value="Completed" @selected(old('status', $task->status) === 'Completed')>Completed</option>
        </select>

        <label for="due_date">Due Date</label>
        <input id="due_date" type="date" name="due_date" value="{{ old('due_date', optional($task->due_date)->format('Y-m-d')) }}">

        <button type="submit">Update Task</button>
    </form>

    <p><a href="{{ route('tasks.index') }}">Back to Tasks</a></p>
</div>
</body>
</html>