<?php
$this->layout('Layout', ['mainContent' => $this->fetch('Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>

<h3 class="mb-4">My Todo List</h3>

<form action="/task/create" method="POST" class="mb-3">
    <input type="text" name="title" class="form-control" placeholder="Add a task..." required>
    <button type="submit" class="btn btn-success mt-2 w-100">Add Task</button>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Task</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= htmlspecialchars($task['title']) ?></td>
                <td>
                    <a href="/task/update/<?= $task['id'] ?>" class="btn btn-sm btn-primary">Update</a>
                    <a href="/task/delete/<?= $task['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
$this->stop();
?>