<h1>Task List</h1>

<div>
    {foreach from=$list item=$task}
        <h2>{$task->getTaskName()}</h2>
    {/foreach}
</div>