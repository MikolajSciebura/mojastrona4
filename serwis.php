<?php
require_once 'includes/header.php';
?>

<main>
    <section class="shop-header">
        <div class="container">
            <h1 class="shop-title mb-2">Serwis <span class="text-gradient">IT i Naprawa PC</span></h1>
            <p class="shop-subtitle">Profesjonalna diagnostyka, naprawa i modernizacja Twojego sprzętu w Częstochowie.</p>

            <div class="grid grid-3 gap-2 mt-2">
                <div class="card reveal">
                    <h3 class="text-white mb-1">Naprawa Laptopów</h3>
                    <p class="text-muted fs-sm mb-2">Wymiana matryc, gniazd zasilania, czyszczenie układów chłodzenia oraz naprawa płyt głównych.</p>
                    <a href="/kontakt.php" class="btn btn-outline w-100">Umów wizytę</a>
                </div>
                <div class="card reveal">
                    <h3 class="text-white mb-1">Modernizacja PC</h3>
                    <p class="text-muted fs-sm mb-2">Przyspiesz swój stary komputer. Wymiana dysków na SSD, dołożenie RAM lub nowej karty graficznej.</p>
                    <a href="/kontakt.php" class="btn btn-outline w-100">Darmowa wycena</a>
                </div>
                <div class="card reveal">
                    <h3 class="text-white mb-1">Odzyskiwanie Danych</h3>
                    <p class="text-muted fs-sm mb-2">Bezpieczne przywracanie utraconych plików z dysków HDD, SSD, kart pamięci i pendrive'ów.</p>
                    <a href="/kontakt.php" class="btn btn-outline w-100">Zapytaj o szczegóły</a>
                </div>
            </div>

            <div class="card reveal mt-2">
                <div class="grid grid-2 gap-2 align-center">
                    <div>
                        <h2 class="text-white mb-1">Potrzebujesz szybkiej pomocy?</h2>
                        <p class="text-muted">Nasi technicy są dostępni od poniedziałku do piątku w godzinach 9:00 - 17:00. Oferujemy również dojazd do klienta na terenie Częstochowy i Kłobucka.</p>
                    </div>
                    <div class="text-center">
                        <div class="fs-lg bold text-primary mb-1">+48 123 456 789</div>
                        <a href="/kontakt.php" class="btn btn-primary">Formularz zgłoszeniowy</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once 'includes/footer.php'; ?>
