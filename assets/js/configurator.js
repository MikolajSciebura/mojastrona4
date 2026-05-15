/**
 * MSTechPC PC Configurator Logic
 */
class Configurator {
    constructor() {
        this.basePrice = 500; // Build fee
        this.selections = {
            cpu: { id: 1, name: 'i9-14900K', price: 2899, fps: 85 },
            gpu: { id: 3, name: 'RTX 4090', price: 9299, fps: 40 }
        };
        this.init();
    }

    init() {
        this.bindEvents();
        this.updateUI();
    }

    bindEvents() {
        // CPU selection
        document.querySelectorAll('input[name="cpu"]').forEach(input => {
            input.addEventListener('change', (e) => {
                const label = e.target.closest('.component-item');
                this.selections.cpu = {
                    id: e.target.value,
                    name: label.querySelector('strong').textContent,
                    price: parseInt(label.querySelector('.component-price').textContent.replace(/\D/g, '')),
                    fps: e.target.value == 1 ? 85 : 80 // Simplified logic
                };
                this.updateUI();
            });
        });

        // GPU selection
        document.querySelectorAll('input[name="gpu"]').forEach(input => {
            input.addEventListener('change', (e) => {
                const label = e.target.closest('.component-item');
                this.selections.gpu = {
                    id: e.target.value,
                    name: label.querySelector('strong').textContent,
                    price: parseInt(label.querySelector('.component-price').textContent.replace(/\D/g, '')),
                    fps: 40 // Simplified
                };
                this.updateUI();
            });
        });
    }

    calculateTotal() {
        return this.basePrice + this.selections.cpu.price + this.selections.gpu.price;
    }

    updateUI() {
        // Update summary text
        document.getElementById('summary-cpu').textContent = this.selections.cpu.name;
        document.getElementById('summary-gpu').textContent = this.selections.gpu.name;

        // Update total price
        const total = this.calculateTotal();
        document.getElementById('config-total-price').textContent = new Intl.NumberFormat('pl-PL', {
            style: 'currency',
            currency: 'PLN'
        }).format(total);

        // Update FPS meter (simplified)
        const totalFps = this.selections.cpu.fps + this.selections.gpu.fps;
        const fill = document.getElementById('fps-meter-fill');
        if (fill) {
            fill.style.width = `${Math.min(totalFps, 100)}%`;
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    window.mstechConfigurator = new Configurator();
});
