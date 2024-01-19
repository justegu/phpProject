<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Details</title>
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
            margin: 30px 0 ;
            text-align: center;
            font-family: 'Arial', sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 600px;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th[colspan="2"], td[colspan="2"] {
            text-align: center;
        }

        td.completed {
            color: green;
        }

        td.not-completed {
            color: red;
        }

        td.active {
            color: green;
        }

        td.not-active {
            color: red;
        }

        td a {
            background-color: #428bca;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            font-size: 12px;
            cursor: pointer;
        }

        td a:hover {
            background-color: #3277b3;
        }

        td a.delete {
            background-color: #ff0000;
        }

        td a.delete:hover {
            background-color: #cc0000;
        }

        .action-buttons {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .action-buttons a {
            background-color: #428bca;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            font-size: 12px;
            cursor: pointer;
            margin-right: 20px;
        }

        .action-buttons a.delete {
            background-color: #ff0000;
        }

        .action-buttons a:hover,
        .action-buttons a.delete:hover {
            background-color: #3277b3;
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
    <h1>Task Details</h1>
    <a href="/Paskaitos/todo_app/create">Create new</a>
</div>

<table>
    <tr>
        <td><strong>Task Name:</strong></td>
        <td>{$task->getTaskName()}</td>
    </tr>
    <tr>
        <td><strong>Task Description:</strong></td>
        <td>{$task->getTaskDescription()}</td>
    </tr>
    <tr>
        <td><strong>Created At:</strong></td>
        <td>{$task->getCreatedAt()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
    </tr>
    <tr>
        <td><strong>Updated At:</strong></td>
        <td>{$task->getUpdatedAt()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
    </tr>
    <tr>
        <td><strong>Status:</strong></td>
        {if $task->getStatus()}
            <td class="completed">Completed</td>
        {else}
            <td class="not-completed">Not completed</td>
        {/if}
    </tr>
    <tr>
        <td><strong>Active:</strong></td>
        {if $task->getActive()}
            <td class="active">Active</td>
        {else}
            <td class="not-active">Not active</td>
        {/if}
    </tr>
</table>


<div class="action-buttons">
    <a href="/Paskaitos/todo_app/edit/{$task->getTaskId()}">Edit task</a>
    <a href="/Paskaitos/todo_app/task/mark-as-completed//{$task->getTaskId()}">Edit status</a>
    <a href="/Paskaitos/todo_app/task/active/{$task->getTaskId()}">Edit active</a>
    <a href="/Paskaitos/todo_app/delete/{$task->getTaskId()}" class="delete">Delete</a>
</div>

<div class="back">
    <a href="/Paskaitos/todo_app/list" class="back-link">Back to list</a>
</div>
</body>
</html>
