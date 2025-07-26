<?php
require_once '../models/Task.php';

class TaskController {
    public function index() {
        $searchTerm = $_POST['search_term'] ?? '';
        $tasks = empty($searchTerm) ? Task::getAll() : Task::search(strtolower($searchTerm));
        
        $perPage = 5;
        $total = count($tasks);
        $currentPage = $_GET['page'] ?? 1;
        $offset = ($currentPage - 1) * $perPage;
        $paginated = array_slice($tasks, $offset, $perPage);
        
        require '../views/tasks/index.php';
    }

    public function handleForm() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $task = [
                'name' => $_POST['task_name'],
                'assigned_to' => $_POST['assigned_to'] ?? '',
                'task_status' => $_POST['task_status'] ?? 'To Do',
                'estimated_time' => $_POST['estimated_time'] ?? 0,
                'deadline' => $_POST['deadline'] ?? '',
                'notes' => $_POST['notes'] ?? '',
                'project_id' => $_POST['project_id'] ?? ''
            ];

            if (!empty($_POST['edit_id'])) {
                Task::update($_POST['edit_id'], $task);
            } else {
                Task::create($task);
            }
            
            header('Location: index.php?tab=tasks');
            exit;
        }
    }

    public function delete() {
        if (isset($_GET['delete'])) {
            Task::delete($_GET['delete']);
            header('Location: index.php?tab=tasks');
            exit;
        }
    }
}