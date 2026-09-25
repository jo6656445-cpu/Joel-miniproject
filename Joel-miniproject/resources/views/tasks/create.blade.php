<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button {
            margin-top: 20px;
            background: #2563eb;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #1d4ed8;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            color: #2563eb;
            text-decoration: none;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .error p {
            margin: 5px 0;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Add Task</h1>

    @if($errors->any())

        <div class="error">

            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach

        </div>

    @endif

    <form action="/tasks" method="POST">
        @csrf

        <label for="task_name">Task Name</label>

        <input
            type="text"
            id="task_name"
            name="task_name"
            placeholder="Enter task name"
            value="{{ old('task_name') }}"
            required
        >

        <label for="description">Description</label>

        <textarea
            id="description"
            name="description"
            rows="5"
            placeholder="Enter task description"
        >{{ old('description') }}</textarea>

        <label for="status">Status</label>

        <select id="status" name="status">

            <option value="Pending"
                {{ old('status') == 'Pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="Completed"
                {{ old('status') == 'Completed' ? 'selected' : '' }}>
                Completed
            </option>

        </select>

        <label for="due_date">Due Date</label>

        <input
            type="date"
            id="due_date"
            name="due_date"
            value="{{ old('due_date') }}"
        >

        <button type="submit">
            Save Task
        </button>

    </form>

<a href="/tasks" class="back">

</div>

</body>

</html>