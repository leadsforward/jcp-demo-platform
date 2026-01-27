(() => {
  const scriptSrc = document.currentScript && document.currentScript.src ? document.currentScript.src : '';
  const fallbackBase = scriptSrc.includes('/core/')
    ? scriptSrc.split('/core/')[0]
    : '';
  const assetBase = () => window.JCP_ASSET_BASE || fallbackBase;
  const icon = (name) => `${assetBase()}/shared/assets/icons/lucide/${name}.svg`;

  // Pricing-specific FAQ items
  const pricingFAQItems = [
    {
      id: 'faq-pricing-setup',
      question: 'How fast can we launch?',
      answer: 'Most companies are live within a few days. We connect your website, set up your locations, and turn on the channels you want so job activity can start publishing immediately.'
    },
    {
      id: 'faq-pricing-integrations',
      question: 'What integrations do you support?',
      answer: 'JobCapturePro supports HouseCall Pro, CompanyCam, Workiz, and QuickBooks today. If you use a different system and it has an API, we can evaluate a custom integration for higher tier plans.'
    },
    {
      id: 'faq-pricing-locations',
      question: 'Can we use JobCapturePro for multiple locations?',
      answer: 'Yes. Each location can have its own Google Business Profile and connected social accounts, with organization level management for multi location teams.'
    },
    {
      id: 'faq-pricing-pricing',
      question: 'What is included in each plan?',
      answer: 'All plans include core features like photo capture, proof generation, and basic publishing. Higher tiers add CRM integrations, automated reviews, social automation, and advanced reporting. See the comparison table above for details.'
    },
    {
      id: 'faq-pricing-trial',
      question: 'Is there a free trial?',
      answer: 'We offer early access pricing for founding members. Contact us to learn more about current offers and see if you qualify for special pricing.'
    },
    {
      id: 'faq-pricing-cancel',
      question: 'Can I change plans or cancel?',
      answer: 'Yes, you can upgrade, downgrade, or cancel your plan at any time. Changes take effect at your next billing cycle.'
    }
  ];

  window.renderPricing = () => {
    const root = document.getElementById('jcp-app');
    if (!root) return;

    // Load FAQ component if available
    const faqHTML = typeof window.renderFAQ === 'function' 
      ? window.renderFAQ({
          title: 'Pricing FAQ',
          subtitle: 'Common questions about plans, pricing, and getting started.',
          items: pricingFAQItems,
          id: 'pricing-faq'
        })
      : '';

    root.innerHTML = `
      <main class="jcp-marketing jcp-pricing-page">
        <section class="jcp-section jcp-hero">
          <div class="jcp-container">
            <div class="jcp-hero-grid">
              <div class="jcp-hero-copy">
                <h1 class="jcp-hero-title">Invest in proof that wins more jobs</h1>
                <p class="jcp-hero-subtitle">
                  JobCapturePro pays for itself by turning real work into reviews, visibility, and trust that drives inbound demand.
                </p>
                <div class="jcp-actions">
                  <a class="btn btn-primary" href="/early-access">Join Early Access</a>
                  <a class="btn btn-secondary" href="/demo">See the Demo</a>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="jcp-section rankings-section">
          <div class="jcp-container">
            <div class="rankings-header">
              <h2>Choose the plan that matches your growth</h2>
              <p class="rankings-subtitle">Each tier aligns to business maturity and visibility goals.</p>
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

        <section class="jcp-section rankings-section">
          <div class="jcp-container">
            <div class="rankings-header">
              <h2>Compare plans by outcome</h2>
              <p class="rankings-subtitle">Capture, publish, reviews, visibility, and reporting—organized for quick decisions.</p>
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

        ${faqHTML}
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
