# Refactor Audit (Phase A) — jobcapturepro-core

> Scope: **Audit only** (no file moves). This documents the current enqueue + reference graph to support an incremental, testable refactor without UI changes.

## How assets resolve in this theme (critical)

Enqueues use helper functions in `inc/helpers.php`:

- `jcp_core_enqueue_style($handle, $relative_path, $deps = [])`
- `jcp_core_enqueue_script($handle, $relative_path, $deps = [])`

Both helpers resolve a relative path using:

1. Check **theme root** for the file (`get_stylesheet_directory() . "/$relative_path"`).
2. If not found, fall back to **`/assets/`** (`get_stylesheet_directory() . "/assets/$relative_path"`).

This means many enqueued paths like `core/jcp-home.js` actually load from `assets/core/jcp-home.js` (because there is no `/core/` folder at theme root).

## Page routing / detection (what “where used” means)

Page detection is centralized in `inc/helpers.php::jcp_core_get_page_detection()` and used by `inc/enqueue.php`.

Key booleans:

- `is_home`: front page OR `/` OR `/home`
- `is_pricing`: template `page-pricing.php` OR slug `/pricing`
- `is_early_access`: template `page-early-access.php` OR slug `/early-access`
- `is_demo`: template `page-demo.php` OR slug `/demo`
- `is_directory`: template `page-directory.php` OR slug `/directory`
- `is_estimate`: template `page-estimate.php` OR slug `/estimate`
- `is_company`: single `jcp_company` OR `/company`
- `is_design_system`: template `page-design-system.php` OR `/design-system`
- `is_ui_library`: template `page-ui-library.php` OR `/ui-library`

Additionally, `inc/template-routes.php` maps **404s** for common routes (demo/pricing/early-access/directory/estimate/company/design-system/ui-library) to the corresponding template file.

## CSS enqueues (handle → file → where used)

Source of truth: `inc/enqueue.php` (plus helper resolution in `inc/helpers.php`).

### Global / base system

| Handle | Relative path | Resolved location | Where used (condition) |
|---|---|---|---|
| `jcp-core-base` | `css/base.css` | `/css/base.css` | **All pages** (always enqueued) + also explicitly on design-system and ui-library paths |
| `jcp-core-layout` | `css/layout.css` | `/css/layout.css` | Marketing pages (`is_home` \|\| `is_pricing` \|\| `is_early_access`), design-system, ui-library |
| `jcp-core-buttons` | `css/buttons.css` | `/css/buttons.css` | Marketing pages; also minimal pages (non-marketing) load buttons after base |
| `jcp-core-components` | `css/components.css` | `/css/components.css` | Marketing pages; also minimal pages |
| `jcp-core-utilities` | `css/utilities.css` | `/css/utilities.css` | Marketing pages; also minimal pages |

### Marketing pages

| Handle | Relative path | Resolved location | Where used (condition) |
|---|---|---|---|
| `jcp-core-directory` | `css/pages/directory.css` | `/css/pages/directory.css` | Home (`is_home`) + UI Library (`is_ui_library`) (dependency: components) |
| `jcp-core-home` | `css/pages/home.css` | `/css/pages/home.css` | Home (`is_home`) + UI Library (`is_ui_library`) (dependency: directory) |
| `jcp-core-pricing` | `css/pages/pricing.css` | `/css/pages/pricing.css` | Pricing (`is_pricing`) |
| `jcp-core-home-faq` | `css/pages/home/faq.css` | `/css/pages/home/faq.css` | Pricing (`is_pricing`) (depends on pricing) |
| `jcp-core-early-access` | `css/pages/early-access.css` | `/css/pages/early-access.css` | Early access (`is_early_access`) |
| `jcp-core-home-final-cta` | `css/pages/home/final-cta.css` | `/css/pages/home/final-cta.css` | Early access (`is_early_access`) — explicitly enqueued to reuse homepage CTA styles |

### Demo / directory / company / estimate

| Handle | Relative path | Resolved location | Where used (condition) |
|---|---|---|---|
| `jcp-core-demo` | `css/pages/demo.css` | `/css/pages/demo.css` | Demo (`is_demo`), Directory (`is_directory`), Company (`is_company`), Estimate (`is_estimate`) |
| `jcp-core-survey` | `css/pages/survey.css` | `/css/pages/survey.css` | Demo (`is_demo`) when `?mode` is **not** `run` (depends on demo.css) |
| `jcp-core-leaflet` | `demo/leaflet/leaflet.css` | `/assets/demo/leaflet/leaflet.css` | Demo (`is_demo`) when `?mode=run` (depends on demo.css) |
| `jcp-core-directory` | `css/pages/directory-consolidated.css` | `/css/pages/directory-consolidated.css` | Directory (`is_directory`) (depends on utilities) |
| `jcp-core-directory-trust` | `css/pages/directory-trust.css` | `/css/pages/directory-trust.css` | Directory (`is_directory`) and Company (`is_company`) (depends on directory-consolidated) |
| `jcp-core-profile` | `css/pages/profile-consolidated.css` | `/css/pages/profile-consolidated.css` | Company (`is_company`) (depends on directory-consolidated) |
| `jcp-core-estimate` | `css/pages/estimate.css` | `/css/pages/estimate.css` | Estimate (`is_estimate`) |

### Internal documentation pages

| Handle | Relative path | Resolved location | Where used (condition) |
|---|---|---|---|
| `jcp-core-design-system-page` | `css/design-system-page.css` | `/css/design-system-page.css` | Design System page (`is_design_system`) |

### CSS dequeues/deregisters

In `functions.php`:

- Dequeues/deregisters `tailwind`, `tailwindcss`, and `tailwind.min.css` late (`priority 999`).

## JS enqueues (handle → file → where used)

Source of truth: `inc/enqueue.php` (plus helper resolution in `inc/helpers.php`).

### Global / core

| Handle | Relative path | Resolved location | Where used (condition) |
|---|---|---|---|
| `jcp-core-nav` | `core/jcp-nav.js` | `/assets/core/jcp-nav.js` | **All pages** (always) |
| `jcp-core-render` | `core/jcp-render.js` | `/assets/core/jcp-render.js` | **All pages** (always) — depends on per-page renderers |

Inline JS added via `wp_add_inline_script()` in `inc/enqueue.php`:

- Before `jcp-core-render`: `window.JCP_ENV`, `window.JCP_CONFIG`, `window.JCP_ASSET_BASE`
- Before `jcp-core-directory`: `window.JCP_DIRECTORY_DATA = {...}`
- Before `jcp-core-profile`: `window.JCP_PROFILE_DATA = {...}`

### Marketing pages

| Handle | Relative path | Resolved location | Where used (condition) |
|---|---|---|---|
| `jcp-core-home` | `core/jcp-home.js` | `/assets/core/jcp-home.js` | Home (`is_home`) |
| `jcp-shared-faq` | `shared/jcp-faq.js` | `/assets/shared/jcp-faq.js` | Pricing (`is_pricing`) |
| `jcp-core-pricing` | `core/jcp-pricing.js` | `/assets/core/jcp-pricing.js` | Pricing (`is_pricing`) (depends on `jcp-shared-faq`) |
| `jcp-core-early-access` | `core/jcp-early-access.js` | `/assets/core/jcp-early-access.js` | Early access (`is_early_access`) |

### Demo / directory / company / estimate

| Handle | Relative path | Resolved location | Where used (condition) |
|---|---|---|---|
| `jcp-core-leaflet` | `demo/leaflet/leaflet.js` | `/assets/demo/leaflet/leaflet.js` | Demo (`is_demo`) when `?mode=run` (depends on `jcp-core-render`) |
| `jcp-core-demo` | `demo/jcp-demo.js` | `/assets/demo/jcp-demo.js` | Demo (`is_demo`) when `?mode=run` (depends on leaflet) |
| `jcp-core-survey` | `survey/survey.js` | `/assets/survey/survey.js` | Demo (`is_demo`) when `?mode!=run` (depends on render) |
| `jcp-core-directory` | `directory/directory.js` | `/assets/directory/directory.js` | Directory (`is_directory`) (depends on render) |
| `jcp-core-profile` | `directory/profile.js` | `/assets/directory/profile.js` | Company (`is_company`) (depends on render) |
| `jcp-core-directory-integration` | `directory/directory-integration.js` | `/assets/directory/directory-integration.js` | Company (`is_company`) (depends on profile) |
| `jcp-core-analytics` | `estimate/analytics.js` | `/assets/estimate/analytics.js` | Estimate (`is_estimate`) (depends on render) |
| `jcp-core-requests` | `estimate/requests.js` | `/assets/estimate/requests.js` | Estimate (`is_estimate`) (depends on render) |
| `jcp-core-estimate` | `estimate/estimate-builder.js` | `/assets/estimate/estimate-builder.js` | Estimate (`is_estimate`) (depends on analytics+requests) |

## CSS imports / references (`@import`) — what gets pulled in transitively

### Home page bundle (`/css/pages/home.css`)

`css/pages/home.css` imports **9** section files:

- `css/pages/home/hero.css`
- `css/pages/home/how-it-works.css`
- `css/pages/home/features.css`
- `css/pages/home/outcomes.css`
- `css/pages/home/demo-preview.css`
- `css/pages/home/who-its-for.css`
- `css/pages/home/pricing-preview.css`
- `css/pages/home/faq.css`
- `css/pages/home/conversion.css`
- `css/pages/home/final-cta.css`

> Note: There is a duplicate `assets/css/pages/home.css` with a similar import list. It is **not enqueued** by current PHP logic (because `/css/pages/home.css` exists at theme root and wins resolution).

### Other page CSS imports

- `css/pages/demo.css` imports: `../../assets/shared/assets/demo.css`
- `css/pages/survey.css` imports: `../../assets/shared/assets/survey.css`
- `css/pages/estimate.css` imports: `../../assets/estimate/estimate-builder.css`

### Legacy/duplicate CSS tree (`assets/css/**`)

Findings:

- `assets/css/base.css` imports `../shared/assets/demo.css`
- Many docs mention `assets/css/...`, but the runtime enqueues currently point to `/css/...` (root) and will only fall back to `/assets/css/...` if the root file is missing.

## Static HTML templates & “prototype” folders — reference audit

Important: `assets/core/jcp-render.js` loads several **HTML templates** into the `#jcp-app` container for some routes. It also strips:

- All `<link rel="stylesheet">` elements from the loaded HTML template
- All `<script>` tags from the loaded HTML template (keeps and re-injects **inline scripts only**)

So CSS/JS referenced inside those HTML files is typically **not used at runtime** (WP enqueues provide styles/scripts instead). The HTML is used primarily as a **markup template**.

### `assets/demo/**`

**Runtime references found:**

- Enqueued on demo `?mode=run`:
  - `demo/leaflet/leaflet.css` → `assets/demo/leaflet/leaflet.css`
  - `demo/leaflet/leaflet.js` → `assets/demo/leaflet/leaflet.js`
  - `demo/jcp-demo.js` → `assets/demo/jcp-demo.js`
- Template loaded by renderer:
  - `assets/core/jcp-render.js` loads `${assetBase}/demo/index.html` when `page=demo` and `?mode=run`

**Static-only references:**

- `assets/demo/index.html` references Leaflet via CDN + shared demo CSS in `<link>` tags (but those `<link>` tags are removed by `jcp-render.js` when loaded as a template).

Status: **USED** (do not remove).

### `assets/directory/**` (including HTML)

**Runtime references found:**

- Templates loaded by renderer:
  - `${assetBase}/directory/index.html`
  - `${assetBase}/directory/profile.html`
- JS enqueued:
  - `directory/directory.js` → `assets/directory/directory.js`
  - `directory/profile.js` → `assets/directory/profile.js`
  - `directory/directory-integration.js` → `assets/directory/directory-integration.js`

**Static-only references:**

- `assets/directory/index.html` and `assets/directory/profile.html` include `<link rel="stylesheet" href="directory.css">` / `profile.css`, etc. These are removed by `jcp-render.js` when used as templates.

Status: **USED** (templates + JS).  
Suspected legacy within folder: `assets/directory/*.css` appears **not enqueued** by WP and likely only referenced by the static HTML (candidate for archive later, but prove via deeper search before removing).

### `assets/estimate/**`

**Runtime references found:**

- Template loaded by renderer:
  - `${assetBase}/estimate/index.html`
- JS enqueued:
  - `estimate/analytics.js` → `assets/estimate/analytics.js`
  - `estimate/requests.js` → `assets/estimate/requests.js`
  - `estimate/estimate-builder.js` → `assets/estimate/estimate-builder.js`
- CSS loaded via WP page CSS:
  - `css/pages/estimate.css` imports `../../assets/estimate/estimate-builder.css`

**Static-only references:**

- `assets/estimate/index.html` references `estimate-builder.css` / `estimate-builder.js` directly, but those `<link>` and `<script>` tags are removed by `jcp-render.js` when used as a template.

Status: **USED** (template + JS + CSS import).

### `assets/survey/**`

**Runtime references found:**

- Template loaded by renderer:
  - `${assetBase}/survey/index.html` (demo mode when `?mode!=run`)
- JS enqueued:
  - `survey/survey.js` → `assets/survey/survey.js`
- CSS loaded via WP page CSS:
  - `css/pages/survey.css` imports `../../assets/shared/assets/survey.css`

**Static-only references:**

- `assets/survey/index.html` contains `<link>` tags for demo/survey CSS and a `<script src="src/survey/survey.js">`; these are removed by `jcp-render.js` when used as a template.

Status: **USED** (template + JS + CSS import).

### Root `/css/**` folder (theme-root CSS)

**Runtime references found:**

- This is the primary stylesheet tree used by enqueues (`css/base.css`, `css/layout.css`, `css/components.css`, `css/utilities.css`, and `css/pages/**`).
- `css/pages/home.css` pulls in multiple section files via `@import`.

Status: **USED** (primary).

### `assets/css/**` folder (duplicate CSS tree)

**Runtime references found:**

- No direct enqueues point here *when* the matching root `/css/**` files exist.
- This tree is still reachable via helper fallback resolution if a root CSS file is missing (backwards-compat mechanism).

Status: **POSSIBLY LEGACY / DUPLICATE** (candidate for consolidation/retirement later; must prove no runtime dependency + check docs/CI tooling).

### `js/**` folder (theme-root JS)

Findings:

- There is a `js/core/nav.js` file in the repo, but the runtime enqueue uses `core/jcp-nav.js` → resolves to `assets/core/jcp-nav.js`.

Status: `js/**` appears **not referenced by current enqueues** (candidate for archive later; must prove via deeper search before removing).

## Initial “suspected cleanup candidates” (NOT removal — investigation targets)

These are **not safe-to-delete yet**; they are simply high-probability refactor targets based on current reference evidence:

1. **Duplicate CSS tree**: `assets/css/**` (appears not used at runtime when `/css/**` exists).
2. **Legacy JS tree**: `js/**` (appears not enqueued; `assets/core/**` is used instead).
3. **Legacy directory CSS** inside `assets/directory/*.css` (static HTML references only; WP enqueues use consolidated `/css/pages/directory-*.css`).
4. **Section-per-file CSS imports** under `css/pages/home/home/*.css` (currently pulled via `@import`).

## Notes for Phase B/C planning

- The current system already has the correct conceptual split (**base/layout/components/utilities + page CSS**), but:
  - Home still effectively loads many “section CSS” files via `@import`.
  - There is a parallel `assets/css/**` tree that likely reflects prior iterations.
  - Some runtime features use `assets/**` HTML templates purely as markup sources (`jcp-render.js`), which constrains how/when those folders can be archived.

