<div class="form-container">
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="section" value="project">
        <input type="hidden" name="edit_id" value="<?= htmlspecialchars($editIndex ?? '') ?>">
        <div class="form-grid">
            <div class="form-group">
                <label for="project_name">Project Name</label>
                <input type="text" id="project_name" name="project_name" required value="<?= htmlspecialchars($editData['name'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="client">Client Name</label>
                <input type="text" id="client" name="client" value="<?= htmlspecialchars($editData['client'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="manager">Project Manager</label>
                <input type="text" id="manager" name="manager" value="<?= htmlspecialchars($editData['manager'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="date" id="start_date" name="start_date" value="<?= htmlspecialchars($editData['start_date'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="date" id="end_date" name="end_date" value="<?= htmlspecialchars($editData['end_date'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="priority">Priority</label>
                <select id="priority" name="priority">
                    <option value="Low" <?= (isset($editData) && $editData['priority'] === 'Low' ? 'selected' : '' ?>>Low</option>
                    <option value="Medium" <?= (isset($editData) && $editData['priority'] === 'Medium' ? 'selected' : '' ?>>Medium</option>
                    <option value="High" <?= (isset($editData) && $editData['priority'] === 'High' ? 'selected' : '' ?>>High</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="Not Started" <?= (isset($editData) && $editData['status'] === 'Not Started' ? 'selected' : '' ?>>Not Started</option>
                    <option value="In Progress" <?= (isset($editData) && $editData['status'] === 'In Progress' ? 'selected' : '' ?>>In Progress</option>
                    <option value="Completed" <?= (isset($editData) && $editData['status'] === 'Completed' ? 'selected' : '' ?>>Completed</option>
                    <option value="On Hold" <?= (isset($editData) && $editData['status'] === 'On Hold' ? 'selected' : '' ?>>On Hold</option>
                </select>
            </div>
            <div class="form-group">
                <label for="github">GitHub Link</label>
                <input type="url" id="github" name="github" value="<?= htmlspecialchars($editData['github'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <input type="text" id="tags" name="tags" value="<?= htmlspecialchars($editData['tags'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="budget">Budget</label>
                <input type="number" id="budget" name="budget" step="0.01" value="<?= htmlspecialchars($editData['budget'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="type">Project Type</label>
                <select id="type" name="type">
                    <option value="Web" <?= (isset($editData) && $editData['type'] === 'Web' ? 'selected' : '' ?>>Web</option>
                    <option value="App" <?= (isset($editData) && $editData['type'] === 'App' ? 'selected' : '' ?>>App</option>
                    <option value="Design" <?= (isset($editData) && $editData['type'] === 'Design' ? 'selected' : '' ?>>Design</option>
                </select>
            </div>
            <div class="form-group">
                <label for="progress">Progress (%)</label>
                <input type="number" id="progress" name="progress" min="0" max="100" value="<?= htmlspecialchars($editData['progress'] ?? '0') ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description"><?= htmlspecialchars($editData['description'] ?? '') ?></textarea>
            </div>
            <div class="form-group">
                <label for="feedback">Client Feedback</label>
                <textarea id="feedback" name="feedback"><?= htmlspecialchars($editData['feedback'] ?? '') ?></textarea>
            </div>
            <div class="checkbox-group">
                <input type="checkbox" id="notifications" name="notifications" <?= (isset($editData) && $editData['notifications'] === 'Yes' ? 'checked' : '' ?>>
                <label for="notifications">Enable Notifications</label>
            </div>
        </div>
        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary"><?= isset($editData) && $editSection === 'project' ? 'Update Project' : 'Add Project' ?></button>
            <?php if (isset($editData) && $editSection === 'project'): ?>
                <a href="<?= $_SERVER['PHP_SELF'] ?>?tab=projects" class="btn btn-danger">Cancel Edit</a>
            <?php else: ?>
                <button type="reset" class="btn btn-danger">Clear Form</button>
            <?php endif; ?>
        </div>
    </form>
</div>

<div class="search-container">
    <form method="post" style="width: 100%; display: flex; gap: 10px;">
        <input type="text" name="search_term" placeholder="Search projects..." value="<?= htmlspecialchars($searchTerm ?? '') ?>">
        <button type="submit" name="search" class="btn btn-primary">Search</button>
        <?php if (!empty($searchTerm)): ?>
            <a href="<?= $_SERVER['PHP_SELF'] ?>?tab=projects" class="btn btn-danger">Clear Search</a>
        <?php endif; ?>
    </form>
</div>