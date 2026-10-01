# Landing Page Theme Architecture

## WordPress + Elementor Pro + ACF

**Document Status:** Master Architecture
**Version:** 1.0
**Scope:** High-level architecture and development standards

**Landing Page Types:**

* PPG
* Promo
* Seminar
* Thank You

---

# 01 — Class Naming Convention

## 1.1 Core Principle

The project uses a consistent BEM-style naming convention for reusable landing-page components.

```text
component
component__element
component--modifier
```

Example:

```text
hero
hero__container
hero__content
hero__title
hero__cta
hero--dark
```

The naming system describes the project's architecture rather than Elementor's generated implementation classes.

## 1.2 Component Naming

Standard component names:

```text
hero
offer
brand-intro
information
benefit
testimonial
closure
footer
```

Avoid generic classes such as:

```text
container
wrapper
content
image
title
```

unless they are intentionally defined as global utility classes.

## 1.3 Element Naming

Elements describe meaningful parts of a component.

Example:

```text
information
└── information__container
    ├── information__media
    │   └── information__image
    └── information__details
        ├── information__title
        ├── information__text
        ├── information__sub
        ├── information__list
        ├── information__description
        └── information__cta
```

## 1.4 Modifiers

Modifiers represent variations of an existing component.

```text
hero--dark
hero--split
hero--centered
```

A modifier should be preferred over creating a new component when the underlying component remains the same.

## 1.5 Elementor Classes

Elementor-generated classes such as:

```text
.elementor-element-abc123
```

are implementation details and should not be treated as part of the project's architecture.

---

# 02 — Theme Architecture

## 2.1 Core Principle

The theme provides the foundation for all landing pages, while Elementor provides the page-building and visual editing experience.

```text
WordPress
│
├── Theme
│   ├── Structure
│   ├── Universal CSS
│   ├── JavaScript
│   ├── Reusable Components
│   └── ACF Configuration
│
├── ACF
│   └── Structured Content / Data
│
└── Elementor
    ├── Page Layout
    ├── Editable Presentation
    └── Page-Specific Styling
```

## 2.2 Responsibility Model

| System            | Primary Responsibility                        |
| ----------------- | --------------------------------------------- |
| WordPress Theme   | Site foundation and reusable architecture     |
| Theme PHP         | Templates, structure, and functionality       |
| Universal CSS     | Shared design system and component foundation |
| Theme JavaScript  | Interactive functionality                     |
| ACF               | Structured content and reusable data          |
| ACF Configuration | Defined and maintained by the theme           |
| Elementor         | Visual page building and editing              |
| Elementor CSS     | Page-specific presentation                    |

## 2.3 Theme

The theme provides:

* WordPress templates
* Reusable components
* Universal CSS
* JavaScript
* ACF configuration
* Header/footer structure
* WordPress integration
* Common functionality

The theme should remain independent of any single landing page.

## 2.4 Universal CSS

Universal CSS establishes:

* Typography
* Colors
* Buttons
* Forms
* Containers
* Spacing
* Component foundations
* Responsive foundations

Elementor retains its own CSS for page-specific presentation.

## 2.5 Elementor

Elementor controls:

* Page composition
* Visual layout
* Content presentation
* Media placement
* Page-specific styling
* Responsive adjustments

Elementor should not become the source of truth for the site's underlying architecture.

## 2.6 ACF

ACF provides structured content such as:

* Hero information
* Offers
* Information blocks
* Benefits
* Testimonials
* Footer information
* Global business information

The theme owns the ACF configuration; the ACF plugin provides the field functionality.

## 2.7 Separation of Responsibilities

> **Theme:** What does the website fundamentally provide?

> **ACF:** What structured information does the website contain?

> **Elementor:** How does this particular page present it?

---

# 03 — Elementor Guidelines

## 3.1 Core Principle

Elementor is the visual page-building and editing layer.

The theme provides the architecture and universal foundation.

## 3.2 Elementor Responsibilities

Elementor controls:

* Page composition
* Container arrangement
* Content placement
* Visual presentation
* Images and media
* Page-specific spacing
* Page-specific styling
* Responsive adjustments
* Elementor widgets
* Reusable visual templates where appropriate

## 3.3 Theme vs. Elementor

| Area                     |    Theme   | Elementor |
| ------------------------ | :--------: | :-------: |
| Site architecture        |      ✓     |           |
| PHP templates            |      ✓     |           |
| Reusable components      |      ✓     |           |
| Universal CSS            |      ✓     |           |
| ACF configuration        |      ✓     |           |
| Structured data          |            |    ACF    |
| Page layout              | Foundation |     ✓     |
| Visual editing           |            |     ✓     |
| Page-specific styling    |            |     ✓     |
| Responsive adjustments   | Foundation |     ✓     |
| JavaScript functionality |      ✓     |           |

## 3.4 Elementor Containers

Elementor Containers should construct page layouts.

Project classes identify the semantic component.

```text
Elementor Container
└── hero
    └── hero__container
        ├── hero__content
        └── hero__media
```

## 3.5 Custom Classes

Use standardized project classes rather than Elementor-generated IDs/classes.

## 3.6 Elementor and ACF

```text
ACF
│
├── Structured Content
└── Reusable Data
        │
        ▼
Elementor
├── Layout
├── Presentation
├── Spacing
└── Responsive Behavior
```

## 3.7 Styling

The theme establishes the universal design system.

Elementor provides page-specific presentation.

Universal styles should not be repeatedly recreated inside individual pages.

## 3.8 Reusable Elementor Templates

Reusable Elementor templates may be used for recurring visual patterns.

They supplement the theme's component architecture rather than replacing it.

---

# 04 — ACF Guidelines

## 4.1 Core Principle

ACF is the structured content and data layer.

The ACF plugin provides the functionality, while the theme owns the configuration.

```text
Theme
└── ACF Configuration
    ├── Field Groups
    ├── Fields
    ├── Options
    └── ACF Functions

ACF Plugin
└── Provides ACF functionality
```

## 4.2 ACF Responsibilities

ACF manages information that is:

* Structured
* Consistent
* Reusable
* Independent from page layout
* Shared across pages
* Needed by reusable components

## 4.3 Theme-Owned ACF Configuration

The theme is the source of truth for project-specific ACF configuration.

## 4.4 Component-Based Data

Example:

```text
Information
├── information_title
├── information_text
├── information_sub
├── information_list
├── information_description
└── information_cta
```

## 4.5 Global vs. Page-Specific Data

### Global

```text
Site Information
├── Company Information
├── Contact Information
├── Logo
└── Legal / Disclaimer Information
```

### Page-Specific

```text
Landing Page
├── Hero
├── Offer
├── Brand Intro
├── Information
├── Benefit
└── Testimonial
```

## 4.6 ACF Does Not Control Layout

ACF defines **what information exists**.

Elementor defines **how that information is presented**.

## 4.7 Source of Truth

Avoid maintaining identical structured information independently in ACF, Elementor, and hardcoded PHP.

The intended flow is:

```text
ACF
  ↓
Structured Content
  ↓
Theme / Elementor
  ↓
Presentation
```

---

# 05 — Design System & Universal CSS

## 5.1 Core Principle

The theme provides the universal CSS foundation for **every landing page**.

This ensures that all landing pages share the same visual foundation while Elementor retains presentation flexibility.

## 5.2 Universal CSS Responsibilities

The theme establishes:

* Typography
* Colors
* Spacing
* Containers
* Buttons
* Forms
* Common UI
* Component foundations
* Responsive foundations
* Accessibility foundations

## 5.3 Design Tokens

The design system should standardize:

```text
Colors
├── Primary
├── Secondary
├── Accent
├── Background
├── Surface
├── Text
└── Border

Typography
├── Font Family
├── Heading Scale
├── Body Size
├── Line Height
└── Font Weight

Spacing
├── Small
├── Medium
├── Large
└── Section

Layout
├── Content Width
├── Container Width
└── Breakpoints
```

Exact values will be defined during implementation.

## 5.4 Component Foundation

Universal CSS provides the foundation for:

* Hero
* Offer
* Brand Intro
* Information
* Benefit
* Testimonial
* CTA Banner
* Footer

## 5.5 Elementor CSS Relationship

```text
Theme CSS
└── Universal Foundation

Elementor CSS
└── Page-Specific Presentation
```

## 5.6 Consistency Rule

The same design system should apply across **every landing page**.

A page should not independently redefine the project's typography, spacing, colors, or component foundations without a documented reason.

---

# 06 — Responsive Guidelines

## 6.1 Core Principle

Responsive behavior must be consistent across every landing page.

The project uses exactly three responsive levels:

```text
Desktop
   ↓
Tablet
   ↓
Mobile
```

## 6.2 Standard Responsive Model

| Breakpoint | Purpose                         |
| ---------- | ------------------------------- |
| Desktop    | Full layout and available space |
| Tablet     | Adjusted layout and spacing     |
| Mobile     | Stacked / optimized layout      |

Exact breakpoint values will be defined during implementation.

## 6.3 Component Responsive Behavior

Each component should document its behavior at all three levels.

Example:

```text
Information

Desktop:
Media | Details

Tablet:
Media | Details

Mobile:
Media
Details
```

## 6.4 Mobile Layout

Mobile should prioritize:

* Readability
* Clear hierarchy
* Appropriate spacing
* Touch-friendly controls
* Media scaling
* Simple navigation
* Visual clarity

## 6.5 Hero Responsive Behavior

```text
Desktop
Content | Media

Tablet
Content | Media

Mobile
Content
Media
```

The standardized mobile Hero should simply stack the information.

## 6.6 Responsive Exceptions

Unique responsive behavior should only be introduced when there is a documented design requirement.

---

# 07 — Component Architecture & Standards

## 7.1 Standard Component Library

```text
01. Hero
02. Offer
03. Brand Intro
04. Information
05. Benefit
06. Testimonial
07. CTA Banner
08. Footer
```

## 7.2 General Component Pattern

```text
component
└── component__container
    ├── component__content
    ├── component__media
    └── component__element
```

Not every component requires every element.

## 7.3 Hero

```text
hero
└── hero__container
    ├── hero__content
    │   ├── hero__logo
    │   ├── hero__title
    │   ├── hero__subtitle
    │   └── hero__cta
    │       └── hero__form
    └── hero__media
```

## 7.4 Offer

```text
offer
└── offer__container
    ├── offer__header
    │   ├── offer__title
    │   └── offer__text
    └── offer__grid
        └── offer__item
```

## 7.5 Brand Intro

```text
brand-intro
└── brand-intro__container
    ├── brand-intro__content
    │   ├── brand-intro__title
    │   └── brand-intro__text
    └── brand-intro__media
        └── brand-intro__video
```

## 7.6 Information

```text
information
└── information__container
    ├── information__media
    │   └── information__image
    └── information__details
        ├── information__title
        ├── information__text
        ├── information__sub
        ├── information__list
        ├── information__description
        └── information__cta
```

## 7.7 Benefit

```text
benefit
└── benefit__container
    ├── benefit__header
    └── benefit__grid
        └── benefit__item
            ├── benefit__icon
            ├── benefit__title
            └── benefit__text
```

## 7.8 Testimonial

```text
testimonial
└── testimonial__container
    ├── testimonial__header
    └── testimonial__grid
        └── testimonial__item
            ├── testimonial__quote
            ├── testimonial__author
            ├── testimonial__rating
            └── testimonial__image
```

## 7.9 CTA Banner

```text
closure
└── closure__container
    ├── closure__content
    │   ├── closure__title
    │   ├── closure__text
    │   └── closure__cta
    └── closure__media
        └── closure__image
```

Media is optional.

## 7.10 Footer

```text
footer
└── footer__container
    ├── footer__content
    └── footer__disclaimer
        ├── disclaimer
        ├── disclaimer--promo
        ├── disclaimer--state
        └── disclaimer--phone
```

## 7.11 Component Reuse

Components should be reused across landing pages.

Content can change while the underlying component architecture remains consistent.

## 7.12 Component Modifiers

Use modifiers for legitimate variations:

```text
hero--dark
hero--split
hero--centered
```

Avoid creating new components for minor presentation differences.

---

# 08 — Theme / Elementor / ACF Workflow

## 8.1 Core Principle

The workflow keeps architecture, data, and presentation separate.

```text
THEME
Architecture + Foundation
        ↓
ACF
Structured Content
        ↓
ELEMENTOR
Visual Presentation
```

## 8.2 New Landing Page Workflow

```text
1. Define Page Requirements
        ↓
2. Identify Required Components
        ↓
3. Confirm ACF Data
        ↓
4. Build Page in Elementor
        ↓
5. Apply Standard Component Classes
        ↓
6. Apply Page-Specific Presentation
        ↓
7. Test Desktop
        ↓
8. Test Tablet
        ↓
9. Test Mobile
```

## 8.3 Change Management

| Change                    | Primary Location           |
| ------------------------- | -------------------------- |
| Site-wide architecture    | Theme                      |
| Universal styling         | Theme CSS                  |
| Structured content        | ACF                        |
| Page content              | ACF / Elementor as defined |
| Page layout               | Elementor                  |
| Page-specific styling     | Elementor                  |
| Interactive functionality | Theme JavaScript           |
| Component architecture    | Theme                      |

## 8.4 Development Decision Framework

Before making a change:

> **Where does this change belong?**

```text
Architecture?
    → Theme

Structured Data?
    → ACF

Page Presentation?
    → Elementor

Universal Styling?
    → Theme CSS

Interactive Functionality?
    → Theme JavaScript
```

### Master Rule

> **Do not solve a problem in one system when the responsibility belongs to another system.**

---

# 09 — Theme File & Folder Architecture

## 9.1 Core Principle

The theme is organized by responsibility rather than by individual landing page.

The same architecture supports:

```text
PPG
Promo
Seminar
Thank You
```

## 9.2 High-Level Structure

```text
theme/
│
├── functions.php
├── style.css
│
├── templates/
│
├── template-parts/
│
├── components/
│   ├── hero/
│   ├── offer/
│   ├── brand-intro/
│   ├── information/
│   ├── benefit/
│   ├── testimonial/
│   ├── closure/
│   └── footer/
│
├── inc/
│   ├── acf/
│   ├── elementor/
│   ├── setup/
│   └── helpers/
│
├── assets/
│   ├── css/
│   ├── js/
│   ├── images/
│   └── fonts/
│
└── docs/
```

This is the high-level architectural starting point. Exact implementation details will be defined later.

## 9.3 Functions.php

`functions.php` acts as the theme bootstrap.

It should load theme functionality rather than becoming a large collection of unrelated code.

## 9.4 Templates

Templates provide overall WordPress page structure.

They should not contain excessive component-specific markup.

## 9.5 Template Parts

Template parts provide reusable WordPress structural pieces such as headers and footers.

## 9.6 Components

The `components` directory represents the standardized landing-page component system.

## 9.7 ACF

The theme owns the ACF configuration.

## 9.8 Elementor

Elementor-specific integration should remain separated from general theme functionality.

## 9.9 Assets

Theme-owned assets include:

```text
assets/
├── css/
├── js/
├── images/
└── fonts/
```

Theme CSS is managed here.

Elementor-generated CSS remains managed by Elementor.

---

# 10 — Landing Page Types

## 10.1 Standard Page Types

The project supports four standardized landing page types:

```text
PPG
Promo
Seminar
Thank You
```

These are page types, not separate themes.

## 10.2 Shared Architecture

All page types use the shared theme architecture and component library.

```text
PPG
Promo
Seminar
Thank You
       │
       ▼
Shared Theme Architecture
       │
       ├── Hero
       ├── Offer
       ├── Brand Intro
       ├── Information
       ├── Benefit
       ├── Testimonial
       ├── CTA Banner
       └── Footer
```

A page type uses only the components it requires.

## 10.3 Page-Type Variations

Page types may have different:

* Component combinations
* Content requirements
* ACF fields
* Elementor layouts
* Presentation requirements
* Conversion goals

They still inherit the same:

* Theme architecture
* Universal CSS
* Design system
* Component naming
* Responsive system
* Desktop → Tablet → Mobile standards

## 10.4 Architecture Rule

Do not create separate theme architectures for each landing page type.

```text
One Theme
   │
   ├── PPG
   ├── Promo
   ├── Seminar
   └── Thank You
        │
        ▼
Shared Components
```

---

# 11 — Master Architecture Rules

## Rule 1 — Theme Owns Architecture

The theme owns:

* Templates
* Components
* Universal CSS
* JavaScript
* ACF configuration
* WordPress integration

## Rule 2 — ACF Owns Structured Data

ACF manages structured, reusable information.

The theme owns the ACF configuration.

## Rule 3 — Elementor Owns Presentation

Elementor manages:

* Page composition
* Visual layout
* Page-specific styling
* Responsive presentation

## Rule 4 — Universal CSS Stays Universal

Theme CSS establishes standards that remain consistent across every landing page.

## Rule 5 — Responsive Standards Are Consistent

All landing pages use:

```text
Desktop
   ↓
Tablet
   ↓
Mobile
```

## Rule 6 — Components Are Reusable

The same component architecture supports all landing page types.

## Rule 7 — Page Types Are Not Separate Architectures

PPG, Promo, Seminar, and Thank You share the same theme foundation.

## Rule 8 — Use the Correct System

Always ask:

```text
Theme       → Architecture
ACF         → Structured Data
Theme CSS   → Universal Styling
Elementor   → Page Presentation
Theme JS    → Functionality
```

## Rule 9 — Avoid Duplication

Do not maintain the same architecture, content, or universal styling independently in multiple systems.

## Rule 10 — Build for Reuse

When the underlying requirement is the same, the solution should be reusable across multiple landing pages.

---

# 12 — Future Implementation Sections

The master architecture establishes the foundation. Detailed implementation should be documented separately.

Planned sections:

```text
10 — PHP & Template Architecture
11 — ACF PHP Implementation
12 — Elementor Implementation Rules
13 — CSS Architecture
14 — JavaScript Architecture
15 — Component Specifications
16 — Landing Page Type Specifications
17 — Development & Deployment Workflow
18 — QA & Testing Standards
19 — Maintenance & Versioning
```

These sections should extend the master architecture rather than redefine its responsibilities.

---

# Architecture Summary

```text
                         WORDPRESS
                             │
          ┌──────────────────┼──────────────────┐
          │                  │                  │
        THEME               ACF             ELEMENTOR
          │                  │                  │
     Architecture        Structured          Visual
      + Foundation          Data           Presentation
          │                  │                  │
          └──────────────────┼──────────────────┘
                             │
                     LANDING PAGE TYPES
                             │
          ┌──────────┬───────┼───────┬──────────┐
          │          │       │       │          │
         PPG       Promo  Seminar  Thank You   Other
          │          │       │       │          │
          └──────────┴───────┼───────┴──────────┘
                             │
                     SHARED COMPONENTS
                             │
       ┌─────────┬─────────┬─┴────────┬─────────┐
       │         │         │          │         │
      Hero     Offer    Detail    Benefit  Testimonial
       │
       ├── Brand Intro
       ├── Closure
       └── Footer
```

**End of Master Architecture — Version 1.0**
