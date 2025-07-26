<?php
class Task {
    public static function getAll() {
        return $_SESSION['tasks'];
    }

    public static function create($data) {
        $_SESSION['tasks'][] = $data;
    }

    public static function update($index, $data) {
        $_SESSION['tasks'][$index] = $data;
    }

    public static function delete($index) {
        unset($_SESSION['tasks'][$index]);
        $_SESSION['tasks'] = array_values($_SESSION['tasks']);
    }

    public static function search($term) {
        return array_filter($_SESSION['tasks'], function($task) use ($term) {
            return strpos(strtolower($task['name'] ?? ''), $term) !== false ||
                   strpos(strtolower($task['assigned_to'] ?? ''), $term) !== false ||
                   strpos(strtolower($task['task_status'] ?? ''), $term) !== false;
        });
    }
}