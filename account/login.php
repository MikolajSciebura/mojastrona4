<?php
require_once '../includes/header.php';
require_once '../config/config.php';
?>

<main>
    <section class="auth-section">
        <div class="container auth-container">
            <div class="card reveal">
                <div class="auth-header">
                    <h2 class="text-white">Zaloguj się</h2>
                </div>
                <form action="/api/auth.php" method="POST">
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    <div class="form-group">
                        <label class="form-label">Adres E-mail</label>
                        <input type="email" name="email" class="form-input" placeholder="Twoja nazwa użytkownika" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Hasło</label>
                        <input type="password" name="password" class="form-input" placeholder="********" required>
                    </div>
                    <div class="flex-between align-center mb-2">
                        <label class="fs-sm text-muted cursor-pointer flex-v-center">
                            <input type="checkbox" class="mr-1"> Zapamiętaj mnie
                        </label>
                        <a href="#" class="fs-sm text-primary">Zapomniałeś hasła?</a>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Zaloguj się</button>
                </form>
                <div class="auth-footer">
                    Nie masz konta? <a href="/account/register.php" class="text-primary">Zarejestruj się</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once '../includes/footer.php'; ?>
