# JobCapturePro Design System Contract

**Version**: 1.0  
**Last Updated**: January 27, 2026  
**Status**: BINDING — All code must comply

---

## 🎯 PURPOSE

This document is the **single enforceable standard** for all UI components, CSS, and layouts in the JobCapturePro theme.

- No component may violate these rules
- No hardcoded values are permitted
- No silent exceptions exist
- The homepage is the source of truth

---

## 🎨 COLORS

**All color usage must use CSS variables. No hex colors in component code.**

### Color Palette (24 Variables in base.css)

```css
/* Primary Brand */
--jcp-color-primary: #ff5036        /* Action, CTAs, emphasis */
--jcp-color-primary-light: #ff6a51  /* Hover states, lighter context */
--jcp-color-primary-dark: #e63e28   /* Pressed states, darker context */

/* Secondary (Dark Gray) */
--jcp-color-secondary: #1f2937      /* Headlines, strong text */
--jcp-color-secondary-light: #374151  /* Secondary headings */
--jcp-color-secondary-dark: #111827 /* Body text default */

/* Semantic */
--jcp-color-success: #10b981    /* Confirmed, verified, positive */
--jcp-color-warning: #f59e0b    /* Cautions, pending review */
--jcp-color-error: #ef4444      /* Errors, required attention */
--jcp-color-info: #3b82f6       /* Informational, secondary actions */

/* Backgrounds */
--jcp-color-bg-primary: #ffffff    /* Default container bg */
--jcp-color-bg-secondary: #f9fafb  /* Subtle bg, alt sections */
--jcp-color-bg-tertiary: #f3f4f6   /* Disabled, placeholder bg */
--jcp-color-bg-dark: #0b0f19       /* Dark mode, overlays */

/* Text */
--jcp-color-text-primary: #111827     /* Main body text, default */
--jcp-color-text-secondary: #6b7280   /* Secondary text, labels */
--jcp-color-text-tertiary: #9ca3af    /* Disabled, helper text */
--jcp-color-text-light: #ffffff       /* Text on dark backgrounds */

/* Borders */
--jcp-color-border: #e5e7eb      /* Card borders, dividers */
--jcp-color-border-light: #f3f4f6 /* Subtle borders */
```

### Usage Rules

```css
/* DO THIS */
.card {
  background: var(--jcp-color-bg-primary);
  border: 2px solid var(--jcp-color-border);
  color: var(--jcp-color-text-primary);
}

/* NEVER THIS */
.card {
  background: #ffffff;
  border: 2px solid #e5e7eb;
  color: #111827;
}
```

---

## 📐 SPACING

**All spacing must use the 8px-based scale. No arbitrary measurements.**

### Spacing Scale (10 Sizes)

```css
--jcp-space-xs: 4px     /* Micro spacing: icon gaps, tight padding */
--jcp-space-sm: 8px     /* Small: button padding internal */
--jcp-space-md: 16px    /* Base: card padding, section gaps */
--jcp-space-lg: 24px    /* Medium: section padding, component gaps */
--jcp-space-xl: 32px    /* Large: major spacing, grid gaps */
--jcp-space-2xl: 40px   /* Extra large: section headers, layout */
--jcp-space-3xl: 48px   /* XXL: major sections, hero margins */
--jcp-space-4xl: 56px   /* XXXL: page top/bottom */
--jcp-space-5xl: 64px   /* Massive: hero sections */
--jcp-space-6xl: 80px   /* Extreme: page spacing */
```

### Usage Rules

```css
/* DO THIS */
.card {
  padding: var(--jcp-space-2xl); /* 40px */
  margin-bottom: var(--jcp-space-lg); /* 24px */
  gap: var(--jcp-space-md); /* 16px */
}

.section {
  padding: var(--jcp-space-6xl) 0; /* 80px vertical */
}

/* NEVER THIS */
.card {
  padding: 40px;
  margin-bottom: 24px;
  gap: 16px;
}

.section {
  padding: 80px 0;
}
```

**Allowed exceptions**: None. No hardcoded measurements for any component.

---

## 🔤 TYPOGRAPHY

### Font Families

```css
--jcp-font-family-base: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
--jcp-font-family-mono: 'SF Mono', Monaco, 'Cascadia Code', 'Roboto Mono', Consolas, 'Courier New', monospace;
```

### Font Sizes (13 Steps)

```css
--jcp-font-size-xs: 12px    /* Helper text, badges */
--jcp-font-size-sm: 14px    /* Labels, secondary text */
--jcp-font-size-base: 16px  /* Default body text */
--jcp-font-size-lg: 18px    /* Paragraph emphasis */
--jcp-font-size-xl: 20px    /* Section subheadlines */
--jcp-font-size-2xl: 24px   /* Card titles, minor headings */
--jcp-font-size-3xl: 30px   /* Section titles */
--jcp-font-size-4xl: 36px   /* Page titles, hero subheadlines */
--jcp-font-size-5xl: 48px   /* Major headings */
--jcp-font-size-6xl: 60px   /* Hero headlines */
```

### Font Weights (5 Levels)

```css
--jcp-font-weight-normal: 400       /* Body text, regular */
--jcp-font-weight-medium: 500       /* Labels, emphasis */
--jcp-font-weight-semibold: 600     /* Subheadings, buttons */
--jcp-font-weight-bold: 700         /* Headings, strong emphasis */
--jcp-font-weight-extrabold: 800    /* Hero headlines */
```

### Line Heights (4 Levels)

```css
--jcp-line-height-tight: 1.2    /* Headlines, compact spacing */
--jcp-line-height-normal: 1.5   /* Default, body text */
--jcp-line-height-relaxed: 1.6  /* Extended text blocks */
--jcp-line-height-loose: 1.8    /* Maximum readability, long form */
```

### Usage Rules

```css
/* DO THIS */
h1 {
  font-size: var(--jcp-font-size-6xl);
  font-weight: var(--jcp-font-weight-bold);
  line-height: var(--jcp-line-height-tight);
}

p {
  font-size: var(--jcp-font-size-base);
  font-weight: var(--jcp-font-weight-normal);
  line-height: var(--jcp-line-height-normal);
}

/* NEVER THIS */
h1 {
  font-size: 60px;
  font-weight: 700;
  line-height: 1.2;
}

p {
  font-size: 16px;
  line-height: 1.5;
}
```

---

## 🔘 BUTTONS

**One unified button system. All buttons use `.btn` base class with modifiers.**

### Button Base Class

```html
<!-- Standard button -->
<a href="#" class="btn btn-primary btn-medium">Text</a>
```

### Button Variants (3 Total)

```css
.btn-primary    /* Orange background, white text - Main CTA */
.btn-secondary  /* White background, border, dark text - Secondary action */
.btn-ghost      /* No background, border, text only - Tertiary action */
```

### Button Sizes (3 Total)

```css
.btn-small      /* 36px height, 12px padding-h, 12px text */
.btn-medium     /* 44px height, 16px padding-h, 14px text - DEFAULT */
.btn-large      /* 52px height, 20px padding-h, 16px text */
```

### Button States

```css
/* All buttons support */
:hover          /* color shift, shadow lift */
:active         /* darken by 1 shade */
:focus          /* standard outline + ring */
:disabled       /* reduced opacity 0.6 */
```

### Complete Button Inventory

```css
/* Primary buttons */
.btn.btn-primary        /* Orange bg, white text */
.btn.btn-primary:hover  /* Lighter orange */

/* Secondary buttons */
.btn.btn-secondary      /* White bg, border, dark text */
.btn.btn-secondary:hover /* Border color shift */

/* Ghost buttons */
.btn.btn-ghost          /* Text only, no background */
.btn.btn-ghost:hover    /* Underline or slight bg */

/* With sizes */
.btn-small              /* 36px height */
.btn-medium             /* 44px height (default) */
.btn-large              /* 52px height */
```

### Special Cases (Limited)

```css
/* On dark backgrounds only */
.btn-on-dark-primary    /* Light text, dark bg */
.btn-on-dark-secondary  /* Light text, outlined */
```

### Usage Rules

```html
<!-- DO THIS -->
<a href="/demo" class="btn btn-primary btn-medium">Watch Demo</a>
<button class="btn btn-secondary btn-large">Learn More</button>
<a href="#" class="btn btn-ghost btn-small">Dismiss</a>

<!-- NEVER THIS -->
<a href="#" class="button button-orange large">Learn More</a>
<button style="background: #ff5036; padding: 12px 24px;">Click</button>
```

---

## 🎴 CARDS

**One unified card system. All card-like elements use `.card` base class.**

### Card Base

```html
<div class="card">
  <div class="card-header">
    <!-- Optional header -->
  </div>
  <div class="card-body">
    <!-- Content -->
  </div>
  <div class="card-footer">
    <!-- Optional footer -->
  </div>
</div>
```

### Card Variants (3 Types)

```css
.card           /* Default: white bg, border, padding, shadow */
.card.card--feature    /* Feature card: icon/image top, title, description */
.card.card--pricing    /* Pricing card: tier, price, features list, CTA */
```

### Card Features

```css
.card-header    /* Top section, optional icon or image */
.card-body      /* Main content area */
.card-footer    /* Bottom section, optional CTA */
.card--clickable  /* Entire card is clickable (no nested links) */
.card--featured   /* Visual emphasis (border color shift) */
```

### Card Styles (Applied Consistently)

```css
.card {
  background: var(--jcp-color-bg-primary);
  border: 2px solid var(--jcp-color-border);
  border-radius: var(--jcp-radius-xl);
  padding: var(--jcp-space-2xl);
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
  transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.card:hover {
  border-color: var(--jcp-color-primary);
  box-shadow: 0 12px 32px rgba(255, 80, 62, 0.15);
  transform: translateY(-6px);
}
```

### Usage Rules

```html
<!-- DO THIS -->
<div class="card card--feature">
  <div class="card-header">
    <img src="icon.svg" alt="" />
  </div>
  <div class="card-body">
    <h3>Title</h3>
    <p>Description</p>
  </div>
</div>

<!-- NEVER THIS -->
<div class="feature-box">
  <div class="feature-icon"></div>
  <h3>Title</h3>
  <p>Description</p>
</div>

<div style="background: white; border: 2px solid #e5e7eb; padding: 40px;">
  Content
</div>
```

---

## 📐 BORDERS & RADIUS

### Border Radius Scale (7 Sizes)

```css
--jcp-radius-sm: 8px      /* Small: icon badges, small components */
--jcp-radius-md: 12px     /* Medium: buttons, input fields */
--jcp-radius-lg: 16px     /* Large: cards, modals */
--jcp-radius-xl: 20px     /* Extra large: featured cards, hero */
--jcp-radius-2xl: 24px    /* XXL: section backgrounds */
--jcp-radius-3xl: 28px    /* XXXL: large sections */
--jcp-radius-full: 9999px /* Fully rounded: badges, avatars */
```

### Border Rules

```css
/* All component borders use --jcp-color-border */
.card {
  border: 2px solid var(--jcp-color-border);
}

/* Hover/active uses primary color */
.card:hover {
  border-color: var(--jcp-color-primary);
}

/* NO hardcoded borders allowed */
/* NEVER: border: 2px solid #e5e7eb; */
```

---

## 🌟 SHADOWS

### Shadow Depth (7 Levels)

```css
--jcp-shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.04);      /* Subtle lift */
--jcp-shadow-md: 0 4px 12px rgba(0, 0, 0, 0.08);     /* Light elevation */
--jcp-shadow-lg: 0 8px 24px rgba(0, 0, 0, 0.12);     /* Medium elevation */
--jcp-shadow-xl: 0 12px 32px rgba(255, 80, 62, 0.15); /* Featured, primary color tint */
--jcp-shadow-2xl: 0 20px 48px rgba(0, 0, 0, 0.16);   /* Heavy elevation */
--jcp-shadow-3xl: 0 32px 64px rgba(0, 0, 0, 0.20);   /* Maximum depth */
--jcp-shadow-inset: inset 0 2px 4px rgba(0, 0, 0, 0.06); /* Inset shadow */
```

### Usage Rules

```css
/* DO THIS */
.card {
  box-shadow: var(--jcp-shadow-sm);
}

.card:hover {
  box-shadow: var(--jcp-shadow-xl);
}

/* NEVER THIS */
.card {
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
  /* or */
  box-shadow: 0 12px 32px rgba(255, 80, 62, 0.15);
}
```

---

## ⏱️ ANIMATIONS & TRANSITIONS

**Minimal animation. All transitions must be fast, predictable, and subtle.**

### Timing (3 Speeds)

```css
--jcp-duration-fast: 150ms    /* Quick feedback (hover, active) */
--jcp-duration-normal: 300ms  /* Standard transitions (cards, modals) */
--jcp-duration-slow: 500ms    /* Page transitions, entrance animations */
```

### Easing

```css
/* Standard: cubic-bezier(0.4, 0, 0.2, 1) - smooth, natural */
transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);

/* Jump in: cubic-bezier(0.34, 1.56, 0.64, 1) - bouncy (limited use) */
```

### Rules

- **Hover states only**: Color, shadow, transform
- **No spinning loaders**: Use `.loading` class with opacity pulse instead
- **No parallax**: Only on hero images if needed
- **No autoplaying animations**: User controls only
- **Reduced motion**: Respect `prefers-reduced-motion` media query

### Usage Rules

```css
/* DO THIS */
.card {
  transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1);
}

.card:hover {
  border-color: var(--jcp-color-primary);
  transform: translateY(-4px);
  box-shadow: var(--jcp-shadow-lg);
}

/* NEVER THIS */
.card {
  animation: spinInfinite 5s linear infinite;
  transition: all 0.15s ease;
}
```

---

## 🎯 SECTION LAYOUTS

**All pages are built from reusable section patterns. No custom layouts per page.**

### Section Pattern

```html
<section class="jcp-section jcp-section-[name]">
  <div class="jcp-container">
    <!-- Optional: section header -->
    <div class="section-header">
      <h2>Section Title</h2>
      <p>Subtitle or description</p>
    </div>

    <!-- Content: grid, flex, or custom layout -->
    <div class="section-content">
      <!-- Cards, features, etc. -->
    </div>
  </div>
</section>
```

### Section Spacing

```css
.jcp-section {
  padding: var(--jcp-space-6xl) 0;  /* 80px vertical */
}

.jcp-section:first-child {
  padding-top: var(--jcp-space-5xl); /* 64px - hero gets less */
}

.section-header {
  margin-bottom: var(--jcp-space-4xl); /* 56px between header and content */
}
```

### Container Rules

```css
.jcp-container {
  max-width: var(--jcp-size-container-2xl); /* 1400px */
  margin: 0 auto;
  padding: 0 var(--jcp-space-lg); /* 24px horizontal padding */
}
```

---

## 🏗️ LAYOUT GRIDS

### Two-Column Grid

```css
.grid-2 {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: var(--jcp-space-xl); /* 32px */
}

@media (max-width: 768px) {
  .grid-2 {
    grid-template-columns: 1fr;
  }
}
```

### Three-Column Grid

```css
.grid-3 {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  gap: var(--jcp-space-xl); /* 32px */
}

@media (max-width: 1024px) {
  .grid-3 {
    grid-template-columns: 1fr 1fr;
  }
}

@media (max-width: 768px) {
  .grid-3 {
    grid-template-columns: 1fr;
  }
}
```

### Auto Grid

```css
.grid-auto {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: var(--jcp-space-xl);
}
```

---

## 🎨 COLOR COMBINATIONS (ALLOWED ONLY)

### On Light Backgrounds

```css
/* Text on white/light bg */
color: var(--jcp-color-text-primary);      /* Main text */
color: var(--jcp-color-text-secondary);    /* Secondary text */
color: var(--jcp-color-text-tertiary);     /* Disabled/helper */

/* CTAs on light bg */
background: var(--jcp-color-primary);      /* Primary button */
background: none; border: 2px solid var(--jcp-color-border); /* Secondary */

/* Badges/accents on light */
background: rgba(255, 80, 62, 0.1);        /* Soft primary tint */
color: var(--jcp-color-primary);           /* Text only */
```

### On Dark Backgrounds

```css
/* Text on dark bg */
color: var(--jcp-color-text-light);        /* White text */

/* CTAs on dark bg */
background: var(--jcp-color-primary);      /* Keep same primary */
.btn-on-dark-primary /* Special button styling */
.btn-on-dark-secondary /* Special button styling */
```

---

## 🚫 ENFORCEMENT RULES

### What Is Forbidden

❌ Hardcoded colors (e.g., `#ff5036`, `#e5e7eb`, `#111827`)  
❌ Hardcoded spacing (e.g., `16px`, `24px`, `40px`)  
❌ Hardcoded font sizes (e.g., `18px`, `24px`, `36px`)  
❌ Custom shadow definitions not in variables  
❌ Custom border radius not in variables  
❌ New button variants not in buttons.css  
❌ New card variants not documented  
❌ Page-specific CSS that duplicates components  
❌ Inline styles for design (only for layout edge cases)  
❌ Multiple button class naming conventions  

### What Is Required

✅ All colors use `var(--jcp-color-*)`  
✅ All spacing uses `var(--jcp-space-*)`  
✅ All font sizes use `var(--jcp-font-size-*)`  
✅ All shadows use `var(--jcp-shadow-*)`  
✅ All borders use `var(--jcp-radius-*)`  
✅ All transitions use `cubic-bezier(0.4, 0, 0.2, 1)`  
✅ Components use `.btn`, `.card` base classes  
✅ Sections follow `.jcp-section` pattern  
✅ Containers use `.jcp-container` class  
✅ All changes documented in component section  

---

## 🧪 TESTING THIS CONTRACT

### Questions to Ask Before Any Change

1. **Does this use a design system variable?**
   - Colors → `--jcp-color-*`?
   - Spacing → `--jcp-space-*`?
   - Sizing → `--jcp-size-*`?

2. **Is this a new component variant?**
   - If YES: Add to `.md`, document in CSS comments, add to inventory

3. **Does this duplicate existing styles?**
   - If YES: Use existing class, don't add new CSS

4. **Is this page-specific CSS?**
   - If YES: Extract to component, don't hardcode per-page

5. **Will another AI/developer understand this in 6 months?**
   - If NO: Rename, comment, or simplify

---

## 📋 APPROVED COMPONENT INVENTORY

### Buttons
- ✅ `.btn-primary` (orange, main CTA)
- ✅ `.btn-secondary` (bordered, secondary action)
- ✅ `.btn-ghost` (text only, tertiary)
- ✅ `.btn-small` | `.btn-medium` | `.btn-large`
- ✅ `.btn-on-dark-primary` | `.btn-on-dark-secondary` (special contexts only)

### Cards
- ✅ `.card` (default)
- ✅ `.card--feature` (icon + title + description)
- ✅ `.card--pricing` (tier, price, features, CTA)
- ✅ `.card--clickable` (entire card is link)

### Sections
- ✅ `.jcp-section` (standard section container)
- ✅ `.jcp-container` (max-width wrapper)
- ✅ `.section-header` (title + subtitle above content)

### Grids
- ✅ `.grid-2` (two column)
- ✅ `.grid-3` (three column)
- ✅ `.grid-auto` (auto-fit responsive)

---

## 📞 QUESTIONS & EDGE CASES

**Q: What if I need a color that's not in the palette?**  
A: Stop. Discuss with design lead. Add to base.css + this contract, don't hardcode.

**Q: What if I need different spacing?**  
A: Stop. All spacing is 8px-based. Use nearest variable. Don't add custom values.

**Q: What if my card looks slightly different?**  
A: Use a new variant class (`.card--my-new-variant`) and document it here.

**Q: What if this breaks on mobile?**  
A: Use media queries within the component. All components must be responsive.

**Q: Can I inline-style layout only?**  
A: Yes, for flexbox/grid edge cases. Never for colors, spacing, or sizing.

---

## ✅ SIGN-OFF

By committing code to this theme, you agree:

- ✅ All CSS uses design system variables
- ✅ All components follow this contract
- ✅ All changes are documented
- ✅ Code is boring, predictable, obvious
- ✅ Another AI could understand this

---

**This contract is effective immediately and non-negotiable.**

Last updated: January 27, 2026
