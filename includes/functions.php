<?php
function getPosts($pdo) {
    $sql = "SELECT posts.*, users.username, users.profile_picture 
            FROM posts 
            JOIN users ON posts.user_id = users.id 
            ORDER BY posts.created_at DESC";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function uploadFile($file, $directory) {
    if ($file['error'] === UPLOAD_ERR_OK) {
        $target_file = $directory . '/' . basename($file['name']);
        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            return $target_file;
        }
    }
    return null;
}
?>
