/**
 * Scroll Reveal & Premium Animations
 */

const initReveal = () => {
    const revealElements = document.querySelectorAll('.reveal');

    const revealOnScroll = () => {
        revealElements.forEach(el => {
            const rect = el.getBoundingClientRect();
            const windowHeight = window.innerHeight;

            if (rect.top < windowHeight - 50) {
                el.classList.add('active');
            }
        });
    };

    window.addEventListener('scroll', revealOnScroll);
    // Initial trigger
    setTimeout(revealOnScroll, 100);
};

document.addEventListener('DOMContentLoaded', initReveal);
