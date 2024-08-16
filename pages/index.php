<?php
include '../includes/db.php';
include '../includes/functions.php';

$posts = getPosts($pdo);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="../css/php.css">
</head>
<body>
    <header>
        <div class="header-container">
            <h1>Minha Rede Social</h1>
            <nav>
                <a href="profile.php" class="header-icon"><img src="../images/profile-icon.png" alt="Perfil"></a>
                <a href="logout.php" class="header-icon"><img src="../images/logout-icon.png" alt="Sair"></a>
            </nav>
        </div>
    </header>
    <main>
        <section class="posts">
            <?php foreach ($posts as $post): ?>
            <article class="post">
                <div class="post-header">
                    <img src="../<?php echo htmlspecialchars($post['profile_picture']); ?>" alt="Perfil" class="profile-pic">
                    <div class="user-info">
                        <strong><?php echo htmlspecialchars($post['username']); ?></strong>
                        <time><?php echo htmlspecialchars($post['created_at']); ?></time>
                    </div>
                </div>
                <?php if ($post['text']): ?>
                <p><?php echo htmlspecialchars($post['text']); ?></p>
                <?php endif; ?>
                <?php if ($post['image']): ?>
                <img src="../<?php echo htmlspecialchars($post['image']); ?>" alt="Imagem do Post" class="post-image">
                <?php endif; ?>
                <?php if ($post['video']): ?>
                <video controls class="post-video">
                    <source src="../<?php echo htmlspecialchars($post['video']); ?>" type="video/mp4">
                    Seu navegador não suporta o elemento de vídeo.
                </video>
                <?php endif; ?>
            </article>
            <?php endforeach; ?>
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
