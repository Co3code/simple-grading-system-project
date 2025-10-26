<?php
$this->layout('Layout', ['mainContent' => $this->fetch('Layout')]);
$this->start('mainContent');
?>

<h3 class="mb-4">Update Task</h3>

<form action="/task/update" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($task['id']) ?>">
    <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($task['title']) ?>" required>
    <button type="submit" class="btn btn-primary w-100 mt-2" name="update">Update</button>
</form>

<?php $this->stop() ?>