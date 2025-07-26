<?php
class Team {
    public static function getAll() {
        return $_SESSION['team'];
    }

    public static function create($data) {
        $_SESSION['team'][] = $data;
    }

    public static function update($index, $data) {
        $_SESSION['team'][$index] = $data;
    }

    public static function delete($index) {
        unset($_SESSION['team'][$index]);
        $_SESSION['team'] = array_values($_SESSION['team']);
    }

    public static function search($term) {
        return array_filter($_SESSION['team'], function($member) use ($term) {
            return strpos(strtolower($member['name'] ?? ''), $term) !== false ||
                   strpos(strtolower($member['email'] ?? ''), $term) !== false ||
                   strpos(strtolower($member['role'] ?? ''), $term) !== false;
        });
    }
}