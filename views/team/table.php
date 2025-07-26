<div class="table-container">
    <table>
        <thead>
            <tr>
                <th onclick="sortTable(0, 'team')">Name</th>
                <th onclick="sortTable(1, 'team')">Role</th>
                <th onclick="sortTable(2, 'team')">Email</th>
                <th>Assigned Projects</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($paginated)): ?>
                <?php foreach ($paginated as $index => $member): ?>
                <tr style="animation-delay: <?= $index * 0.1 ?>s">
                    <td><?= htmlspecialchars($member['name']) ?></td>
                    <td><?= htmlspecialchars($member['role']) ?></td>
                    <td><?= htmlspecialchars($member['email']) ?></td>
                    <td>
                        <?php
                            $projectNames = array_map(
                                function($index) {
                                    return htmlspecialchars($_SESSION['projects'][$index]['name'] ?? 'N/A');
                                },
                                is_array($member['projects'] ?? null) ? $member['projects'] : []
                            );
                            echo implode(', ', $projectNames);
                        ?>
                    </td>
                    <td>
                        <a href="?edit=<?= $index ?>&section=team&tab=team" class="btn btn-edit">Edit</a>
                        <a href="?delete=<?= $index ?>&section=team&tab=team" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="no-results">No team members found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php if ($totalPages > 1): ?>
        <div class="pagination-container">
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i ?>&section=team&tab=team<?= !empty($searchTerm) ? '&search='.urlencode($searchTerm) : '' ?>" class="btn btn-pagination <?= $i == $currentPage ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</div>