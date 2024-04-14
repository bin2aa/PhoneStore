<?php

include_once(__DIR__ . '/../model/statsModel.php');

class statsController
{
    private $statsModel;

    public function __construct()
    {
        $this->statsModel = new statsModel();
    }

    public function showStats()
    {
        $stats = $this->statsModel->getStats();
        $statsDate = $this->statsModel->getStatsByDate();
        include __DIR__ . '/../view/statsView.php';
    }
}

$action = 'index';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} 

$statsController = new statsController();
switch ($action) {
    case 'showStats':
        $statsController->showStats();
        break;
    default:
        $statsController->showStats();
        break;
}
