<?php
class Project {
    public static function getAll() {
        return $_SESSION['projects'];
    }

    public static function create($data) {
        $_SESSION['projects'][] = $data;
    }

    public static function update($index, $data) {
        $_SESSION['projects'][$index] = $data;
    }

    public static function delete($index) {
        unset($_SESSION['projects'][$index]);
        $_SESSION['projects'] = array_values($_SESSION['projects']);
    }

    public static function search($term) {
        return array_filter($_SESSION['projects'], function($project) use ($term) {
            return strpos(strtolower($project['name'] ?? ''), $term) !== false ||
                   strpos(strtolower($project['client'] ?? ''), $term) !== false ||
                   strpos(strtolower($project['status'] ?? ''), $term) !== false;
        });
    }
}