<section class="auth-section pt-5">
    <div class="container auth-container">
        <div class="card reveal max-w-450 mx-auto">
            <div class="auth-header text-center mb-2">
                <h2 class="text-white">Zaloguj się</h2>
                <p class="text-muted fs-sm">Witaj ponownie w MSTechPC</p>
            </div>

            <form id="loginForm" class="auth-form">
                <input type="hidden" name="csrf_token" value="<?php echo csrf_token(); ?>">

                <div class="form-group mb-1-5">
                    <label class="form-label">Adres E-mail</label>
                    <input type="email" name="email" class="form-input" placeholder="email@przyklad.pl" required>
                </div>

                <div class="form-group mb-1-5">
                    <div class="flex-between align-center mb-half">
                        <label class="form-label mb-0">Hasło</label>
                        <a href="#" class="fs-xs text-primary">Zapomniałeś hasła?</a>
                    </div>
                    <input type="password" name="password" class="form-input" placeholder="********" required>
                </div>

                <div class="mb-2">
                    <label class="fs-sm text-muted cursor-pointer flex align-center gap-half">
                        <input type="checkbox" name="remember" class="custom-checkbox"> Zapamiętaj mnie
                    </label>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-1-5">Zaloguj się</button>

                <div id="authMessage" class="fs-sm text-center mb-1-5 hidden"></div>

                <div class="auth-footer text-center fs-sm">
                    Nie masz konta? <a href="<?php echo BASE_URL; ?>/account/register.php" class="text-primary bold">Zarejestruj się</a>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
document.getElementById('loginForm').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    const msgDiv = document.getElementById('authMessage');

    try {
        const response = await fetch('<?php echo BASE_URL; ?>/api/auth.php?action=login', {
            method: 'POST',
            body: formData
        });
        const result = await response.json();

        msgDiv.textContent = result.message;
        msgDiv.classList.remove('hidden', 'text-success', 'text-danger');
        msgDiv.classList.add(result.success ? 'text-success' : 'text-danger');

        if (result.success) {
            setTimeout(() => window.location.href = result.redirect, 1000);
        }
    } catch (err) {
        msgDiv.textContent = 'Błąd połączenia z serwerem';
        msgDiv.classList.remove('hidden');
        msgDiv.classList.add('text-danger');
    }
});
</script>
