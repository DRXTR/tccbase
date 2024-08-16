<?php
include '../includes/db.php';
include '../includes/functions.php';

$user_id = 1; // Substitua pelo ID do usuário logado

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $bio = $_POST['bio'];
    $profile_picture = uploadFile($_FILES['profile-pic-upload'], '../uploads');

    $sql = "UPDATE users SET username = ?, bio = ?, profile_picture = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $bio, $profile_picture, $user_id]);

    header('Location: profile.php');
    exit;
}

$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../css/php.css">
</head>
<body>
    <header>
        <div class="header-container">
            <h1>Minha Rede Social</h1>
            <nav>
                <a href="index.php" class="header-icon"><img src="../images/home-icon.png" alt="Início"></a>
                <a href="create-post.php" class="header-icon"><img src="../images/post-icon.png" alt="Postar"></a>
                <a href="logout.php" class="header-icon"><img src="../images/logout-icon.png" alt="Sair"></a>
            </nav>
        </div>
    </header>
    <main>
        <section class="profile">
            <form method="POST" enctype="multipart/form-data">
                <div class="profile-header">
                    <img src="../<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="Foto de Perfil" class="profile-pic">
                    <div class="form-group">
                        <label for="profile-pic-upload">Atualizar Foto de Perfil:</label>
                        <input type="file" id="profile-pic-upload" name="profile-pic-upload" accept="image/*">
                    </div>
                </div>
                <div class="form-group">
                    <label for="username">Nome de Usuário:</label>
                    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($user['username']); ?>">
                </div>
                <div class="form-group">
                    <label for="bio">Biografia:</label>
                    <textarea id="bio" name="bio" rows="4"><?php echo htmlspecialchars($user['bio']); ?></textarea>
                </div>
                <button type="submit">Atualizar Perfil</button>
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
