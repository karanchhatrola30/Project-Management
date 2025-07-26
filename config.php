<?php
session_start();

if (!isset($_SESSION['projects'])) $_SESSION['projects'] = [];
if (!isset($_SESSION['tasks'])) $_SESSION['tasks'] = [];
if (!isset($_SESSION['team'])) $_SESSION['team'] = [];

$activeTab = $_GET['tab'] ?? 'projects';