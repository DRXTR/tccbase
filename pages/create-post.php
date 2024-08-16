<?php
include '../includes/db.php';
include '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['post-text'];
    $image = uploadFile($_FILES['post-image'], '../uploads');
    $video = uploadFile($_FILES['post-video'], '../uploads');

    $stmt = $pdo->prepare("INSERT INTO posts (user_id, text, image, video, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->execute([1, $text, $image, $video]);

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Postagem</title>
    <link rel="stylesheet" href="../css/php.css">
</head>
<body>
    <header>
        <div class="header-container">
            <h1>Minha Rede Social</h1>
            <nav>
                <a href="index.php" class="header-icon"><img src="../images/home-icon.png" alt="Início"></a>
                <a href="profile.php" class="header-icon"><img src="../images/profile-icon.png" alt="Perfil"></a>
                <a href="logout.php" class="header-icon"><img src="../images/logout-icon.png" alt="Sair"></a>
            </nav>
        </div>
    </header>
    <main>
        <section class="create-post-form">
            <h2>Criar Postagem</h2>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="post-text">Texto:</label>
                    <textarea id="post-text" name="post-text" rows="4" placeholder="O que você está pensando?"></textarea>
                </div>
                <div class="form-group">
                    <label for="post-image">Imagem:</label>
                    <input type="file" id="post-image" name="post-image" accept="image/*">
                </div>
                <div class="form-group">
                    <label for="post-video">Vídeo:</label>
                    <input type="file" id="post-video" name="post-video" accept="video/*">
                </div>
                <button type="submit">Publicar</button>
            </form>
        </section>
    </main>
    <footer>
        <div class="footer-icons">
            <a href="index.php" class="icon"><img src="../images/home-icon.png" alt="Início"></a>
            <a href="#" class="icon"><img src="../images/search-icon.png" alt="Pesquisar"></a>
            <a href="create-post.php" class="icon"><img src="../images/post-icon.png" alt="Postar"></a>
            <a href="profile.php" class="icon"><img src="../images/profile-icon.png" alt="Perfil"></a>
        </div>
    </footer>
</body>
</html>
