<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks List</title>
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
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            background-color: #f2f2f2;
        }

        th[colspan="4"], td[colspan="4"] {
            background-color: #f2f2f2;
            text-align: center;
        }

        tbody tr {
            background-color: #888;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr.not-active td {
            background-color: darkgrey;
        }

        td a {
            background-color: #428bca;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            margin: 0 auto;
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

        span.completed {
            color: green;
        }

        span.not-completed {
            color: red;
        }

        span.active {
            color: green;
        }

        span.not-active {
            color: lightgrey;
        }
    </style>
</head>
<body>
    <div class="header">
        <div>
            <a href="/Paskaitos/todo_app/">Home</a>
            <a href="/Paskaitos/todo_app/list">List</a>
        </div>
        <h1>Tasks List</h1>
        <a href="/Paskaitos/todo_app/create">Create new</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Task Name</th>
                <th>Task Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Status</th>
                <th>Active</th>
                <th colspan="4">Action</th>
            </tr>
        </thead>
        <tbody>
            {foreach $list as $task}
                <tr {if !$task->getActive()}class="not-active"{/if}>
                    <td>{$task->getTaskId()}</td>
                    <td>{$task->getTaskName()}</td>
                    <td>{$task->getTaskDescription()}</td>
                    <td>{$task->getCreatedAt()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
                    <td>{$task->getUpdatedAt()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
                    <td>
                        {if $task->getStatus()}
                            <span class="completed">Completed</span>
                        {else}
                            <span class="not-completed">Not completed</span>
                        {/if}
                    </td>
                    <td>
                        {if $task->getActive()}
                            <span class="active">Active</span>
                        {else}
                            <span class="not-active">Not active</span>
                        {/if}
                    </td>
                    <td>
                        <a href="/Paskaitos/todo_app/task/{$task->getTaskId()}">Task details</a>
                    </td>
                    <td>
                        <a href="/Paskaitos/todo_app/mark-as-completed/{$task->getTaskId()}">Edit status</a>
                    </td>
                    <td>
                        <a href="/Paskaitos/todo_app/active/{$task->getTaskId()}">Edit active</a>
                    </td

                    >
                    <td>
                        <a href="/Paskaitos/todo_app/delete/{$task->getTaskId()}" class="delete">Delete</a>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</body>
</html>
