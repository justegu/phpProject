<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
        }

        .header {
            background-color: #333;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header a {
            text-decoration: none;
            color: #fff;
            margin-right: 10px;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .header a:hover {
            background-color: #555;
        }

        h1 {
            color: #fff;
            font-size: 2em;
            margin: 30px 0;
            text-align: center;
            font-family: 'Arial', sans-serif;
        }

        .form-container {
            max-width: 400px;
            margin: 30px auto;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
        }

        .form-container input[type="text"],
        .form-container select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #45a049;
        }

        .back {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .back-link {
            color: black;
            border: none;
            padding: 15px 50px;
            text-align: center;
            display: inline-block;
            font-size: 18px;
            margin: 150px auto 0;
            cursor: pointer;
        }

        .back-link:hover {
            color: darkgrey;
        }
    </style>
</head>
<body>
<div class="header">
    <div>
        <a href="/Paskaitos/todo_app/">Home</a>
        <a href="/Paskaitos/todo_app/list">List</a>
    </div>
    <h1>Create Task</h1>
    <a href="/Paskaitos/todo_app/create">Create new</a>
</div>

<div class="form-container">
    <form method="POST" action="/Paskaitos/todo_app/store">
        <label for="task_name">Task Name:</label>
        <input type="text" id="task_name" name="task_name" placeholder="Task Name">

        <label for="task_description">Task Description:</label>
        <input type="text" id="task_description" name="task_description" placeholder="Task Description">

        <label for="status">Task status:</label>
        <select name="status" id="status">
            <option value="not_completed" selected>Not Completed</option>
            <option value="completed">Completed</option>
        </select>

        <label for="active">Task activity:</label>
        <select name="active" id="active">
            <option value="active">Active</option>
            <option value="not_active">Not Active</option>
        </select>

        <button type="submit">Create</button>
    </form>
</div>

<div class="back">
    <a href="/Paskaitos/todo_app/list" class="back-link">Back to list</a>
</div>
</body>
</html>
