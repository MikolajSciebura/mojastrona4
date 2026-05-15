/**
 * MSTechPC Configurator Logic
 */
class PCConfigurator {
    constructor() {
        this.selections = {};
        this.basePrice = 0;
        this.init();
    }

    init() {
        this.inputs = document.querySelectorAll('.component-card-radio input');
        this.summaryContainer = document.getElementById('config-selections');
        this.totalDisplay = document.getElementById('total-price');
        this.perfBar = document.getElementById('perf-bar-fill');
        this.perfText = document.getElementById('perf-score');

        this.inputs.forEach(input => {
            input.addEventListener('change', () => this.updateSummary());
        });

        const saveBtn = document.getElementById('btn-save-config');
        if (saveBtn) {
            saveBtn.addEventListener('click', () => this.saveConfig());
        }
    }

    updateSummary() {
        let total = this.basePrice;
        this.summaryContainer.innerHTML = '';
        let score = 0;

        this.inputs.forEach(input => {
            if (input.checked) {
                const name = input.dataset.name;
                const price = parseFloat(input.dataset.price);
                total += price;

                // Add to summary list
                const div = document.createElement('div');
                div.className = 'selection-item fs-sm flex-between mb-half';
                div.innerHTML = `<span>${name}</span><span>${this.formatPrice(price)}</span>`;
                this.summaryContainer.appendChild(div);

                // Simple score logic for demo
                if (input.name === 'gpu' || input.name === 'cpu') {
                    score += 40;
                }
            }
        });

        this.totalDisplay.textContent = this.formatPrice(total);
        this.perfBar.style.width = `${score}%`;
        this.perfText.textContent = `${score}%`;
    }

    formatPrice(price) {
        return new Intl.NumberFormat('pl-PL', { style: 'currency', currency: 'PLN' }).format(price);
    }

    async saveConfig() {
        // Fetch/POST to /api/configurator.php?action=save
        console.log('Saving config...', this.selections);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new PCConfigurator();
});
