/**
 * MSTechPC Shop Logic
 */
class Shop {
    constructor() {
        this.cart = JSON.parse(localStorage.getItem('mstech_cart')) || [];
        this.init();
    }

    init() {
        this.updateCartCount();
        this.bindEvents();
    }

    bindEvents() {
        // Add to cart buttons
        document.querySelectorAll('.btn-add-to-cart').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const productId = btn.dataset.id;
                const productName = btn.dataset.name;
                const productPrice = btn.dataset.price;
                this.addToCart(productId, productName, productPrice);
            });
        });
    }

    addToCart(id, name, price) {
        const item = { id, name, price, quantity: 1 };
        const existing = this.cart.find(i => i.id === id);

        if (existing) {
            existing.quantity++;
        } else {
            this.cart.push(item);
        }

        this.saveCart();
        this.updateCartCount();
        this.showNotification(`Dodano ${name} do koszyka!`);
    }

    saveCart() {
        localStorage.setItem('mstech_cart', JSON.stringify(this.cart));
    }

    updateCartCount() {
        const count = this.cart.reduce((acc, item) => acc + item.quantity, 0);
        const badges = document.querySelectorAll('.cart-count');
        badges.forEach(badge => {
            badge.textContent = count;
            badge.style.display = count > 0 ? 'flex' : 'none';
        });
    }

    showNotification(message) {
        // Simple alert for now, can be improved to a toast
        console.log('MSTechPC Notification:', message);
    }
}

document.addEventListener('DOMContentLoaded', () => {
    window.mstechShop = new Shop();
});
