<?php
require_once '../includes/header.php';
require_once '../config/config.php';
?>

<main>
    <section class="auth-section">
        <div class="container auth-container">
            <div class="card reveal">
                <div class="auth-header">
                    <h2 class="text-white">Załóż konto</h2>
                    <p class="text-muted fs-sm">Dołącz do społeczności MSTechPC i śledź swoje zamówienia.</p>
                </div>
                <form action="/api/auth.php?action=register" method="POST">
                    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    <div class="form-group">
                        <label class="form-label">Imię i Nazwisko</label>
                        <input type="text" name="name" class="form-input" placeholder="Jan Kowalski" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Adres E-mail</label>
                        <input type="email" name="email" class="form-input" placeholder="email@przyklad.pl" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Hasło</label>
                        <input type="password" name="password" class="form-input" placeholder="********" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Powtórz hasło</label>
                        <input type="password" name="password_confirm" class="form-input" placeholder="********" required>
                    </div>
                    <div class="mb-2">
                        <label class="fs-sm text-muted cursor-pointer flex-v-center">
                            <input type="checkbox" class="mr-1" required> Akceptuję regulamin i politykę prywatności
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Zarejestruj się</button>
                </form>
                <div class="auth-footer">
                    Masz już konto? <a href="/account/login.php" class="text-primary">Zaloguj się</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once '../includes/footer.php'; ?>
