<?php
class DashboardController
{
    public function index()
    {
        require_once './views/admin/dashboard.php';
    }

    public function adminHome()
    {
        require_once './views/admin/admin_home.php';
    }
}
