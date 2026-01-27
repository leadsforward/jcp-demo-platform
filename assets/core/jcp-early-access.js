(() => {
  const scriptSrc = document.currentScript && document.currentScript.src ? document.currentScript.src : '';
  const fallbackBase = scriptSrc.includes('/core/')
    ? scriptSrc.split('/core/')[0]
    : '';
  const assetBase = () => window.JCP_ASSET_BASE || fallbackBase;
  const icon = (name) => `${assetBase()}/shared/assets/icons/lucide/${name}.svg`;

  window.renderEarlyAccess = () => {
    const root = document.getElementById('jcp-app');
    if (!root) return;

    root.innerHTML = `
      <main class="jcp-marketing jcp-early-access-page">
        <section class="jcp-section jcp-hero">
          <div class="jcp-hero-glow"></div>
          <div class="jcp-container jcp-hero-grid">
            <div class="jcp-hero-copy">
              <p class="jcp-eyebrow">Founding Crew</p>
              <h1>Shape how contractors turn real work into real visibility</h1>
              <p class="jcp-lead">
                Join the Founding Crew and help define the platform that turns job photos into proof,
                rankings, and revenue.
              </p>
              <div class="jcp-actions">
                <a class="btn btn-primary" href="/early-access">Join the Founding Crew</a>
                <a class="btn btn-secondary" href="/demo">See the Demo</a>
              </div>
              <div class="jcp-hero-metrics">
                <div>
                  <span class="jcp-metric">Founding access</span>
                  <span class="jcp-metric-label">before launch</span>
                </div>
                <div>
                  <span class="jcp-metric">Direct input</span>
                  <span class="jcp-metric-label">roadmap influence</span>
                </div>
                <div>
                  <span class="jcp-metric">Priority onboarding</span>
                  <span class="jcp-metric-label">white‑glove setup</span>
                </div>
              </div>
            </div>
            <div class="jcp-hero-card jcp-preview jcp-float">
              <div class="jcp-preview-header">
                <span class="jcp-preview-pill jcp-badge-pulse">Early access</span>
                <span class="jcp-preview-title">Get in before launch</span>
              </div>
              <div class="jcp-preview-grid">
                <div class="jcp-preview-card">
                  <img src="${icon('star')}" alt="" />
                  <p>Grandfathered pricing</p>
                </div>
                <div class="jcp-preview-card">
                  <img src="${icon('message-square')}" alt="" />
                  <p>Direct feedback loop</p>
                </div>
                <div class="jcp-preview-card">
                  <img src="${icon('trending-up')}" alt="" />
                  <p>Priority onboarding</p>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="jcp-section jcp-trust">
          <div class="jcp-container jcp-trust-grid">
            <div class="jcp-trust-card">
              <h3>Influence the product</h3>
              <p>Direct feedback loop with the team building the platform.</p>
            </div>
            <div class="jcp-trust-card">
              <h3>Lock in early pricing</h3>
              <p>Grandfathered pricing as the platform scales.</p>
            </div>
            <div class="jcp-trust-card">
              <h3>Launch‑ready support</h3>
              <p>Priority onboarding to help your team move fast.</p>
            </div>
          </div>
        </section>

        <section class="jcp-section">
          <div class="jcp-container">
            <div class="jcp-section-header">
              <h2>Why join the Founding Crew</h2>
              <p>Professional, focused, and built for operators who want real visibility.</p>
            </div>
            <div class="jcp-grid jcp-grid-tight">
              <article class="jcp-card">
                <img src="${icon('zap')}" alt="" />
                <h3>Early access to the platform</h3>
                <p>Get first access to the demo flow, directory, and automation stack.</p>
              </article>
              <article class="jcp-card">
                <img src="${icon('badge-check')}" alt="" />
                <h3>Grandfathered pricing</h3>
                <p>Lock in early pricing as the platform scales.</p>
              </article>
              <article class="jcp-card">
                <img src="${icon('users')}" alt="" />
                <h3>Direct feedback loop</h3>
                <p>Work directly with the team shaping the roadmap.</p>
              </article>
              <article class="jcp-card">
                <img src="${icon('target')}" alt="" />
                <h3>Influence key decisions</h3>
                <p>Help define what contractors need most from proof and visibility.</p>
              </article>
              <article class="jcp-card">
                <img src="${icon('check')}" alt="" />
                <h3>Priority onboarding</h3>
                <p>Get hands-on support so your team can move fast.</p>
              </article>
            </div>
          </div>
        </section>

        <section class="jcp-section jcp-final">
          <div class="jcp-container jcp-final-card">
            <div>
              <h2>Join the Founding Crew</h2>
              <p>Help shape the future of real-job visibility for contractors.</p>
            </div>
            <a class="btn btn-secondary" href="/early-access">Join the Founding Crew</a>
          </div>
        </section>
      </main>
    `;

    initMarketingNav();
  };

  function initMarketingNav() {
    const menuToggle = document.getElementById('mobileMenuToggle');
    const menuClose = document.getElementById('mobileMenuClose');
    const menuOverlay = document.getElementById('mobileMenuOverlay');

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
  }
})();
