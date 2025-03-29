<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h1 {
            text-align: center;
        }
        form {
            display: flex;
            margin-bottom: 20px;
        }
        input[type="text"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            display: flex;
            align-items: center;
            background: #e8f0fe;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 5px;
            justify-content: space-between;
        }
        .completed {
            text-decoration: line-through;
            color: gray;
        }
        .delete-btn {
            background-color: red;
        }
        .task-header {
            display: flex;
            justify-content: space-between;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>To-Do List</h1>
        
        <form action="/tasks" method="POST">
            @csrf
            <input type="text" name="title" placeholder="New Task" required>
            <button type="submit">Add</button>
        </form>

        <div class="task-header">
            <span>Completed</span>
            <span>Task Name</span>
            <span>Delete</span>
        </div>

        <ul>
            @foreach ($tasks as $task)
                <li class="{{ $task->completed ? 'completed' : '' }}">
                    <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit">{{ $task->completed ? '✅' : '⭕' }}</button>
                    </form>
                    {{ $task->title }}
                    <form action="/tasks/{{ $task->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">❌</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>