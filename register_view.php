<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <link rel="stylesheet" href="css_assets/login.css">
    </head>
    <body>

        <div class="login-box">
            <h2>Daftar Akun</h2>

            <?php if (!empty($message)): ?>
                <div class="message">
                    <?= htmlspecialchars($message) ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email Gmail" required>
                <input type="password" name="password" placeholder="Password" required>

                <button type="submit">Daftar</button>
            </form>

            <p style="text-align:center;margin-top:10px;">
                Sudah punya akun?
                <a href="login.php">Login</a>
            </p>
        </div>

    </body>
</html>
