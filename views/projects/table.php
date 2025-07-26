<div class="table-container">
    <table>
        <thead>
            <tr>
                <th onclick="sortTable(0, 'projects')">Name</th>
                <th onclick="sortTable(1, 'projects')">Client</th>
                <th onclick="sortTable(2, 'projects')">Manager</th>
                <th onclick="sortTable(3, 'projects')">Start Date</th>
                <th onclick="sortTable(4, 'projects')">End Date</th>
                <th onclick="sortTable(5, 'projects')">Priority</th>
                <th onclick="sortTable(6, 'projects')">Status</th>
                <th>Progress</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($paginated)): ?>
                <?php foreach ($paginated as $index => $project): ?>
                <tr style="animation-delay: <?= $index * 0.1 ?>s">
                    <td><?= htmlspecialchars($project['name']) ?></td>
                    <td><?= htmlspecialchars($project['client']) ?></td>
                    <td><?= htmlspecialchars($project['manager']) ?></td>
                    <td><?= htmlspecialchars($project['start_date']) ?></td>
                    <td><?= htmlspecialchars($project['end_date']) ?></td>
                    <td><?= htmlspecialchars($project['priority']) ?></td>
                    <td><?= htmlspecialchars($project['status']) ?></td>
                    <td>
                        <div class="progress-bar">
                            <div class="progress-fill" style="width: <?= htmlspecialchars($project['progress']) ?>%"></div>
                        </div>
                    </td>
                    <td>
                        <a href="?edit=<?= $index ?>&section=project&tab=projects" class="btn btn-edit">Edit</a>
                        <a href="?delete=<?= $index ?>&section=project&tab=projects" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" class="no-results">No projects found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php if ($totalPages > 1): ?>
        <div class="pagination-container">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i ?>&section=project&tab=projects<?= !empty($searchTerm) ? '&search='.urlencode($searchTerm) : '' ?>" class="btn btn-pagination <?= $i == $currentPage ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</div>