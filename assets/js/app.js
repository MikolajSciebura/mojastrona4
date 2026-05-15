/**
 * Core Application Logic
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Sticky Header
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // 2. Mobile Menu Toggle
    const menuBtn = document.querySelector('.mobile-menu-btn');
    const navLinks = document.querySelector('.nav-links');
    if (menuBtn) {
        menuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    }

    // 3. Scroll Reveal Animation
    const revealElements = document.querySelectorAll('.reveal');
    const revealOnScroll = () => {
        revealElements.forEach(el => {
            const rect = el.getBoundingClientRect();
            if (rect.top < window.innerHeight - 100) {
                el.classList.add('active');
            }
        });
    };
    window.addEventListener('scroll', revealOnScroll);
    revealOnScroll(); // Initial check

    // 4. Cart Side Panel (Mockup logic)
    const cartBtn = document.querySelector('.cart-btn');
    if (cartBtn) {
        cartBtn.addEventListener('click', (e) => {
            e.preventDefault();
            console.log('Open Cart Panel');
            // Logic to open AJAX cart
        });
    }
});

// Utility for formatting price
const formatPrice = (price) => {
    return new Intl.NumberFormat('pl-PL', {
        style: 'currency',
        currency: 'PLN',
    }).format(price);
};
