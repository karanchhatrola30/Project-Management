<?php
require_once '../models/Project.php';

class ProjectController {
    public function index() {
        $searchTerm = $_POST['search_term'] ?? '';
        $projects = empty($searchTerm) ? Project::getAll() : Project::search(strtolower($searchTerm));
        
        $perPage = 5;
        $total = count($projects);
        $currentPage = $_GET['page'] ?? 1;
        $offset = ($currentPage - 1) * $perPage;
        $paginated = array_slice($projects, $offset, $perPage);
        
        require '../views/projects/index.php';
    }

    public function handleForm() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $project = [
                'name' => $_POST['project_name'],
                'description' => $_POST['description'] ?? '',
                'client' => $_POST['client'] ?? '',
                'manager' => $_POST['manager'] ?? '',
                'start_date' => $_POST['start_date'] ?? '',
                'end_date' => $_POST['end_date'] ?? '',
                'priority' => $_POST['priority'] ?? 'Medium',
                'status' => $_POST['status'] ?? 'Not Started',
                'github' => $_POST['github'] ?? '',
                'tags' => $_POST['tags'] ?? '',
                'budget' => $_POST['budget'] ?? 0,
                'type' => $_POST['type'] ?? 'Web',
                'progress' => $_POST['progress'] ?? 0,
                'notifications' => isset($_POST['notifications']) ? 'Yes' : 'No',
                'feedback' => $_POST['feedback'] ?? ''
            ];

            if (!empty($_POST['edit_id'])) {
                Project::update($_POST['edit_id'], $project);
            } else {
                Project::create($project);
            }
            
            header('Location: index.php?tab=projects');
            exit;
        }
    }

    public function delete() {
        if (isset($_GET['delete'])) {
            Project::delete($_GET['delete']);
            header('Location: index.php?tab=projects');
            exit;
        }
    }
}