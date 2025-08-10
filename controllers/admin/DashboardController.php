<?php
class DashboardController
{
    public function index()
    {
        $viewFile = './views/admin/dashboard.php';
        include './views/admin/layout.php';
    }
}
