<div>
    <div style="background-color: #333; padding: 10px;">
        <a href="/Paskaitos/todo_app/list" style="text-decoration: none; color: #fff; margin-right: 10px;">List</a>
        <a href="/Paskaitos/todo_app/store" style="text-decoration: none; color: #fff; margin-right: 10px;">Store</a>
        <a href="/Paskaitos/todo_app/create" style="text-decoration: none; color: #fff; margin-right: 10px;">Create</a>
        <a href="/Paskaitos/todo_app/task" style="text-decoration: none; color: #fff; margin-right: 10px;">Task</a>
    </div>
    <div style="margin: 30px 0 60px; text-align: center;">
        <h1 style="color: #333; font-family: 'Arial', sans-serif;">Tasks List</h1>
    </div>

    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
        <tr>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">ID</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Task Name</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Task Description</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Created At</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Updated At</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Status</th>
            <th style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Active</th>
            <th colspan="4" style="border: 1px solid #ddd; padding: 8px; background-color: #f2f2f2;">Action</th>
        </tr>
        </thead>
        <tbody>
        {foreach $list as $task}
            <tr style="background-color: {if !$task->getActive()}#888{/if};">
                <td style="border: 1px solid #ddd; padding: 8px;">{$task->getTaskId()}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{$task->getTaskName()}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{$task->getTaskDescription()}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{$task->getCreatedAt()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">{$task->getUpdatedAt()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
                <td style="border: 1px solid #ddd; padding: 8px;">
                    {if $task->getStatus()}
                        <span style="color: green;">Completed</span>
                    {else}
                        <span style="color: red;">Not completed</span>
                    {/if}
                </td>
                <td style="border: 1px solid #ddd; padding: 8px;">{if $task->getActive()}Yes{else}No{/if}</td>

                <td style="text-align: center; border: 1px solid #ddd; padding: 8px;">
                    <a href="/Paskaitos/todo_app/edit/{$task->getTaskId()}" style="background-color: #428bca; color: white; border: none; padding: 5px 10px; text-align: center; text-decoration: none; display: inline-block; font-size: 12px; margin: 0 auto; cursor: pointer;">Edit task</a>
                </td>

                <td style="text-align: center; border: 1px solid #ddd; padding: 8px;"><button style="background-color: #4caf50; color: white; border: none; padding: 5px 10px; text-align: center; text-decoration: none; display: inline-block; font-size: 12px; margin: 0 auto; cursor: pointer;">Edit status</button></td>
                <td style="text-align: center; border: 1px solid #ddd; padding: 8px;"><button style="background-color: #4caf50; color: white; border: none; padding: 5px 10px; text-align: center; text-decoration: none; display: inline-block; font-size: 12px;  margin: 0 auto; cursor: pointer;">Edit active</button></td>
                <td style="text-align: center; border: 1px solid #ddd; padding: 8px;">
                    <a href="/Paskaitos/todo_app/delete/{$task->getTaskId()}" style="background-color: #ff0000; color: white; border: none; padding: 5px 10px; text-align: center; text-decoration: none; display: inline-block; font-size: 12px;  margin: 0 auto; cursor: pointer;">Delete</a>
                </td>

            </tr>
        {/foreach}
        </tbody>
    </table>

</div>




