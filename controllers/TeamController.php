<?php
require_once '../models/Team.php';

class TeamController {
    public function index() {
        $searchTerm = $_POST['search_term'] ?? '';
        $team = empty($searchTerm) ? Team::getAll() : Team::search(strtolower($searchTerm));
        
        $perPage = 5;
        $total = count($team);
        $currentPage = $_GET['page'] ?? 1;
        $offset = ($currentPage - 1) * $perPage;
        $paginated = array_slice($team, $offset, $perPage);
        
        require '../views/team/index.php';
    }

    public function handleForm() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $team = [
                'name' => $_POST['member_name'],
                'role' => $_POST['role'] ?? 'Developer',
                'email' => $_POST['email'] ?? '',
                'projects' => $_POST['assigned_projects'] ?? []
            ];

            if (!empty($_POST['edit_id'])) {
                Team::update($_POST['edit_id'], $team);
            } else {
                Team::create($team);
            }
            
            header('Location: index.php?tab=team');
            exit;
        }
    }

    public function delete() {
        if (isset($_GET['delete'])) {
            Team::delete($_GET['delete']);
            header('Location: index.php?tab=team');
            exit;
        }
    }
}