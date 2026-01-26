(() => {
  const scriptSrc = document.currentScript && document.currentScript.src ? document.currentScript.src : '';
  const fallbackBase = scriptSrc.includes('/core/')
    ? scriptSrc.split('/core/')[0]
    : '';
  const assetBase = () => window.JCP_ASSET_BASE || fallbackBase;

  const icon = (name) => `${assetBase()}/shared/assets/icons/lucide/${name}.svg`;

  window.renderHome = () => {
    const root = document.getElementById('jcp-app');
    if (!root) return;

    root.innerHTML = `
      <main id="jcp-marketing" class="jcp-marketing jcp-home directory-shell">
        <section class="directory-hero jcp-hero jcp-hero--standard">
          <div class="hero-split jcp-grid-2">
              <div class="hero-copy jcp-hero-copy">
                <h1 class="jcp-hero-title">Turn every completed job into more calls and more customers</h1>
                <p class="jcp-hero-subtitle">
                  Your team already takes job photos. JobCapturePro automatically turns those jobs into website updates, Google visibility, social posts, directory listings, and review requests so your work keeps bringing in new business.
                </p>
                <div class="directory-cta-row jcp-actions">
                  <a class="btn btn-primary directory-cta directory-cta-secondary" href="/demo">Watch the Live Demo</a>
                  <a class="btn btn-secondary directory-cta" href="#how-it-works">Learn how it works</a>
                </div>
                <div class="directory-meta">
                  <div class="meta-item">
                    <div class="meta-label">
                      <img src="${icon('camera')}" class="meta-icon" alt="">
                      <strong>1 photo</strong>
                    </div>
                    <span>proof everywhere</span>
                  </div>
                  <div class="meta-item">
                    <div class="meta-label">
                      <img src="${icon('map')}" class="meta-icon" alt="">
                      <strong>4 channels</strong>
                    </div>
                    <span>website, directory, GBP, social</span>
                  </div>
                  <div class="meta-item">
                    <div class="meta-label">
                      <img src="${icon('clock')}" class="meta-icon" alt="">
                      <strong>0 busywork</strong>
                    </div>
                    <span>zero admin work</span>
                  </div>
                </div>
              </div>

              <div class="hero-visual jcp-hero-visual">
                <div class="hero-proof-stack">
                  <div class="hero-media-card">
                    <div class="hero-media-glow" aria-hidden="true"></div>
                    <img class="hero-media-image" src="http://jobcapturepro.com/wp-content/uploads/2025/12/jcp-user-photo.jpg" alt="Contractor capturing a job photo with JobCapturePro">
                    <div class="hero-media-shade" aria-hidden="true"></div>
                    <div class="hero-media-badge">
                      <span class="hero-media-pill">Real job proof</span>
                    </div>
                    <div class="hero-media-content">
                      <div class="hero-media-title">Verified job proof</div>
                      <div class="hero-media-subtitle">AI check-ins appear in minutes</div>
                    </div>
                    <div class="hero-media-stats">
                      <div class="hero-stat">
                        <img src="${icon('map-pin')}" class="hero-stat-icon" alt="">
                        <span class="hero-stat-label">Shows up on Google Maps</span>
                      </div>
                      <div class="hero-stat">
                        <img src="${icon('globe')}" class="hero-stat-icon" alt="">
                        <span class="hero-stat-label">Posted to your website</span>
                      </div>
                      <div class="hero-stat">
                        <img src="${icon('star')}" class="hero-stat-icon" alt="">
                        <span class="hero-stat-label">Review request sent</span>
                      </div>
                    </div>
                </div>
              </div>
            </div>
        </section>

        <section class="rankings-section" id="how-it-works">
          <div class="rankings-header">
            <h2>How JobCapturePro works</h2>
            <p class="rankings-subtitle">
              Every completed job becomes verified proof across every channel that matters. Here’s the simple flow your crew already knows.
            </p>
          </div>

          <div class="how-it-works-timeline">
            <h3 class="timeline-title">The proof pipeline</h3>
            <div class="timeline-steps">
              <div class="timeline-step">
                <div class="step-number">1</div>
                <div class="step-content">
                  <h4 class="step-title">Capture</h4>
                  <p class="step-description">Crew snaps a photo or the job completes in your CRM.</p>
                </div>
              </div>
              <div class="timeline-connector"></div>
              <div class="timeline-step">
                <div class="step-number">2</div>
                <div class="step-content">
                  <h4 class="step-title">AI Check-In</h4>
                  <p class="step-description">JobCapturePro generates the full check-in automatically.</p>
                </div>
              </div>
              <div class="timeline-connector"></div>
              <div class="timeline-step">
                <div class="step-number">3</div>
                <div class="step-content">
                  <h4 class="step-title">Publish</h4>
                  <p class="step-description">Website, directory, GBP, and social update instantly.</p>
                </div>
              </div>
              <div class="timeline-connector"></div>
              <div class="timeline-step">
                <div class="step-number">4</div>
                <div class="step-content">
                  <h4 class="step-title">Review</h4>
                  <p class="step-description">Smart review requests go out at the right moment.</p>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="rankings-section" id="features">
          <div class="rankings-header">
            <h2>Benefits that show up in the market</h2>
            <p class="rankings-subtitle">
              JobCapturePro creates proof customers can see, rankings that improve, and demand that compounds.
            </p>
          </div>

          <div class="ranking-factors-grid">
            <div class="ranking-factor-card">
              <div class="factor-icon-wrapper">
                <img src="${icon('badge-check')}" class="factor-icon" alt="">
              </div>
              <h3 class="factor-title">Verified proof</h3>
              <p class="factor-description">Real check-ins replace claims with proof homeowners trust.</p>
              <div class="factor-stat">
                <span class="stat-value">Proof</span>
                <span class="stat-label">from real jobs</span>
              </div>
            </div>
            <div class="ranking-factor-card">
              <div class="factor-icon-wrapper">
                <img src="${icon('map-pin')}" class="factor-icon" alt="">
              </div>
              <h3 class="factor-title">Local visibility</h3>
              <p class="factor-description">Fresh job activity drives stronger map coverage and ranking.</p>
              <div class="factor-stat">
                <span class="stat-value">Map</span>
                <span class="stat-label">coverage grows</span>
              </div>
            </div>
            <div class="ranking-factor-card">
              <div class="factor-icon-wrapper">
                <img src="${icon('message-square')}" class="factor-icon" alt="">
              </div>
              <h3 class="factor-title">Consistent presence</h3>
              <p class="factor-description">Social and GBP stay active without manual posting.</p>
              <div class="factor-stat">
                <span class="stat-value">Always</span>
                <span class="stat-label">on brand</span>
              </div>
            </div>
            <div class="ranking-factor-card">
              <div class="factor-icon-wrapper">
                <img src="${icon('star')}" class="factor-icon" alt="">
              </div>
              <h3 class="factor-title">More reviews</h3>
              <p class="factor-description">Requests go out while the job is fresh and credible.</p>
              <div class="factor-stat">
                <span class="stat-value">Reviews</span>
                <span class="stat-label">on autopilot</span>
              </div>
            </div>
          </div>
        </section>

        <section class="rankings-section" id="who-its-for">
          <div class="rankings-header">
            <h2>Built for contractors, owners, and crews</h2>
            <p class="rankings-subtitle">
              Designed for real job sites, real schedules, and real growth goals.
            </p>
          </div>

          <div class="guarantees-grid">
            <div class="guarantee-item">
              <div class="guarantee-icon">
                <img src="${icon('hard-hat')}" alt="">
              </div>
              <div class="guarantee-content">
                <strong>Contractors & Trades</strong>
                <p>Turn every completed job into proof that wins the next one.</p>
              </div>
            </div>
            <div class="guarantee-item">
              <div class="guarantee-icon">
                <img src="${icon('briefcase')}" alt="">
              </div>
              <div class="guarantee-content">
                <strong>Owners & Office Teams</strong>
                <p>Automate visibility without chasing photos or posts.</p>
              </div>
            </div>
            <div class="guarantee-item">
              <div class="guarantee-icon">
                <img src="${icon('camera')}" alt="">
              </div>
              <div class="guarantee-content">
                <strong>Field Crews</strong>
                <p>Capture once and move on — no extra admin work.</p>
              </div>
            </div>
          </div>
        </section>

        <section class="rankings-section directory-preview" id="directory-preview">
          <div class="rankings-header">
            <h2>Preview the live directory</h2>
            <p class="rankings-subtitle">
              This is exactly what prospects see — real work, verified activity, and earned rankings.
            </p>
          </div>

          <div class="directory-grid preview-grid">
            <a class="directory-card" href="/directory">
              <span class="directory-badge verified">Verified</span>
              <div class="card-header">
                <div class="company-mark">
                  <div class="company-avatar">SR</div>
                </div>
                <div class="card-header-content">
                  <h3 class="card-name">Summit Roofing</h3>
                </div>
              </div>
              <div class="card-location">
                <img src="${icon('map-pin')}" class="lucide-icon lucide-icon-xs" alt="">
                <span>Austin, TX</span>
              </div>
              <div class="card-meta-row">
                <span class="meta-inline">
                  <img src="${icon('camera')}" class="lucide-icon lucide-icon-xs" alt="">
                  82 jobs
                </span>
                <span class="meta-divider">·</span>
                <span class="meta-inline">
                  <img src="${icon('clock')}" class="lucide-icon lucide-icon-xs" alt="">
                  Active recently
                </span>
              </div>
              <div class="card-rating">
                <div class="stars">★★★★★</div>
                <span class="rating-text">4.9 (120)</span>
              </div>
              <div class="card-footer">
                <span class="view-profile">View activity</span>
              </div>
            </a>

            <a class="directory-card" href="/directory">
              <span class="directory-badge trusted">Trusted Pro</span>
              <div class="card-header">
                <div class="company-mark">
                  <div class="company-avatar">LP</div>
                </div>
                <div class="card-header-content">
                  <h3 class="card-name">Lakeview Plumbing</h3>
                </div>
              </div>
              <div class="card-location">
                <img src="${icon('map-pin')}" class="lucide-icon lucide-icon-xs" alt="">
                <span>Dallas, TX</span>
              </div>
              <div class="card-meta-row">
                <span class="meta-inline">
                  <img src="${icon('camera')}" class="lucide-icon lucide-icon-xs" alt="">
                  64 jobs
                </span>
                <span class="meta-divider">·</span>
                <span class="meta-inline">
                  <img src="${icon('clock')}" class="lucide-icon lucide-icon-xs" alt="">
                  Active today
                </span>
              </div>
              <div class="card-rating">
                <div class="stars">★★★★★</div>
                <span class="rating-text">4.8 (98)</span>
              </div>
              <div class="card-footer">
                <span class="view-profile">View activity</span>
              </div>
            </a>

            <a class="directory-card" href="/directory">
              <span class="directory-badge listed">Listed</span>
              <div class="card-header">
                <div class="company-mark">
                  <div class="company-avatar">HF</div>
                </div>
                <div class="card-header-content">
                  <h3 class="card-name">Heritage Fence Co.</h3>
                </div>
              </div>
              <div class="card-location">
                <img src="${icon('map-pin')}" class="lucide-icon lucide-icon-xs" alt="">
                <span>Houston, TX</span>
              </div>
              <div class="card-meta-row">
                <span class="meta-inline">
                  <img src="${icon('camera')}" class="lucide-icon lucide-icon-xs" alt="">
                  41 jobs
                </span>
                <span class="meta-divider">·</span>
                <span class="meta-inline">
                  <img src="${icon('clock')}" class="lucide-icon lucide-icon-xs" alt="">
                  Active this week
                </span>
              </div>
              <div class="card-rating">
                <div class="stars">★★★★★</div>
                <span class="rating-text">4.7 (64)</span>
              </div>
              <div class="card-footer">
                <span class="view-profile">View activity</span>
              </div>
            </a>
          </div>
        </section>

        <section class="rankings-section faq-section" id="faq">
          <div class="rankings-header">
            <h2>FAQ</h2>
            <p class="rankings-subtitle">Clear answers for contractors evaluating the system.</p>
          </div>
          <div class="faq-grid">
            <details class="faq-item">
              <summary>How fast can we launch?</summary>
              <p>Most teams are live in days. Once your crew uploads a job photo, JobCapturePro handles the rest.</p>
            </details>
            <details class="faq-item">
              <summary>Do crews need to learn new tools?</summary>
              <p>No. They only capture a photo or complete a job. The AI builds the check‑in and publishes.</p>
            </details>
            <details class="faq-item">
              <summary>Where does proof get published?</summary>
              <p>Your website, the JobCapturePro directory, Google Business Profile, and social — all automated.</p>
            </details>
            <details class="faq-item">
              <summary>Is this real activity or staged content?</summary>
              <p>Everything is tied to real jobs with location and timestamp verification.</p>
            </details>
          </div>
        </section>

        <section class="rankings-section">
          <div class="rankings-cta">
            <div class="cta-content">
              <h3>Ready to see it live?</h3>
              <p>Watch the demo and see how one job turns into real demand.</p>
            </div>
            <a class="btn rankings-cta-btn" href="/demo">Watch the Live Demo</a>
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

  };
})();
