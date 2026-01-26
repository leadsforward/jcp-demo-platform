(() => {
  const header = document.getElementById('jcpGlobalHeader');
  if (!header) return;

  const menuToggle = document.getElementById('mobileMenuToggle');
  const menuClose = document.getElementById('mobileMenuClose');
  const menuOverlay = document.getElementById('mobileMenuOverlay');

  const initMobileMenu = () => {
    if (!menuToggle || !menuClose || !menuOverlay) return;

    menuToggle.addEventListener('click', () => {
      menuOverlay.classList.add('active');
      menuToggle.classList.add('active');
      document.body.style.overflow = 'hidden';
    });

    const closeMenu = () => {
      menuOverlay.classList.remove('active');
      menuToggle.classList.remove('active');
      document.body.style.overflow = '';
    };

    menuClose.addEventListener('click', closeMenu);
    menuOverlay.addEventListener('click', (e) => {
      if (e.target === menuOverlay) {
        closeMenu();
      }
    });

    document.querySelectorAll('.mobile-nav-link').forEach((link) => {
      link.addEventListener('click', () => closeMenu());
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && menuOverlay.classList.contains('active')) {
        closeMenu();
      }
    });
  };

  const initScroll = () => {
    const onScroll = () => {
      header.classList.toggle('is-scrolled', window.scrollY > 12);
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  };

  const initNavLinks = () => {
    const root = document.getElementById('jcp-app');
    const page = root ? root.dataset.jcpPage : 'home';
    const isHome = page === 'home';
    const isDemoPage = ['demo', 'directory', 'company'].includes(page);
    const badge = document.getElementById('jcpHeaderIndicator');
    const mobileBadge = document.getElementById('jcpMobileBadge');

    if (badge) {
      badge.classList.toggle('is-hidden', !isDemoPage);
    }
    if (mobileBadge) {
      mobileBadge.classList.toggle('is-hidden', !isDemoPage);
    }

    document.querySelectorAll('[data-home-anchor]').forEach((link) => {
      const anchor = link.getAttribute('data-home-anchor');
      if (!anchor) return;
      link.setAttribute('href', isHome ? anchor : `/#${anchor.replace('#', '')}`);
    });

    document.querySelectorAll('.nav-link').forEach((link) => {
      link.classList.remove('is-active');
    });
    document.querySelectorAll('.mobile-nav-link').forEach((link) => {
      link.classList.remove('is-active');
    });

    if (page === 'pricing') {
      document.querySelectorAll(`.nav-link[href="/pricing"]`).forEach((link) => link.classList.add('is-active'));
      document.querySelectorAll(`.mobile-nav-link[href="/pricing"]`).forEach((link) => link.classList.add('is-active'));
    }
  };

  initMobileMenu();
  initScroll();
  initNavLinks();
})();
