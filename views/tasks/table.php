<div class="table-container">
    <table>
        <thead>
            <tr>
                <th onclick="sortTable(0, 'tasks')">Task Name</th>
                <th onclick="sortTable(1, 'tasks')">Project</th>
                <th onclick="sortTable(2, 'tasks')">Assigned To</th>
                <th onclick="sortTable(3, 'tasks')">Status</th>
                <th onclick="sortTable(4, 'tasks')">Deadline</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($paginated)): ?>
                <?php foreach ($paginated as $index => $task): ?>
                <tr style="animation-delay: <?= $index * 0.1 ?>s">
                    <td><?= htmlspecialchars($task['name']) ?></td>
                    <td><?= htmlspecialchars($_SESSION['projects'][$task['project_id']]['name'] ?? 'N/A') ?></td>
                    <td><?= htmlspecialchars($task['assigned_to']) ?></td>
                    <td><?= htmlspecialchars($task['task_status']) ?></td>
                    <td><?= htmlspecialchars($task['deadline']) ?></td>
                    <td>
                        <a href="?edit=<?= $index ?>&section=task&tab=tasks" class="btn btn-edit">Edit</a>
                        <a href="?delete=<?= $index ?>&section=task&tab=tasks" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="no-results">No tasks found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php if ($totalPages > 1): ?>
        <div class="pagination-container">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i ?>&section=task&tab=tasks<?= !empty($searchTerm) ? '&search='.urlencode($searchTerm) : '' ?>" class="btn btn-pagination <?= $i == $currentPage ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</div>