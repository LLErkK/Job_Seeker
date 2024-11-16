<?php

class DashboardController {
    public function showDashboard() {
        if (isset($_SESSION['role'])) {
            switch ($_SESSION['role']) {
                case 'admin':
                    require_once '../app/views/admin/dashboard.php';
                    break;
                case 'job_seeker':
                    require_once '../app/views/job_seeker/dashboard.php';
                    break;
                case 'employer':
                    require_once '../app/views/employer/dashboard.php';
                    break;
                default:
                    header('Location: /login');
                    break;
            }
        } else {
            header('Location: /login');
            exit();
        }
    }
}
?>
