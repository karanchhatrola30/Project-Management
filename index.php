<?php
require_once 'config.php';
require_once 'controllers/ProjectController.php';
require_once 'controllers/TaskController.php';
require_once 'controllers/TeamController.php';

$projectController = new ProjectController();
$taskController = new TaskController();
$teamController = new TeamController();

//hello

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['section'])) {
    $section = $_POST['section'];
    if ($section === 'project') $projectController->handleForm();
    elseif ($section === 'task') $taskController->handleForm();
    elseif ($section === 'team') $teamController->handleForm();
}

if (isset($_GET['delete']) && isset($_GET['section'])) {
    $section = $_GET['section'];
    if ($section === 'project') $projectController->delete();
    elseif ($section === 'task') $taskController->delete();
    elseif ($section === 'team') $teamController->delete();
}

require 'views/header.php';
require 'views/navbar.php';
require 'views/sidebar.php';

echo '<div class="main-container"><div class="content">';

if (isset($error)) {
    echo '<div class="error-message">'.htmlspecialchars($error).'</div>';
}

switch ($activeTab) {
    case 'projects':
        $projectController->index();
        break;
    case 'tasks':
        $taskController->index();
        break;
    case 'team':
        $teamController->index();
        break;
}

echo '</div></div>';

require 'views/footer.php';