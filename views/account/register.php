<section class="auth-section pt-5">
    <div class="container auth-container">
        <div class="card reveal max-w-450 mx-auto">
            <div class="auth-header text-center mb-2">
                <h2 class="text-white">Załóż konto</h2>
                <p class="text-muted fs-sm">Dołącz do społeczności MSTechPC</p>
            </div>

            <form id="registerForm" class="auth-form">
                <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">

                <div class="form-group mb-1-5">
                    <label class="form-label">Imię i Nazwisko</label>
                    <input type="text" name="name" class="form-input" placeholder="Jan Kowalski" required>
                </div>

                <div class="form-group mb-1-5">
                    <label class="form-label">Adres E-mail</label>
                    <input type="email" name="email" class="form-input" placeholder="email@przyklad.pl" required>
                </div>

                <div class="form-group mb-1-5">
                    <label class="form-label">Hasło</label>
                    <input type="password" name="password" class="form-input" placeholder="********" required>
                </div>

                <div class="form-group mb-1-5">
                    <label class="form-label">Powtórz hasło</label>
                    <input type="password" name="password_confirm" class="form-input" placeholder="********" required>
                </div>

                <div class="mb-2">
                    <label class="fs-sm text-muted cursor-pointer flex align-center gap-half">
                        <input type="checkbox" name="terms" class="custom-checkbox" required> Akceptuję regulamin
                    </label>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-1-5">Zarejestruj się</button>

                <div id="authMessage" class="fs-sm text-center mb-1-5 hidden"></div>

                <div class="auth-footer text-center fs-sm">
                    Masz już konto? <a href="<?php echo BASE_URL; ?>/account/login.php" class="text-primary bold">Zaloguj się</a>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
document.getElementById('registerForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    const msgDiv = document.getElementById('authMessage');

    try {
        const response = await fetch('<?php echo BASE_URL; ?>/api/auth.php?action=register', {
            method: 'POST',
            body: formData
        });
        const result = await response.json();

        msgDiv.textContent = result.message;
        msgDiv.classList.remove('hidden', 'text-success', 'text-danger');
        msgDiv.classList.add(result.success ? 'text-success' : 'text-danger');

        if (result.success) {
            setTimeout(() => window.location.href = 'login.php', 1500);
        }
    } catch (err) {
        msgDiv.textContent = 'Błąd połączenia z serwerem';
        msgDiv.classList.remove('hidden');
        msgDiv.classList.add('text-danger');
    }
});
</script>
