import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
  if (window.Swiper) {
    const swiper = new Swiper('.swiper', {
      direction: 'horizontal',
      loop: true,
      pagination: { el: '.swiper-pagination', clickable: true },
      navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
      scrollbar: { el: '.swiper-scrollbar' },
    });
  }

  // Mobile nav toggle
  const toggle = document.getElementById('nav-toggle');
  const mobile = document.getElementById('mobile-menu');
  if (toggle && mobile) {
    toggle.addEventListener('click', () => {
      const open = mobile.classList.contains('hidden');
      mobile.classList.toggle('hidden');
      toggle.setAttribute('aria-expanded', String(open));
    });
  }
});
