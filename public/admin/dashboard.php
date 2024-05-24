<?php 
require_once  "../../config/config.php";

if (!isset($_SESSION['user_id'])){
    header('Location: ../login.php');
    exit;
}

$sensitivedatalist = $sensitivedata->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/project-end-php/css/style.css">
</head>
<body style="background-color: #8C8C8D; color:white;">
<div class="dashboard-container">
    <h1>Dashboard</h1>
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sensitiveDataList as $data): ?>
                <tr>
                    <td><?php echo htmlspecialchars($data['id']); ?></td>
                    <td><?php echo htmlspecialchars($data['data']); ?></td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>