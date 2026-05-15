<?php
require_once 'includes/header.php';
require_once 'config/db.php';

$db = Database::getInstance()->getConnection();

// Fetch components from database
$cpus = $db->query("SELECT * FROM components WHERE type = 'cpu' ORDER BY price DESC")->fetchAll();
$gpus = $db->query("SELECT * FROM components WHERE type = 'gpu' ORDER BY price DESC")->fetchAll();
?>

<main>
    <section class="configurator-section">
        <div class="container">
            <h1 class="hero-title">Konfigurator <span class="text-gradient">Custom PC</span></h1>
            <p class="hero-description">Dobierz podzespoły, sprawdź kompatybilność i wydajność w czasie rzeczywistym.</p>

            <div class="config-layout">
                <div class="config-steps">
                    <!-- Step 1: CPU -->
                    <div class="card reveal mb-2">
                        <h3 class="mb-1 text-white">1. Procesor (CPU)</h3>
                        <div class="component-list grid gap-1">
                            <?php foreach($cpus as $index => $cpu): ?>
                            <label class="component-item">
                                <input type="radio" name="cpu" value="<?php echo $cpu['id']; ?>" <?php echo $index === 0 ? 'checked' : ''; ?>>
                                <img src="assets/img/cpu-icon.png" alt="CPU" width="40">
                                <div class="component-info">
                                    <strong class="text-white"><?php echo htmlspecialchars($cpu['name']); ?></strong>
                                    <p class="text-muted fs-sm"><?php echo htmlspecialchars($cpu['description'] ?: 'Wydajny procesor dla Twojej konfiguracji'); ?></p>
                                </div>
                                <div class="component-price">+ <?php echo number_format($cpu['price'], 0, '', ' '); ?> zł</div>
                            </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Step 2: GPU -->
                    <div class="card reveal mb-2">
                        <h3 class="mb-1 text-white">2. Karta Graficzna (GPU)</h3>
                        <div class="component-list grid gap-1">
                            <?php foreach($gpus as $index => $gpu): ?>
                            <label class="component-item">
                                <input type="radio" name="gpu" value="<?php echo $gpu['id']; ?>" <?php echo $index === 0 ? 'checked' : ''; ?>>
                                <img src="assets/img/gpu-icon.png" alt="GPU" width="40">
                                <div class="component-info">
                                    <strong class="text-white"><?php echo htmlspecialchars($gpu['name']); ?></strong>
                                    <p class="text-muted fs-sm"><?php echo htmlspecialchars($gpu['description'] ?: 'Mocna karta graficzna do gier i pracy'); ?></p>
                                </div>
                                <div class="component-price">+ <?php echo number_format($gpu['price'], 0, '', ' '); ?> zł</div>
                            </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <aside class="config-summary-container">
                    <div class="card reveal border-primary">
                        <h3 class="mb-1 text-white">Podsumowanie</h3>

                        <div class="summary-details">
                            <div class="summary-row">
                                <span>CPU:</span>
                                <span class="summary-value" id="summary-cpu">-</span>
                            </div>
                            <div class="summary-row">
                                <span>GPU:</span>
                                <span class="summary-value" id="summary-gpu">-</span>
                            </div>
                        </div>

                        <div class="compatibility-badge">
                            <span class="icon">●</span> Konfiguracja Kompatybilna
                        </div>

                        <div class="performance-meter">
                            <div class="mb-1 fs-sm">Szacunkowe FPS w 4K Ultra:</div>
                            <div class="flex gap-1 align-center">
                                <div class="meter-bar-bg">
                                    <div class="meter-bar-fill" id="fps-meter-fill"></div>
                                </div>
                                <span class="bold">120+</span>
                            </div>
                        </div>

                        <div class="total-display" id="config-total-price">
                            0,00 zł
                        </div>

                        <button class="btn btn-primary w-100">Dodaj do koszyka</button>
                        <p class="text-center mt-1 text-muted fs-sm">Darmowy montaż i testy!</p>
                    </div>
                </aside>
            </div>
        </div>
    </section>
</main>

<script src="assets/js/configurator.js" defer></script>
<?php require_once 'includes/footer.php'; ?>
