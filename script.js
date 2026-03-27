/* ========================================
   110 Auto Repair Shop – Main Script
   ======================================== */

(function () {
  'use strict';

  /* ── Throttle helper ── */
  function throttle(fn, delay) {
    let last = 0;
    return function (...args) {
      const now = Date.now();
      if (now - last >= delay) {
        last = now;
        fn.apply(this, args);
      }
    };
  }

  /* ── 1. Sticky Navbar ── */
  const navbar = document.getElementById('navbar');
  function handleNavScroll() {
    if (window.scrollY > 60) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  }

  /* ── 2. Mobile hamburger / overlay ── */
  const hamburger = document.getElementById('hamburger');
  const navOverlay = document.getElementById('navOverlay');
  const overlayClose = document.getElementById('overlayClose');
  const overlayLinks = navOverlay ? navOverlay.querySelectorAll('a') : [];

  function openMenu() {
    hamburger.classList.add('active');
    navOverlay.classList.add('open');
    document.body.style.overflow = 'hidden';
    hamburger.setAttribute('aria-expanded', 'true');
  }

  function closeMenu() {
    hamburger.classList.remove('active');
    navOverlay.classList.remove('open');
    document.body.style.overflow = '';
    hamburger.setAttribute('aria-expanded', 'false');
  }

  if (hamburger) hamburger.addEventListener('click', openMenu);
  if (overlayClose) overlayClose.addEventListener('click', closeMenu);
  overlayLinks.forEach(function (link) {
    link.addEventListener('click', closeMenu);
  });

  /* ── 3. Active nav link on scroll ── */
  const navLinks = document.querySelectorAll('.nav-links a[href^="#"]');
  const sections = [];
  navLinks.forEach(function (link) {
    const id = link.getAttribute('href').slice(1);
    const el = document.getElementById(id);
    if (el) sections.push({ link: link, el: el });
  });

  function updateActiveLink() {
    const scrollPos = window.scrollY + 120;
    let current = null;
    sections.forEach(function (s) {
      if (s.el.offsetTop <= scrollPos) current = s;
    });
    navLinks.forEach(function (l) { l.classList.remove('active'); });
    if (current) current.link.classList.add('active');
  }

  /* ── 4. Scroll Reveal ── */
  const revealEls = document.querySelectorAll('.reveal');
  const revealObserver = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          revealObserver.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
  );
  revealEls.forEach(function (el) { revealObserver.observe(el); });

  /* ── 5. Counter Animation ── */
  function easeOutQuad(t) { return t * (2 - t); }

  function animateCounter(el) {
    const target = parseInt(el.dataset.target, 10);
    const duration = 1800;
    const start = performance.now();

    function step(now) {
      const elapsed = now - start;
      const progress = Math.min(elapsed / duration, 1);
      const value = Math.floor(easeOutQuad(progress) * target);
      el.textContent = value.toLocaleString();
      if (progress < 1) requestAnimationFrame(step);
      else el.textContent = target.toLocaleString();
    }

    requestAnimationFrame(step);
  }

  const counterEls = document.querySelectorAll('.counter[data-target]');
  const counterObserver = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          counterObserver.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.5 }
  );
  counterEls.forEach(function (el) { counterObserver.observe(el); });

  /* ── 6. Back-to-top button ── */
  const backToTop = document.getElementById('backToTop');
  function handleBackToTop() {
    if (backToTop) {
      if (window.scrollY > 400) {
        backToTop.classList.add('visible');
      } else {
        backToTop.classList.remove('visible');
      }
    }
  }
  if (backToTop) {
    backToTop.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /* ── 7. Throttled scroll handler ── */
  const onScroll = throttle(function () {
    handleNavScroll();
    updateActiveLink();
    handleBackToTop();
  }, 80);

  window.addEventListener('scroll', onScroll, { passive: true });
  // Initial call
  handleNavScroll();
  updateActiveLink();
  handleBackToTop();

  /* ── 8. Contact Form Validation ── */
  const contactForm = document.getElementById('contactForm');

  function showError(input, msg) {
    input.classList.add('error');
    const errEl = input.parentElement.querySelector('.form-error');
    if (errEl) {
      errEl.textContent = msg;
      errEl.classList.add('show');
    }
  }

  function clearError(input) {
    input.classList.remove('error');
    const errEl = input.parentElement.querySelector('.form-error');
    if (errEl) errEl.classList.remove('show');
  }

  function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  function validatePhone(phone) {
    return /^[\d\s\+\-\(\)]{7,20}$/.test(phone);
  }

  if (contactForm) {
    // Live validation
    contactForm.querySelectorAll('input, select, textarea').forEach(function (field) {
      field.addEventListener('input', function () {
        if (field.value.trim()) clearError(field);
      });
    });

    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();
      let valid = true;

      const nameEl    = document.getElementById('formName');
      const phoneEl   = document.getElementById('formPhone');
      const emailEl   = document.getElementById('formEmail');
      const serviceEl = document.getElementById('formService');
      const messageEl = document.getElementById('formMessage');

      // Clear previous errors
      [nameEl, phoneEl, emailEl, serviceEl, messageEl].forEach(clearError);

      if (!nameEl || nameEl.value.trim().length < 2) {
        showError(nameEl, 'Please enter your full name (min 2 characters).');
        valid = false;
      }

      if (!phoneEl || !validatePhone(phoneEl.value.trim())) {
        showError(phoneEl, 'Please enter a valid phone number.');
        valid = false;
      }

      if (!emailEl || !validateEmail(emailEl.value.trim())) {
        showError(emailEl, 'Please enter a valid email address.');
        valid = false;
      }

      if (!messageEl || messageEl.value.trim().length < 10) {
        showError(messageEl, 'Please enter a message (min 10 characters).');
        valid = false;
      }

      if (!valid) return;

      // Simulate form submission
      const submitBtn = contactForm.querySelector('button[type="submit"]');
      if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.textContent = 'Sending…';
      }

      setTimeout(function () {
        const successEl = document.getElementById('formSuccess');
        if (successEl) successEl.classList.add('show');
        contactForm.reset();
        if (submitBtn) {
          submitBtn.disabled = false;
          submitBtn.innerHTML = '<i class="fas fa-paper-plane"></i> Send Message';
        }
        setTimeout(function () {
          if (successEl) successEl.classList.remove('show');
        }, 5000);
      }, 1000);
    });
  }

  /* ── 9. Smooth scrolling for anchor links ── */
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const id = this.getAttribute('href');
      if (id === '#') return;
      const target = document.querySelector(id);
      if (target) {
        e.preventDefault();
        const offset = 80; // navbar height
        const top = target.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top: top, behavior: 'smooth' });
      }
    });
  });

  /* ── 10. Hero Slideshow ── */
  const slides = document.querySelectorAll('.hero-slide');
  let currentSlide = 0;
  let slideshowInterval = null;

  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function showSlide(index) {
    slides.forEach(function (s) { s.classList.remove('active'); });
    slides[index].classList.add('active');
  }

  function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
  }

  function startSlideshow() {
    if (prefersReduced || slides.length < 2) return;
    slideshowInterval = setInterval(nextSlide, 5000);
  }

  function stopSlideshow() {
    clearInterval(slideshowInterval);
  }

  if (slides.length > 0) {
    showSlide(0);
    startSlideshow();

    // Pause on hidden tab
    document.addEventListener('visibilitychange', function () {
      if (document.hidden) stopSlideshow();
      else startSlideshow();
    });
  }

})();
