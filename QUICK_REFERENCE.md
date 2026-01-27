# JobCapturePro Design System - Quick Reference

**For**: Developers, Designers, Content Teams  
**Last Updated**: January 26, 2026  
**Version**: 1.0

---

## 🚀 START HERE

### What is the Design System?
A unified set of **colors, spacing, typography, and components** that ensures **all pages look and feel identical**.

### Where to find everything?
- **Live Demo**: Visit `/design-system` page in WordPress
- **Colors**: See color palette section
- **Spacing**: See spacing scale section
- **Components**: See button, card, hero sections
- **Code**: Check `css/design-system.css` for variables

### I'm building a new page, what do I need?

1. **Use these CSS classes** (already loaded on all pages)
```html
<div class="jcp-section">              <!-- Full width section -->
  <div class="jcp-container">          <!-- 1240px max width -->
    <h1 class="text-4xl font-bold">Title</h1>
    <div class="grid-auto">             <!-- Auto-fitting grid -->
      <!-- Your content here -->
    </div>
  </div>
</div>
```

2. **Use these colors** (NOT hardcoded hex values)
```css
.my-element {
  color: var(--jcp-color-primary);      /* Never #ff5036 */
  background: var(--jcp-color-bg-primary);
  border-color: var(--jcp-color-border);
}
```

3. **Use this spacing** (NOT 10px, 15px, 20px, etc.)
```css
.my-component {
  padding: var(--jcp-space-md);         /* 16px */
  margin: var(--jcp-space-lg);          /* 24px */
  gap: var(--jcp-space-sm);             /* 8px */
}
```

---

## 🎨 QUICK COLOR REFERENCE

### Use in CSS
```css
/* Text colors */
color: var(--jcp-color-text-primary);      /* Dark gray */
color: var(--jcp-color-text-secondary);    /* Medium gray */
color: var(--jcp-color-text-tertiary);     /* Light gray */
color: var(--jcp-color-text-light);        /* White */

/* Background colors */
background: var(--jcp-color-bg-primary);   /* White */
background: var(--jcp-color-bg-secondary); /* Light gray */
background: var(--jcp-color-bg-tertiary);  /* Gray */

/* Accent colors */
color: var(--jcp-color-primary);           /* Orange #ff5036 */
color: var(--jcp-color-success);           /* Green */
color: var(--jcp-color-error);             /* Red */
color: var(--jcp-color-warning);           /* Amber */

/* Borders */
border-color: var(--jcp-color-border);     /* Light border */
border-color: var(--jcp-color-border-light); /* Lighter border */
```

### Use in HTML (utility classes)
```html
<p class="text-primary">Dark text</p>
<p class="text-secondary">Gray text</p>
<p class="text-light">White text</p>
<div class="bg-primary">White background</div>
<div class="bg-secondary">Light gray background</div>
```

---

## 📏 QUICK SPACING REFERENCE

### The 8px Scale
```css
var(--jcp-space-xs)    /* 4px   - Small gaps */
var(--jcp-space-sm)    /* 8px   - Tight spacing */
var(--jcp-space-md)    /* 16px  - Standard gap between items */
var(--jcp-space-lg)    /* 24px  - Comfortable spacing */
var(--jcp-space-xl)    /* 32px  - Large spacing */
var(--jcp-space-2xl)   /* 40px  - Very large */
var(--jcp-space-3xl)   /* 48px  - Extra large */
var(--jcp-space-5xl)   /* 64px  - Section padding (standard) */
```

### Common Usage Patterns
```css
/* Section padding (top and bottom) */
.jcp-section { padding: var(--jcp-space-5xl) 0; }

/* Card padding */
.jcp-card { padding: var(--jcp-space-lg); }

/* Grid gaps (between columns) */
.grid-auto { gap: var(--jcp-space-lg); }

/* List item spacing */
ul { gap: var(--jcp-space-md); }

/* Button padding */
.btn { padding: var(--jcp-space-md) var(--jcp-space-lg); }
```

### Utility Classes
```html
<!-- Margins -->
<div class="mt-lg">Margin top 24px</div>
<div class="mb-xl">Margin bottom 32px</div>
<div class="m-md">Margin all sides 16px</div>

<!-- Padding -->
<div class="p-lg">Padding 24px</div>

<!-- Gaps (flex/grid) -->
<div class="gap-lg">Gap between items 24px</div>
```

---

## 🔤 QUICK TYPOGRAPHY REFERENCE

### Font Sizes
```css
var(--jcp-font-size-xs)    /* 12px - Small labels */
var(--jcp-font-size-sm)    /* 14px - Small text */
var(--jcp-font-size-base)  /* 16px - Body text (default) */
var(--jcp-font-size-lg)    /* 18px - Large text */
var(--jcp-font-size-xl)    /* 20px - XL text */
var(--jcp-font-size-2xl)   /* 24px - Heading 4 */
var(--jcp-font-size-3xl)   /* 30px - Heading 3 */
var(--jcp-font-size-4xl)   /* 36px - Heading 2 */
var(--jcp-font-size-5xl)   /* 48px - Heading 1 */
```

### Font Weights
```css
var(--jcp-font-weight-normal)      /* 400 - Regular */
var(--jcp-font-weight-medium)      /* 500 - Medium */
var(--jcp-font-weight-semibold)    /* 600 - Semi-bold */
var(--jcp-font-weight-bold)        /* 700 - Bold */
var(--jcp-font-weight-extrabold)   /* 800 - Extra bold */
```

### Utility Classes
```html
<!-- Font sizes -->
<h1 class="text-4xl">Large heading</h1>
<h2 class="text-3xl">Heading</h2>
<p class="text-lg">Large text</p>
<p class="text-sm">Small text</p>

<!-- Font weights -->
<strong class="font-bold">Bold text</strong>
<p class="font-semibold">Semi-bold</p>
<p class="font-normal">Normal weight</p>
```

---

## 🔘 BUTTON USAGE

### CSS Classes
```html
<!-- Primary button (orange) -->
<button class="btn btn-primary">Click me</button>

<!-- Secondary button (white) -->
<button class="btn btn-secondary">Cancel</button>

<!-- Ghost button (transparent) -->
<button class="btn btn-ghost">Learn more</button>
```

### Sizes
```html
<button class="btn btn-primary btn-small">Small</button>
<button class="btn btn-primary btn-medium">Default</button>
<button class="btn btn-primary btn-large">Large</button>
```

### States
```css
/* Hover effect applied automatically */
.btn-primary:hover { /* Darker orange */ }

/* Active state */
.btn-primary:active { /* Even darker */ }

/* Disabled state */
.btn:disabled { opacity: 0.5; cursor: not-allowed; }
```

---

## 🃏 CARD USAGE

### Basic Card
```html
<div class="jcp-card">
  <h3>Card Title</h3>
  <p>Card content</p>
</div>
```

### Card Variants
```html
<!-- Feature card (centered) -->
<div class="jcp-card feature">
  <div class="card-icon">⭐</div>
  <h3>Title</h3>
  <p>Description</p>
</div>

<!-- Pricing card (with featured option) -->
<div class="jcp-card pricing featured">
  <div class="jcp-plan-tag">Most Popular</div>
  <h3>Pricing Plan</h3>
  <p class="jcp-metric">$99/mo</p>
  <ul class="jcp-plan-list">
    <li>Feature 1</li>
    <li>Feature 2</li>
  </ul>
</div>
```

---

## 🌐 LAYOUT HELPERS

### Full-Width Section
```html
<section class="jcp-section">     <!-- Full width, padding top/bottom -->
  <div class="jcp-container">     <!-- 1240px max, auto-centered -->
    <!-- Content here -->
  </div>
</section>
```

### Grid Layouts
```html
<!-- 2-column grid -->
<div class="grid-2">
  <div>Column 1</div>
  <div>Column 2</div>
</div>

<!-- 3-column grid -->
<div class="grid-3">
  <div>Column 1</div>
  <div>Column 2</div>
  <div>Column 3</div>
</div>

<!-- Auto-fitting grid (responsive) -->
<div class="grid-auto">   <!-- Fits as many 240px+ items as possible -->
  <div class="jcp-card">Item 1</div>
  <div class="jcp-card">Item 2</div>
  <div class="jcp-card">Item 3</div>
</div>
```

### Flex Utilities
```html
<div class="flex gap-md">          <!-- Horizontal flex with gap -->
  <button class="btn btn-primary">Button 1</button>
  <button class="btn btn-secondary">Button 2</button>
</div>

<div class="flex flex-col gap-lg">  <!-- Vertical flex -->
  <div>Item 1</div>
  <div>Item 2</div>
</div>
```

---

## ❌ WHAT NOT TO DO

### ❌ Never hardcode colors
```css
/* WRONG */
.my-element { color: #111827; }

/* RIGHT */
.my-element { color: var(--jcp-color-text-primary); }
```

### ❌ Never hardcode spacing
```css
/* WRONG */
.my-element { padding: 16px 24px; }

/* RIGHT */
.my-element { padding: var(--jcp-space-md) var(--jcp-space-lg); }
```

### ❌ Never create custom button styles
```css
/* WRONG */
.custom-btn {
  background: blue;
  padding: 10px 15px;
  border-radius: 5px;
}

/* RIGHT - Use existing classes */
/* <button class="btn btn-primary">Click</button> */
```

### ❌ Never create one-off layouts
```css
/* WRONG - Custom grid with hardcoded values */
.special-grid {
  display: grid;
  grid-template-columns: repeat(4, minmax(200px, 1fr));
  gap: 20px;
}

/* RIGHT - Use existing classes or variables */
/* <div class="grid-auto">...</div> */
```

### ❌ Never use inline styles (except CSS vars)
```html
<!-- WRONG -->
<div style="color: #111827; padding: 16px;">Content</div>

<!-- RIGHT -->
<div style="color: var(--jcp-color-text-primary); 
           padding: var(--jcp-space-md);">Content</div>

<!-- BEST - Use classes -->
<div class="text-primary p-md">Content</div>
```

---

## 🎯 COMMON PATTERNS

### Hero Section
```html
<section class="jcp-hero">
  <div class="jcp-container">
    <h1 class="jcp-hero-title">Your Heading</h1>
    <p class="jcp-hero-subtitle">Subheading text</p>
    <button class="btn btn-primary">CTA Button</button>
  </div>
</section>
```

### Features Grid
```html
<section class="jcp-section">
  <div class="jcp-container">
    <h2 class="text-4xl font-bold text-center">Features</h2>
    <div class="grid-auto mt-xl">
      <div class="jcp-card feature">
        <div class="card-icon">🎯</div>
        <h3>Feature Name</h3>
        <p>Feature description</p>
      </div>
      <!-- More cards -->
    </div>
  </div>
</section>
```

### CTA Section
```html
<section class="jcp-section bg-secondary">
  <div class="jcp-container text-center">
    <h2 class="text-4xl font-bold text-light">Ready to Start?</h2>
    <p class="text-lg text-light mt-md">Description here</p>
    <button class="btn btn-on-dark-primary mt-lg">
      Get Started
    </button>
  </div>
</section>
```

---

## 📱 RESPONSIVE DESIGN

### Mobile Breakpoints
```css
/* Mobile-first - these are defaults */
/* Tablet and up (768px+) */
@media (min-width: 768px) { /* Adjust for tablets */ }

/* Desktop (1024px+) */
@media (min-width: 1024px) { /* Adjust for desktops */ }

/* Large desktop (1280px+) */
@media (min-width: 1280px) { /* Adjust for large screens */ }
```

### Responsive Classes
```html
<!-- Hide on mobile, show on tablet+ -->
<div class="hide-mobile">Desktop only</div>

<!-- Show on mobile, hide on tablet+ -->
<div class="show-mobile">Mobile only</div>

<!-- Responsive grid -->
<div class="grid-3">    <!-- 3 cols on desktop -->
  <!-- Automatically becomes 1 col on mobile -->
</div>
```

---

## 🔗 RESOURCES

### Design System Page
- **URL**: `/design-system`
- **Contains**: All components, colors, patterns
- **For**: Visual reference

### CSS Variables File
- **Location**: `css/design-system.css`
- **Contains**: All variables defined
- **For**: Technical reference

### Component Files
- **Buttons**: `css/buttons.css` (190 lines)
- **Components**: `css/components.css` (109 lines)
- **Layout**: `css/layout.css` (60 lines)
- **Utilities**: `css/utilities.css` (200 lines)

### Documentation
- **Complete Guide**: `DESIGN_SYSTEM_COMPLETE.md`
- **Phase 4 Summary**: `PHASE_4_COMPLETION.md`
- **Status History**: `DESIGN_SYSTEM_STATUS.md`
- **Audit Details**: `DESIGN_SYSTEM_AUDIT.md`

---

## ❓ FAQ

**Q: Where do I find the available colors?**  
A: Run `grep "--jcp-color" css/design-system.css` or visit `/design-system` page

**Q: What spacing value should I use?**  
A: Use the 8px scale: 4, 8, 16, 24, 32, 40, 48, 56, 64, 80px

**Q: Can I create a custom button?**  
A: No. Use the existing button classes: `.btn-primary`, `.btn-secondary`, `.btn-ghost`

**Q: What if the design system doesn't have what I need?**  
A: Add it to the design system first, then use it everywhere. See Phase 5 workflow.

**Q: How do I update a color globally?**  
A: Edit the variable in `css/design-system.css`. All pages update automatically.

**Q: Should I use this utility class or write CSS?**  
A: Always prefer utility classes. They're pre-tested and consistent.

---

## 🎓 LEARNING PATH

1. **Visit** `/design-system` page to see all components
2. **Read** `DESIGN_SYSTEM_COMPLETE.md` for full overview
3. **Study** existing pages to see patterns
4. **Reference** this quick guide when building
5. **Ask** the design team if unsure

---

## 👥 Need Help?

- **Technical Questions**: Check CSS files and comments
- **Design Questions**: See `/design-system` page
- **Component Variations**: Check existing pages for examples
- **New Requirements**: Add to design system first, then use

---

**Remember**: The design system is your tool to ensure consistency and quality. Use it!

Last Updated: January 26, 2026  
Version: 1.0  
Status: ✅ Production Ready
