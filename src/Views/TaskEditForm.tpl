<div>
    <div style="background-color: #333; padding: 10px;">
        <a href="/Paskaitos/todo_app/list" style="text-decoration: none; color: #fff; margin-right: 10px;">List</a>
        <a href="/Paskaitos/todo_app/store" style="text-decoration: none; color: #fff; margin-right: 10px;">Store</a>
        <a href="/Paskaitos/todo_app/create" style="text-decoration: none; color: #fff; margin-right: 10px;">Create</a>
        <a href="/Paskaitos/todo_app/task" style="text-decoration: none; color: #fff; margin-right: 10px;">Task</a>
    </div>
    <div style="margin: 30px 0 60px; text-align: center;">
        <h1 style="color: #333; font-family: 'Arial', sans-serif;">Edit Task</h1>
    </div>
</div>
<div style="margin-bottom: 20px;">
    <form method="POST" action="/Paskaitos/todo_app/update/{$task->getTaskId()}" style="max-width: 400px; margin: 0 auto; padding: 10px; border: 1px solid #ddd; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <input type="hidden" name="id" value="{$task->getTaskId()}">

        <input type="text"  id="task_name"  name="task_name" placeholder="Task Name" value="{$task->getTaskName()}" style="width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
        <input type="text"  id="task_description"  name="task_description" placeholder="Task Description" value="{$task->getTaskDescription()}" style="width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">

        <label for="status">Status:</label>
        <select name="status" id="status" style="width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
            <option value="not_completed" selected>Not Completed</option>
            <option value="completed">Completed</option>
        </select>

        <label for="active">Active:</label>
        <select name="active" id="active" style="width: 100%; padding: 8px; margin-bottom: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;">
            <option value="active">Active</option>
            <option value="not_active">Not Active</option>
        </select>

        <button type="submit" style="background-color: #4CAF50; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;">Update</button>
    </form>
</div>
