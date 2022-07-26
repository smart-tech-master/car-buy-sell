'use strict';

document.addEventListener('DOMContentLoaded', () => {
  // const navbarBurger = document.getElementById('navigation-burger');
  const navbarBurger = document.querySelectorAll('.burger');

  if (navbarBurger) {
    navbarBurger.forEach( (menu) => {
      menu.addEventListener('click', () => {
        toggleMobileMenu(menu);
      });
    });

    function toggleMobileMenu(el) {
      const target = el.dataset.target;
      const $target = document.getElementById(target);
      el.classList.toggle('is-active');
      $target.classList.toggle('is-active');
      if (el.classList.contains('is-active')) {
        el.setAttribute('aria-expanded', 'true');
      } else {
        el.setAttribute('aria-expanded', 'false');
      }
    }
  }

  const menuHasChild = document.querySelectorAll('.menu-item-has-children');

  if(menuHasChild) {
    menuHasChild.forEach( (menu) => {
      menu.addEventListener('click', (e) => {
        e.preventDefault();
        const intFrameWidth = window.innerWidth;
        if(intFrameWidth < 1024) {
          toggleSubMenu(menu);
        }
      });
    });
  }

  function toggleSubMenu(menu) {
    const parent = menu.closest('.has-dropdown');
    parent.classList.toggle('is-open');
  }


});
