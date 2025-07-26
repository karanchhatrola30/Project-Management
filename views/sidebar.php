<div class="sidebar">
    <ul class="sidebar-menu">
        <li>
            <a href="?tab=projects" class="<?= $activeTab === 'projects' ? 'active' : '' ?>">
                <i class="fas fa-project-diagram"></i>
                <span>Projects</span>
            </a>
        </li>
        <li>
            <a href="?tab=tasks" class="<?= $activeTab === 'tasks' ? 'active' : '' ?>">
                <i class="fas fa-tasks"></i>
                <span>Tasks</span>
            </a>
        </li>
        <li>
            <a href="?tab=team" class="<?= $activeTab === 'team' ? 'active' : '' ?>">
                <i class="fas fa-users"></i>
                <span>Team</span>
            </a>
        </li>
    </ul>
</div>