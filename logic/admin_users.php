<?php
session_start();
require 'config.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit;
}

$result = $conn->query("SELECT id, username, email, role FROM user");
?>
<!DOCTYPE html>
<html>
<head>
    <title>All Users</title>
    <style>
        body { background: #181820; font-family: 'Rajdhani', sans-serif; }
        h1 { text-align: center; color: #de1002; margin-top: 40px; }
        table { border-collapse: collapse; width: 80%; margin: 40px auto; background: #23232b; color: #fff; }
        th, td { border: 1px solid #444; padding: 10px 16px; text-align: center; }
        th { background: #191a1d; }
        button.delete-user-btn {
            background: #de1002; color: #fff; border: none; padding: 6px 16px; border-radius: 5px; cursor: pointer;
            font-weight: bold; transition: background 0.2s;
        }
        button.delete-user-btn:hover { background: #b80b00; }
    </style>
</head>
<body>
    <h1>All Users</h1>
    <table>
        <tr><th>ID</th><th>Username</th><th>Email</th><th>Role</th><th>Action</th></tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['username']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['role']) ?></td>
                <td>
                    <?php if ($row['id'] != $_SESSION['user_id']): ?>
                        <button class="delete-user-btn" data-user-id="<?= $row['id'] ?>">Delete</button>
                    <?php else: ?>
                        (You)
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <script>
    document.querySelectorAll('.delete-user-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            if (confirm('Delete this user?')) {
                const row = this.closest('tr');
                fetch('delete_user.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    body: 'user_id=' + this.dataset.userId
                })
                .then(res => res.json())
                .then(data => {
                    alert(data.message);
                    if (data.status === 'success') {
                        row.style.background = '#e74c3c';
                        row.style.color = '#fff';
                        row.cells[0].innerText = 'Deleted';
                        setTimeout(() => row.remove(), 1000);
                    }
                });
            }
        });
    });
    </script>
</body>
</html>
