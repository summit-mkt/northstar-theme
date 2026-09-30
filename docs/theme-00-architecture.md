# Landing Page Theme Architecture

## Master Component Architecture

**Document Status:** Master Architecture
**Version:** 1.1
**Scope:** Component structure, class naming, ACF, Theme/PHP, Elementor, and global styling architecture

---

# 01 — Component Class Naming Convention

The project uses a BEM-style naming convention based on the section/component name.

### Core Pattern

```text
[section]
[section]__element
[component]--modifier
```

### Naming Rules

| Purpose   | Convention                | Example           |
| --------- | ------------------------- | ----------------- |
| Section   | `[section]`               | `hero`            |
| Container | `[section]__container`    | `hero__container` |
| Content   | `[section]__content`      | `hero__content`   |
| Media     | `[section]__media`        | `hero__media`     |
| Header    | `[section]__header`       | `offer__header`   |
| Title     | `[section]__title`        | `hero__title`     |
| Text      | `[section]__text`         | `hero__text`      |
| CTA       | `[section]__cta`          | `hero__cta`       |
| Grid      | `[section]__grid`         | `benefit__grid`   |
| Item      | `[section]__item`         | `benefit__item`   |
| Icon      | `[section]__icon`         | `benefit__icon`   |
| Image     | `[section]__image`        | `details__image`  |
| Form      | `[section]__form`         | `hero__form`      |
| Variation | `[component]--[modifier]` | `hero--dark`      |

The section name establishes the component namespace.

For example:

```text
hero
hero__container
hero__content
hero__logo
hero__header
hero__cta
hero__subtitle
hero__form
hero__media
hero__video
```

Avoid generic architecture classes such as:

```text
.container
.wrapper
.content
.image
.title
```

unless they are intentionally defined as global utility classes.

Elementor-generated classes such as:

```text
.elementor-element-abc123
```

are implementation details and should not be used as the project's architectural naming system.

---

# 02 — Master Component Library

The landing-page system consists of the following standardized components:

```text
01 Hero
02 Offer
03 Brand
04 Details
05 Benefit
06 Testimonial
07 Closer
08 Footer
```

These components are shared across:

```text
PPG
Promo
Seminar
Thank You
```

Individual page types may use different combinations of components, but the underlying architecture remains consistent.

---

# 03 — Hero

```text
hero
├── hero__container
│
├── hero__content
│   ├── hero__logo
│   ├── hero__header
│   └── hero__cta
│       ├── hero__subtitle
│       └── hero__form
│
└── hero__media
    └── hero__video
```

### Purpose

The Hero is the primary entry point of the landing page.

### Responsibilities

* Brand/logo presentation
* Primary heading/header
* Supporting subtitle
* Primary CTA
* Form
* Hero media/video

### Responsive Behavior

Desktop:

```text
Content | Media
```

Tablet:

```text
Content | Media
```

Mobile:

```text
Content
Media
```

The mobile Hero should simply stack the information.

---

# 04 — Offer

```text
offer
└── offer__container
    ├── offer__header
    │
    ├── offer__grid
    │   └── offer__item
    │
    ├── offer__text
    └── offer__cta
```

### Purpose

The Offer section communicates the primary offer, products, services, or promotional items.

### Responsibilities

* Offer heading/header
* Offer grid
* Offer items
* Supporting text
* CTA

The number of offer items should remain flexible and should not be hardcoded into the component architecture.

---

# 05 — Brand

```text
brand
└── brand__container
    ├── brand__content
    │   ├── brand__header
    │   └── brand__cta
    │
    └── brand__media
        └── brand__video
```

### Purpose

The Brand section introduces the company, brand, product, service, or supporting brand story.

### Responsibilities

* Brand header
* Supporting content
* CTA
* Brand video/media

The component should remain reusable across different landing-page types.

---

# 06 — Details

```text
details
└── details__container
    ├── details__media
    │   └── details__image
    │
    └── details__details
        ├── details__header
        ├── details__text
        ├── details__sub
        ├── details__list
        ├── details__text
        └── details__cta
```

### Purpose

The Details section provides supporting information about the offer, product, service, event, location, or other landing-page content.

### Responsibilities

* Image/media
* Header
* Main text
* Supporting sub-content
* List content
* CTA

### Naming Note

`details__details` is intentionally retained because it is part of the current project outline.

The repeated:

```text
details__text
```

can represent separate content fields when necessary, but the implementation should avoid duplicate classes when the content has distinct semantic purposes.

If the second text element needs to be independently styled or controlled, it can later be defined as a more specific element such as:

```text
details__description
```

without changing the overall component architecture.

---

# 07 — Benefit

```text
benefit
└── benefit__container
    ├── benefit__header
    │
    └── benefit__grid
        └── benefit__item
            ├── benefit__icon
            ├── benefit__title
            └── benefit__text
```

### Purpose

The Benefit section communicates key benefits, features, advantages, or value propositions.

### Responsibilities

* Section header
* Benefit grid
* Benefit items
* Icons
* Titles
* Supporting text

The grid should support a variable number of items.

---

# 08 — Testimonial

```text
testimonial
└── testimonial__container
    ├── testimonial__header
    │
    └── testimonial__grid
        └── testimonial__item
            ├── testimonial__quote
            ├── testimonial__author
            ├── testimonial__rating
            └── testimonial__image
```

### Purpose

The Testimonial section provides social proof.

### Responsibilities

* Section header
* Testimonial grid
* Quote
* Author
* Rating
* Supporting image

Testimonials should be structured data where practical rather than hardcoded directly into templates.

---

# 09 — Closer

```text
closer
└── closer__container
    ├── closer__header
    └── closer__cta
```

### Purpose

The Closer is the final conversion-focused section before the footer.

### Responsibilities

* Final headline/header
* Final CTA

### Naming Rule

The Closer uses its own namespace:

```text
closer__header
closer__cta
```

It should not reuse:

```text
hero__header
hero__cta
```

because each component should maintain its own namespace.

---

# 10 — Footer

```text
footer
└── footer__container
    ├── footer__content
    │
    └── footer__disclaimer
        ├── disclaimer
        ├── disclaimer--promo
        ├── disclaimer--state
        └── disclaimer--phone
```

### Purpose

The Footer provides required supporting information, legal/disclaimer content, and other global footer content.

### Disclaimer Variations

```text
disclaimer
disclaimer--promo
disclaimer--state
disclaimer--phone
```

Modifiers should be used when the same base disclaimer component requires a documented variation.

---

# 11 — ACF Architecture

ACF provides the structured content/data layer.

```text
ACF
├── Post Types
│   ├── PPG
│   ├── Promo
│   ├── Seminar
│   └── Thank You
│
└── Field Groups
    ├── Brand
    ├── Download
    ├── Events
    └── Page
```

### ACF Responsibilities

ACF manages:

* Structured content
* Reusable content fields
* Post-type data
* Page data
* Brand data
* Event information
* Download information
* Content relationships

### Theme Responsibility

The theme owns the ACF configuration.

The ACF plugin provides the functionality.

Conceptually:

```text
ACF Plugin
    ↓
Provides ACF functionality

Theme
    ↓
Defines ACF configuration

ACF Fields
    ↓
Store structured content

Elementor
    ↓
Presents the content
```

ACF should not be responsible for page layout.

---

# 12 — Theme / PHP Architecture

The Theme/PHP layer provides the underlying website foundation.

At the architecture level, this includes:

```text
THEME / PHP
└── Root Variables
    ├── Clamp Font
    ├── Clamp Spacing
    └── CSS Reset
```

### Root Variables

The theme establishes the universal design tokens used throughout the website.

These include:

* Typography scale
* Font sizes
* Spacing
* Layout values
* Breakpoint foundations
* Border radius
* Colors

### Clamp-Based Scaling

Responsive values should use `clamp()` where appropriate to provide fluid scaling between defined viewport ranges.

Examples of concepts:

```text
Font Size → clamp()
Spacing → clamp()
Section Padding → clamp()
```

Exact values will be defined during the CSS implementation phase.

### CSS Reset

The theme establishes the baseline CSS reset/normalization required for consistent rendering.

The reset should establish a predictable foundation without attempting to override Elementor's entire styling system.

---

# 13 — Elementor Architecture

Elementor is the visual presentation and page-building layer.

Each landing-page section receives a standardized Elementor ID.

```text
ELEMENTOR
└── IDs
    ├── hero
    ├── offer
    ├── brand
    ├── details
    ├── benefit
    ├── testimonial
    └── closer
```

### Elementor Section IDs

The section ID should match the component name.

Example:

```text
Hero → hero
Offer → offer
Brand → brand
Details → details
Benefit → benefit
Testimonial → testimonial
Closer → closer
```

This creates a predictable relationship between:

```text
Component
↓
CSS
↓
JavaScript
↓
Elementor
```

### Elementor Responsibilities

Elementor controls:

* Page composition
* Visual layout
* Content presentation
* Media placement
* Page-specific styling
* Responsive adjustments
* Elementor widgets
* Visual editing

### Theme Responsibilities

The theme controls:

* Architecture
* Global design foundation
* Universal CSS
* Component standards
* PHP/templates
* WordPress integration
* ACF configuration
* Global JavaScript

---

# 14 — Global CSS Architecture

Global styles are separated from individual component styles.

```text
GLOBAL
├── Flex
├── Grid
├── Color
└── Sizes
    ├── Spacing
    └── Border-Radius
```

### Global Flex

Reusable layout utilities and foundational flex behavior.

### Global Grid

Reusable grid foundations.

### Global Color

Universal color variables and color utilities.

### Global Sizes

```text
Spacing
Border Radius
```

These establish the shared design language.

---

# 15 — Theme CSS vs Elementor CSS

The project maintains a clear separation between theme CSS and Elementor CSS.

### Theme CSS

The theme owns:

* CSS reset
* Root variables
* Universal design tokens
* Global utilities
* Component foundations
* Universal responsive foundations
* Theme-level functionality

### Elementor CSS

Elementor owns:

* Elementor-generated styling
* Page-specific visual presentation
* Widget-specific styling
* Elementor responsive overrides
* Page-specific layout adjustments

The theme should not attempt to replace Elementor's generated CSS.

Likewise, Elementor should not become the source of the entire website architecture.

---

# 16 — Architecture Relationship

The complete relationship is:

```text
                    WORDPRESS
                        │
          ┌─────────────┼─────────────┐
          │             │             │
        THEME          ACF         ELEMENTOR
          │             │             │
     Architecture   Structured      Visual
     + Foundation      Data       Presentation
          │             │             │
          └─────────────┼─────────────┘
                        │
                 LANDING PAGES
                        │
        ┌───────────────┼───────────────┐
        │               │               │
       PPG            Promo          Seminar
        │
        └───────────────┬───────────────┘
                        │
                    Thank You
                        │
                        ▼
                SHARED COMPONENTS
                        │
       ┌────────┬───────┼───────┬──────────┐
       │        │       │       │          │
      Hero    Offer   Brand   Details   Benefit
       │
       ├── Testimonial
       ├── Closer
       └── Footer
```

---

# 17 — Master Responsibility Model

The project follows this responsibility model:

| System        | Primary Responsibility       |
| ------------- | ---------------------------- |
| WordPress     | CMS/platform                 |
| Theme         | Architecture and foundation  |
| PHP           | Templates and functionality  |
| ACF           | Structured data              |
| Elementor     | Visual presentation          |
| Theme CSS     | Universal styling foundation |
| Elementor CSS | Page/widget presentation     |
| Theme JS      | Shared functionality         |
| Elementor JS  | Elementor functionality      |

### Development Decision

When implementing or changing something, ask:

```text
Where does this change belong?
```

Then use:

```text
Architecture
    → Theme

Structured Data
    → ACF

Page Presentation
    → Elementor

Universal Styling
    → Theme CSS

Page-Specific Styling
    → Elementor

Shared Functionality
    → Theme JS

Elementor Functionality
    → Elementor
```

### Master Rule

> Do not solve a problem in one system when the responsibility belongs to another system.

---

# 18 — Global Design System

The design system applies consistently across every landing page.

### Typography

```text
Font Family
Heading Scale
Body Size
Line Height
Font Weight
```

### Spacing

```text
Small
Medium
Large
Section
```

### Colors

```text
Primary
Secondary
Accent
Background
Surface
Text
Border
```

### Layout

```text
Content Width
Container Width
Breakpoints
```

### Global UI

```text
Buttons
Forms
Links
Cards
Borders
Border Radius
```

The exact values will be documented during the CSS implementation phase.

---

# 19 — Responsive Standard

All landing pages use the same responsive model:

```text
Desktop
   ↓
Tablet
   ↓
Mobile
```

Every component should be evaluated at all three levels.

### Desktop

* Full available layout
* Maximum content width
* Full component presentation

### Tablet

* Adjusted spacing
* Adjusted layout
* Intermediate presentation

### Mobile

* Stacked layout where appropriate
* Reduced spacing
* Optimized typography
* Touch-friendly controls

Component-specific exceptions should be documented rather than handled inconsistently.

---

# 20 — Landing Page Types

The system supports four landing-page types:

```text
PPG
Promo
Seminar
Thank You
```

These are page types, not separate theme architectures.

All page types share:

* Same theme
* Same CSS foundation
* Same naming convention
* Same global design system
* Same responsive standards
* Same component library
* Same ACF architecture
* Same Elementor architecture

The difference is primarily:

```text
Component Combination
Content Requirements
ACF Data
Presentation
Conversion Goal
```

---

# 21 — Master Architecture Rules

### Rule 1 — Theme Owns Architecture

The theme defines the reusable structural foundation.

### Rule 2 — ACF Owns Structured Data

ACF manages structured content and reusable fields.

### Rule 3 — Elementor Owns Presentation

Elementor provides visual page composition and editing.

### Rule 4 — Universal CSS Stays Universal

Global design rules belong in the theme.

### Rule 5 — Elementor CSS Stays with Elementor

Do not duplicate Elementor-generated styling in the theme unnecessarily.

### Rule 6 — Components Are Reusable

Components should work across multiple landing-page types.

### Rule 7 — Page Types Are Not Separate Architectures

PPG, Promo, Seminar, and Thank You use the same underlying system.

### Rule 8 — Use the Correct System

Architecture → Theme
Data → ACF
Presentation → Elementor

### Rule 9 — Avoid Duplication

Do not maintain the same source of truth in multiple systems.

### Rule 10 — Build for Reuse

A solution should support the current page and future landing pages whenever practical.

---

# 22 — Future Implementation Documentation

The next implementation documentation should expand this architecture into:

```text
12 — PHP & Template Architecture
13 — ACF PHP Implementation
14 — Elementor Implementation Rules
15 — CSS Architecture
16 — JavaScript Architecture
17 — Component Specifications
18 — Landing Page Type Specifications
19 — Development & Deployment Workflow
20 — QA & Testing Standards
21 — Maintenance & Versioning
```

The master architecture remains the governing document. These future sections should explain **how the architecture is implemented**, not redefine the architecture.
