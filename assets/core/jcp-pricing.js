(() => {
  const scriptSrc = document.currentScript && document.currentScript.src ? document.currentScript.src : '';
  const fallbackBase = scriptSrc.includes('/core/')
    ? scriptSrc.split('/core/')[0]
    : '';
  const assetBase = () => window.JCP_ASSET_BASE || fallbackBase;
  const icon = (name) => `${assetBase()}/shared/assets/icons/lucide/${name}.svg`;

  window.renderPricing = () => {
    const root = document.getElementById('jcp-app');
    if (!root) return;

    root.innerHTML = `
      <main class="jcp-marketing jcp-pricing-page">
        <section class="jcp-section jcp-hero">
          <div class="jcp-hero-glow"></div>
          <div class="jcp-container jcp-hero-grid">
            <div class="jcp-hero-copy">
              <p class="jcp-eyebrow">Pricing</p>
              <h1>Invest in proof that wins more jobs</h1>
              <p class="jcp-lead">
                JobCapturePro pays for itself by turning real work into reviews, visibility, and trust
                that drives inbound demand.
              </p>
              <div class="jcp-actions">
                <a class="btn btn-primary" href="/early-access">Join Early Access</a>
                <a class="btn btn-secondary" href="/demo">See the Demo</a>
              </div>
              <div class="jcp-hero-metrics">
                <div>
                  <span class="jcp-metric">Proof → trust</span>
                  <span class="jcp-metric-label">wins more jobs</span>
                </div>
                <div>
                  <span class="jcp-metric">Automated</span>
                  <span class="jcp-metric-label">no extra labor</span>
                </div>
                <div>
                  <span class="jcp-metric">Local lift</span>
                  <span class="jcp-metric-label">map visibility</span>
                </div>
              </div>
            </div>
            <div class="jcp-hero-card jcp-preview jcp-float">
              <div class="jcp-preview-header">
                <span class="jcp-preview-pill jcp-badge-pulse">ROI focus</span>
                <span class="jcp-preview-title">Proof → visibility → revenue</span>
              </div>
              <div class="jcp-preview-grid">
                <div class="jcp-preview-card">
                  <img src="${icon('star')}" alt="" />
                  <p>More reviews</p>
                </div>
                <div class="jcp-preview-card">
                  <img src="${icon('map-pin')}" alt="" />
                  <p>Better local rank</p>
                </div>
                <div class="jcp-preview-card">
                  <img src="${icon('phone')}" alt="" />
                  <p>More inbound calls</p>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="jcp-section jcp-trust">
          <div class="jcp-container jcp-trust-grid">
            <div class="jcp-trust-card">
              <h3>Earn trust fast</h3>
              <p>Verified job posts turn your website into proof customers believe.</p>
            </div>
            <div class="jcp-trust-card">
              <h3>Stay visible locally</h3>
              <p>More completed jobs = more local coverage and ranking movement.</p>
            </div>
            <div class="jcp-trust-card">
              <h3>Reviews on autopilot</h3>
              <p>Requests go out automatically, so reviews grow without effort.</p>
            </div>
          </div>
        </section>

        <section class="jcp-section">
          <div class="jcp-container">
            <div class="jcp-section-header">
              <h2>Choose the plan that matches your growth</h2>
              <p>Each tier aligns to business maturity and visibility goals.</p>
            </div>
            <div class="jcp-pricing-grid">
              <article class="jcp-pricing-card">
                <div class="jcp-plan-head">
                  <h3>Starter</h3>
                  <p>For solo operators and small teams building proof.</p>
                </div>
                <div class="jcp-plan-pill">Build trust fast</div>
                <ul class="jcp-plan-list">
                  <li>One location</li>
                  <li>Photo → proof workflow</li>
                  <li>Website embedding + SEO-ready check-ins</li>
                </ul>
                <a class="btn btn-secondary" href="/early-access">Join Early Access</a>
              </article>

              <article class="jcp-pricing-card jcp-pricing-featured">
                <div class="jcp-plan-tag">Most popular</div>
                <div class="jcp-plan-head">
                  <h3>Scale</h3>
                  <p>For growing teams automating jobs, reviews, and posting.</p>
                </div>
                <div class="jcp-plan-pill">Automate visibility</div>
                <ul class="jcp-plan-list">
                  <li>CRM integrations</li>
                  <li>Automated reviews</li>
                  <li>Social + GBP automation</li>
                  <li>Local visibility reporting</li>
                </ul>
                <a class="btn btn-primary" href="/early-access">Join Early Access</a>
              </article>

              <article class="jcp-pricing-card">
                <div class="jcp-plan-head">
                  <h3>Enterprise</h3>
                  <p>For multi-location brands and agencies.</p>
                </div>
                <div class="jcp-plan-pill">Scale across locations</div>
                <ul class="jcp-plan-list">
                  <li>Multi-location governance</li>
                  <li>API access</li>
                  <li>Advanced reporting</li>
                  <li>White-labeling</li>
                  <li>Dedicated success support</li>
                </ul>
                <a class="btn btn-secondary" href="/early-access">Talk to us</a>
              </article>

              <article class="jcp-pricing-card">
                <div class="jcp-plan-head">
                  <h3>Enterprise+</h3>
                  <p>Contact for custom rollout and partner support.</p>
                </div>
                <div class="jcp-plan-pill">Custom partnerships</div>
                <ul class="jcp-plan-list">
                  <li>Custom security and SSO</li>
                  <li>Partner enablement</li>
                  <li>Strategic roadmap planning</li>
                </ul>
                <a class="btn btn-secondary" href="/early-access">Contact sales</a>
              </article>
            </div>
          </div>
        </section>

        <section class="jcp-section jcp-compare">
          <div class="jcp-container">
            <div class="jcp-section-header">
              <h2>Compare plans by outcome</h2>
              <p>Capture, publish, reviews, visibility, and reporting—organized for quick decisions.</p>
            </div>
            <div class="jcp-compare-table">
              <div class="jcp-compare-row jcp-compare-head">
                <div>Outcome area</div>
                <div>Starter</div>
                <div>Scale</div>
                <div>Enterprise</div>
              </div>
              <div class="jcp-compare-row jcp-compare-group">
                <div>Capture</div>
                <div>Single location check-ins</div>
                <div>CRM + photo capture</div>
                <div>Multi-location capture controls</div>
              </div>
              <div class="jcp-compare-row">
                <div>Publish</div>
                <div>Website embeds</div>
                <div>Website + social + GBP</div>
                <div>White-label publishing</div>
              </div>
              <div class="jcp-compare-row jcp-compare-group">
                <div>Reviews</div>
                <div>Basic review prompts</div>
                <div>Automated review engine</div>
                <div>Custom review workflows</div>
              </div>
              <div class="jcp-compare-row">
                <div>Visibility</div>
                <div>Directory listing</div>
                <div>Job map + rank tracking</div>
                <div>Advanced visibility reporting</div>
              </div>
              <div class="jcp-compare-row jcp-compare-group">
                <div>Reporting</div>
                <div>Weekly summaries</div>
                <div>Local visibility reporting</div>
                <div>Multi-location dashboards</div>
              </div>
            </div>
            <div class="jcp-actions jcp-compare-actions">
              <a class="btn btn-primary" href="/early-access">Join Early Access</a>
              <a class="btn btn-secondary" href="/demo">See the Demo</a>
            </div>
          </div>
        </section>

        <footer class="jcp-footer">
          <div class="jcp-container jcp-footer-grid">
            <div class="jcp-footer-brand">
              <img src="https://jobcapturepro.com/wp-content/uploads/2025/11/JobCapturePro-Logo-Dark.png" alt="JobCapturePro" />
              <p>Turn real job photos into proof, visibility, reviews, and more jobs.</p>
            </div>
            <div class="jcp-footer-col">
              <h4>Product</h4>
              <a href="/demo">Live demo</a>
              <a href="/directory">Directory</a>
              <a href="/estimate">Estimate builder</a>
            </div>
            <div class="jcp-footer-col">
              <h4>Company</h4>
              <a href="/pricing">Pricing</a>
              <a href="/early-access">Founding crew</a>
              <a href="/#how-it-works">How it works</a>
            </div>
          </div>
        </footer>
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
