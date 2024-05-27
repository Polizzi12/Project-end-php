<?php
require_once '../config/config.php';


if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}


$sensitiveData = new SensitiveData($db);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['action'] === 'create') {
        $data = $_POST['data'];
        $sensitiveData->create($data);
    } elseif ($_POST['action'] === 'update') {
        $id = $_POST['id'];
        $data = $_POST['data'];
        $sensitiveData->update($id, $data);
    } elseif ($_POST['action'] === 'delete') {
        $id = $_POST['id'];
        $sensitiveData->delete($id);
    }
}


$sensitiveDataList = $sensitiveData->read();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Data</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-color: #8C8C8D; color:white;">
    <div class="manage_container">
        <h1>Manage Data</h1>
        
        <form action="manage_data.php" method="POST">
            <input type="hidden" name="action" value="create">
            <div class="form-group">
                <label for="data">Data</label>
                <input type="text" id="data" name="data" required>
            </div>
            <button type="submit">Create</button>
        </form>
        
        
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
                        <td>
                            
                            <form action="manage_data.php" method="POST">
                                <input type="hidden" name="action" value="update">
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                <input type="text" name="data" value="<?php echo htmlspecialchars($data['data']); ?>" required>
                                <button type="submit">Update</button>
                            </form>
                        </td>
                        <td>
                            
                            <form action="manage_data.php" method="POST">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>