<div class="form-container">
    <form method="post">
        <input type="hidden" name="section" value="task">
        <input type="hidden" name="edit_id" value="<?= htmlspecialchars($editIndex ?? '') ?>">
        <div class="form-grid">
            <div class="form-group">
                <label for="task_name">Task Name</label>
                <input type="text" id="task_name" name="task_name" required value="<?= htmlspecialchars($editData['name'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="project_id">Project</label>
                <select id="project_id" name="project_id">
                    <option value="">Select Project</option>
                    <?php foreach ($_SESSION['projects'] as $index => $project): ?>
                        <option value="<?= $index ?>" <?= (isset($editData) && $editData['project_id'] == $index) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($project['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="assigned_to">Assigned To</label>
                <input type="text" id="assigned_to" name="assigned_to" value="<?= htmlspecialchars($editData['assigned_to'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="task_status">Task Status</label>
                <select id="task_status" name="task_status">
                    <option value="To Do" <?= (isset($editData) && $editData['task_status'] === 'To Do' ? 'selected' : '' ?>>To Do</option>
                    <option value="In Progress" <?= (isset($editData) && $editData['task_status'] === 'In Progress' ? 'selected' : '' ?>>In Progress</option>
                    <option value="Done" <?= (isset($editData) && $editData['task_status'] === 'Done' ? 'selected' : '' ?>>Done</option>
                    <option value="Review" <?= (isset($editData) && $editData['task_status'] === 'Review' ? 'selected' : '' ?>>Review</option>
                </select>
            </div>
            <div class="form-group">
                <label for="estimated_time">Estimated Time (hours)</label>
                <input type="number" id="estimated_time" name="estimated_time" value="<?= htmlspecialchars($editData['estimated_time'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="date" id="deadline" name="deadline" value="<?= htmlspecialchars($editData['deadline'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea id="notes" name="notes"><?= htmlspecialchars($editData['notes'] ?? '') ?></textarea>
            </div>
        </div>
        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary"><?= isset($editData) && $editSection === 'task' ? 'Update Task' : 'Add Task' ?></button>
            <?php if (isset($editData) && $editSection === 'task'): ?>
                <a href="<?= $_SERVER['PHP_SELF'] ?>?tab=tasks" class="btn btn-danger">Cancel Edit</a>
            <?php else: ?>
                <button type="reset" class="btn btn-danger">Clear Form</button>
            <?php endif; ?>
        </div>
    </form>
</div>

<div class="search-container">
    <form method="post" style="width: 100%; display: flex; gap: 10px;">
        <input type="text" name="search_term" placeholder="Search tasks..." value="<?= htmlspecialchars($searchTerm ?? '') ?>">
        <button type="submit" name="search" class="btn btn-primary">Search</button>
        <?php if (!empty($searchTerm)): ?>
            <a href="<?= $_SERVER['PHP_SELF'] ?>?tab=tasks" class="btn btn-danger">Clear Search</a>
        <?php endif; ?>
    </form>
</div>