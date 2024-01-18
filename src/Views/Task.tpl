<div>
    <div style="background-color: #333; padding: 10px;">
        <a href="/Paskaitos/todo_app/list" style="text-decoration: none; color: #fff; margin-right: 10px;">List</a>
        <a href="/Paskaitos/todo_app/store" style="text-decoration: none; color: #fff; margin-right: 10px;">Store</a>
        <a href="/Paskaitos/todo_app/create" style="text-decoration: none; color: #fff; margin-right: 10px;">Create</a>
        <a href="/Paskaitos/todo_app/task" style="text-decoration: none; color: #fff; margin-right: 10px;">Task</a>
    </div>
    <div style="margin: 30px 0 60px; text-align: center;">
        <h1 style="color: #333; font-family: 'Arial', sans-serif;">Task Details</h1>
    </div>


    <table style="border-collapse: collapse; width: 600px; margin: 20px auto;">
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;"><strong>Task Name:</strong></td>
            <td style="border: 1px solid #ddd; padding: 8px;">{$task->getTaskName()}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;"><strong>Task Description:</strong></td>
            <td style="border: 1px solid #ddd; padding: 8px;">{$task->getTaskDescription()}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;"><strong>Created At:</strong></td>
            <td style="border: 1px solid #ddd; padding: 8px;">{$task->getCreatedAt()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;"><strong>Updated At:</strong></td>
            <td style="border: 1px solid #ddd; padding: 8px;">{$task->getUpdatedAt()|date_format:"%Y-%m-%d %H:%M:%S"}</td>
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;"><strong>Status:</strong></td>
            {if $task->getStatus()}
                <td style="border: 1px solid #ddd; padding: 8px; color: green;">Completed</td>
            {else}
                <td style="border: 1px solid #ddd; padding: 8px; color: red;">Not completed</td>
            {/if}
        </tr>
        <tr>
            <td style="border: 1px solid #ddd; padding: 8px;"><strong>Active:</strong></td>
            <td style="border: 1px solid #ddd; padding: 8px;">{if $task->getActive()}Yes{else}No{/if}</td>
        </tr>
    </table>


</div>
