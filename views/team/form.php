<div class="form-container">
    <form method="post">
        <input type="hidden" name="section" value="team">
        <input type="hidden" name="edit_id" value="<?= htmlspecialchars($editIndex ?? '') ?>">
        <div class="form-grid">
            <div class="form-group">
                <label for="member_name">Team Member Name</label>
                <input type="text" id="member_name" name="member_name" required value="<?= htmlspecialchars($editData['name'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role">
                    <option value="Designer" <?= (isset($editData) && $editData['role'] === 'Designer' ? 'selected' : '' ?>>Designer</option>
                    <option value="Developer" <?= (isset($editData) && $editData['role'] === 'Developer' ? 'selected' : '' ?>>Developer</option>
                    <option value="QA" <?= (isset($editData) && $editData['role'] === 'QA' ? 'selected' : '' ?>>QA</option>
                    <option value="Manager" <?= (isset($editData) && $editData['role'] === 'Manager' ? 'selected' : '' ?>>Manager</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($editData['email'] ?? '') ?>">
            </div>
            <div class="form-group">
                <label for="assigned_projects">Assigned Projects</label>
                <select id="assigned_projects" name="assigned_projects[]" multiple>
                    <?php foreach ($_SESSION['projects'] as $index => $project): ?>
                        <option value="<?= $index ?>" <?= (isset($editData['projects']) && in_array($index, $editData['projects']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($project['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary"><?= isset($editData) && $editSection === 'team' ? 'Update Member' : 'Add Member' ?></button>
            <?php if (isset($editData) && $editSection === 'team'): ?>
                <a href="<?= $_SERVER['PHP_SELF'] ?>?tab=team" class="btn btn-danger">Cancel Edit</a>
            <?php else: ?>
                <button type="reset" class="btn btn-danger">Clear Form</button>
            <?php endif; ?>
        </div>
    </form>
</div>

<div class="search-container">
    <form method="post" style="width: 100%; display: flex; gap: 10px;">
        <input type="text" name="search_term" placeholder="Search team..." value="<?= htmlspecialchars($searchTerm ?? '') ?>">
        <button type="submit" name="search" class="btn btn-primary">Search</button>
        <?php if (!empty($searchTerm)): ?>
            <a href="<?= $_SERVER['PHP_SELF'] ?>?tab=team" class="btn btn-danger">Clear Search</a>
        <?php endif; ?>
    </form>
</div>