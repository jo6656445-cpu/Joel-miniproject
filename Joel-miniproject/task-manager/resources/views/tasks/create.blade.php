<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 40px;
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
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background: black;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Add Task</h1>

    <form method="POST" action="/tasks">
    @csrf

        <label>Task Name</label>
        <input type="text" name="task_name" required>

        <label>Description</label>
        <textarea name="description"></textarea>

        <label>Due Date</label>
        <input type="date" name="due_date">

        <button type="submit">Save Task</button>

    </form>

    <a href="{{ route('tasks.index') }}" class="back">
        ← Back to Tasks
    </a>

</div>

</body>
</html>