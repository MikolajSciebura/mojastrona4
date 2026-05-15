<section class="configurator-section pt-5">
    <div class="container">
        <header class="mb-3">
            <h1 class="hero-title">Konfigurator <span class="text-gradient">Custom PC</span></h1>
            <p class="text-muted">Wybierz komponenty, my zajmiemy się resztą. Darmowy montaż i testy!</p>
        </header>

        <div class="config-layout grid grid-config gap-2">
            <div class="config-steps">
                <!-- Step 1: CPU -->
                <div class="config-step card mb-2 reveal">
                    <div class="step-header mb-1">
                        <span class="step-number">01</span>
                        <h3 class="text-white">Procesor (CPU)</h3>
                    </div>
                    <div class="component-options grid gap-1">
                        <?php foreach($cpus as $cpu): ?>
                        <label class="component-card-radio">
                            <input type="radio" name="cpu" value="<?php echo $cpu['id']; ?>" data-price="<?php echo $cpu['price']; ?>" data-name="<?php echo h($cpu['name']); ?>">
                            <div class="card p-1 flex align-center gap-1">
                                <div class="comp-icon"><img src="<?php echo ASSETS_PATH; ?>/img/cpu-icon.png" width="40"></div>
                                <div class="comp-info flex-1">
                                    <div class="bold text-white"><?php echo h($cpu['name']); ?></div>
                                    <div class="fs-xs text-muted"><?php echo h($cpu['brand']); ?></div>
                                </div>
                                <div class="comp-price">+<?php echo number_format($cpu['price'], 0, '', ' '); ?> zł</div>
                            </div>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Step 2: MOBO -->
                <div class="config-step card mb-2 reveal">
                    <div class="step-header mb-1">
                        <span class="step-number">02</span>
                        <h3 class="text-white">Płyta Główna (MOBO)</h3>
                    </div>
                    <div class="component-options grid gap-1">
                        <?php foreach($mobos as $mobo): ?>
                        <label class="component-card-radio">
                            <input type="radio" name="mobo" value="<?php echo $mobo['id']; ?>" data-price="<?php echo $mobo['price']; ?>" data-name="<?php echo h($mobo['name']); ?>">
                            <div class="card p-1 flex align-center gap-1">
                                <div class="comp-icon"><img src="<?php echo ASSETS_PATH; ?>/img/mobo-icon.png" width="40"></div>
                                <div class="comp-info flex-1">
                                    <div class="bold text-white"><?php echo h($mobo['name']); ?></div>
                                </div>
                                <div class="comp-price">+<?php echo number_format($mobo['price'], 0, '', ' '); ?> zł</div>
                            </div>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Step 3: GPU -->
                <div class="config-step card mb-2 reveal">
                    <div class="step-header mb-1">
                        <span class="step-number">03</span>
                        <h3 class="text-white">Karta Graficzna (GPU)</h3>
                    </div>
                    <div class="component-options grid gap-1">
                        <?php foreach($gpus as $gpu): ?>
                        <label class="component-card-radio">
                            <input type="radio" name="gpu" value="<?php echo $gpu['id']; ?>" data-price="<?php echo $gpu['price']; ?>" data-name="<?php echo h($gpu['name']); ?>">
                            <div class="card p-1 flex align-center gap-1">
                                <div class="comp-icon"><img src="<?php echo ASSETS_PATH; ?>/img/gpu-icon.png" width="40"></div>
                                <div class="comp-info flex-1">
                                    <div class="bold text-white"><?php echo h($gpu['name']); ?></div>
                                </div>
                                <div class="comp-price">+<?php echo number_format($gpu['price'], 0, '', ' '); ?> zł</div>
                            </div>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <aside class="config-summary-sticky">
                <div class="card p-2 sticky-top border-primary">
                    <h3 class="mb-1-5 text-white">Twój Zestaw</h3>
                    <div id="config-selections" class="mb-2">
                        <!-- Dynamic Selections -->
                        <div class="selection-item fs-sm flex-between text-muted mb-half">
                            <span>Baza (Montaż + Testy):</span>
                            <span>Gratis</span>
                        </div>
                    </div>

                    <div class="config-total pt-1 border-top mt-1">
                        <div class="flex-between align-end mb-1-5">
                            <span class="fs-sm text-muted">Suma brutto:</span>
                            <span class="total-price-large" id="total-price">0,00 zł</span>
                        </div>
                        <button class="btn btn-primary w-100 mb-half">Zamów Konfigurację</button>
                        <button class="btn btn-outline w-100 fs-xs" id="btn-save-config">Zapisz na koncie</button>
                    </div>

                    <div class="perf-box mt-2 p-1 bg-primary-soft rounded-lg">
                        <h4 class="fs-xs text-uppercase tracking-wider mb-1">Szacowana Wydajność</h4>
                        <div class="perf-bar-wrapper">
                            <div class="flex-between fs-xs mb-half">
                                <span>Gaming 4K Ultra</span>
                                <span class="bold" id="perf-score">0%</span>
                            </div>
                            <div class="perf-bar-bg"><div id="perf-bar-fill" class="perf-bar-fill" style="width: 0%"></div></div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<script src="<?php echo ASSETS_PATH; ?>/js/configurator.js" defer></script>
