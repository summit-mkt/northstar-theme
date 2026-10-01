# Hero Section

**Component:** `hero`
**Version:** 1.1
**Status:** Draft
**Last Updated:** 2026-09-30

---

# 01 — Purpose

## Overview

The Hero is the primary introductory and conversion section of the landing page.

It combines:

* Brand identity
* Demographic targeting
* Seasonal content
* Primary messaging
* CTA/form
* Hero imagery

The Hero uses **ACF for structured brand data**, **Theme/PHP for shared variables and dynamic content**, **Elementor for page presentation**, and **Global variables for reusable design values**.

## Primary Goal

Clearly communicate the landing page's primary message while presenting the appropriate brand, demographic, seasonal, and conversion content.

## Used On

* PPG
* Promo
* Seminar

---

# 02 — Component Structure

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

## Structure Notes

| Element           | Purpose                 |
| ----------------- | ----------------------- |
| `hero`            | Root Hero component     |
| `hero__container` | Main Hero layout        |
| `hero__content`   | Primary content area    |
| `hero__logo`      | Brand logo              |
| `hero__header`    | Primary Hero messaging  |
| `hero__cta`       | Primary conversion area |
| `hero__subtitle`  | Supporting CTA content  |
| `hero__form`      | Conversion form         |
| `hero__media`     | Hero media area         |
| `hero__video`     | Hero video/media        |

---

# 03 — Class Names

| Element   | Class             |
| --------- | ----------------- |
| Section   | `hero`            |
| Container | `hero__container` |
| Content   | `hero__content`   |
| Logo      | `hero__logo`      |
| Header    | `hero__header`    |
| CTA       | `hero__cta`       |
| Subtitle  | `hero__subtitle`  |
| Form      | `hero__form`      |
| Media     | `hero__media`     |
| Video     | `hero__video`     |

---

# 04 — ACF Configuration

The Hero uses the **Brand** ACF field group for brand-level information.

## ACF Field Group

```text
Brand
```

## Fields

| Field         | Type      | Purpose                                 |
| ------------- | --------- | --------------------------------------- |
| Logo          | Image     | Hero/brand logo                         |
| Demographics  | PHP       | Determines demographic-specific content |
| Seasonal      | PHP       | Determines seasonal-specific content    |
| Primary Color | Color     | Primary brand color                     |
| Secondary     | Color     | Secondary brand color                   |
| Text          | Static    | Static brand text                       |
| Accent        | Color     | Accent color and border treatment       |

### ACF Structure

```text
ACF
└── Brand
    ├── Logo
    │   └── hero_logo
    ├── Demographics
    │   └── PHP
    ├── Seasonal
    │   └── PHP
    ├── Primary Color
    ├── Secondary
    ├── Text
    │   └── Static
    └── Accent
        └── Border
```

## ACF Responsibility

ACF provides the structured brand information.

The Hero should retrieve this information rather than hardcoding brand-specific values into the component.

---

# 05 — Theme / PHP Configuration

The Theme/PHP layer provides the shared variables and dynamic values required by the Hero.

## Theme/PHP Variables

```text
Theme/PHP
├── --text-p
├── --text-h1
├── --text-h2
├── --space-m
├── --hero-image
├── --demo-img
└── --season-img
```

## Variable Definitions

| Variable       | Purpose                             |
| -------------- | ----------------------------------- |
| `--text-p`     | Primary paragraph/body text styling |
| `--text-h1`    | Primary Hero heading styling        |
| `--text-h2`    | Secondary heading styling           |
| `--space-m`    | Standard medium spacing             |
| `--hero-image` | Hero image/media value              |
| `--demo-img`   | Demographic-specific image          |
| `--season-img` | Seasonal-specific image             |

## PHP Responsibilities

PHP determines and outputs the appropriate dynamic values.

Examples include:

```text
Brand
 ↓
ACF
 ↓
PHP
 ↓
Dynamic Variables
 ↓
Hero
```

### Demographic

The demographic value is determined through PHP and can be used to select the appropriate demographic-specific content or image.

```text
Demographics
      ↓
     PHP
      ↓
--demo-img
```

### Seasonal

The seasonal value is determined through PHP and can be used to select the appropriate seasonal-specific content or image.

```text
Seasonal
    ↓
   PHP
    ↓
--season-img
```

### Hero Image

The Hero image value is provided through the Theme/PHP layer:

```text
--hero-image
```

---

# 06 — Elementor Configuration

Elementor controls the visual presentation of the Hero.

## Elementor IDs

The Hero uses the following Elementor IDs:

```text
#hero__container
#hero__logo
#hero__cta
#hero__content
```

### Elementor Structure

```text
hero
└── #hero__container
    ├── #hero__content
    │   ├── #hero__logo
    │   ├── hero__header
    │   └── #hero__cta
    │       ├── hero__subtitle
    │       └── hero__form
    │
    └── hero__media
        └── hero__video
```

## Elementor Responsibilities

Elementor controls:

* Visual layout
* Content placement
* CTA positioning
* Form placement
* Responsive presentation
* Page-specific visual adjustments
* Media presentation

## Elementor IDs vs CSS Classes

The Elementor IDs above identify the specific Elementor elements.

The component classes define the reusable architecture.

```text
Elementor ID
    ↓
Specific Elementor element

CSS Class
    ↓
Reusable component architecture
```

Example:

```text
ID:
#hero__container

Class:
.hero__container
```

The ID should not replace the component class.

---

# 07 — Global Variables

The Hero uses the global design system for reusable styling values.

## Global Variables

```text
GLOBAL
├── text-color-primary
├── bg-color-primary
└── bor-rad-m
```

## Variable Definitions

| Variable             | Purpose                  |
| -------------------- | ------------------------ |
| `text-color-primary` | Primary text color       |
| `bg-color-primary`   | Primary background color |
| `bor-rad-m`          | Medium border radius     |

These values should be defined once within the global design system and reused by components.

---

# 08 — Variable Responsibility

The Hero follows a clear separation between variable sources.

```text
ACF
│
├── Brand Logo
├── Primary Color
├── Secondary
├── Text
└── Accent
       │
       ▼
     PHP
       │
       ├── Demographics
       ├── Seasonal
       ├── Hero Image
       ├── Demo Image
       └── Season Image
       │
       ▼
    Elementor
       │
       └── Visual Presentation
```

Global design values remain separate:

```text
GLOBAL
│
├── text-color-primary
├── bg-color-primary
└── bor-rad-m
```

---

# 09 — CSS Requirements

## Theme/PHP Variables

The Theme/PHP layer establishes the Hero's shared variables:

```css
--text-p
--text-h1
--text-h2
--space-m
--hero-image
--demo-img
--season-img
```

## Global Variables

The Hero can consume:

```css
text-color-primary
bg-color-primary
bor-rad-m
```

## CSS Responsibility

### Theme

The theme provides:

* Root variables
* CSS reset
* Universal design foundation
* Dynamic PHP values
* Shared component foundations

### Elementor

Elementor provides:

* Visual layout
* Page-specific styling
* Widget styling
* Responsive presentation

The Hero should not create duplicate global variables when an existing global variable already provides the required value.

---

# 10 — Responsive Behavior

The Hero follows the project-wide responsive standard:

```text
Desktop
    ↓
Tablet
    ↓
Mobile
```

## Desktop

```text
Content | Media
```

The content and Hero media occupy their respective areas.

## Tablet

The two-area layout is adjusted as needed based on available space.

Spacing and typography may scale using the established variables.

## Mobile

```text
Content
    ↓
Media
```

The Hero content should simply stack above the media.

## Responsive Variables

The following values may be used to support responsive presentation:

```text
--text-p
--text-h1
--text-h2
--space-m
```

---

# 11 — Content / Data Flow

The Hero follows this general data flow:

```text
ACF Brand
    │
    ├── hero_logo
    ├── Primary Color
    ├── Secondary
    ├── Text
    └── Accent
         │
         ▼
       PHP
         │
         ├── Demographics
         ├── Seasonal
         ├── Hero Image
         ├── Demo Image
         └── Season Image
         │
         ▼
      Hero Component
         │
         ▼
      Elementor
         │
         ▼
   Visual Presentation
```

Global design values are available independently:

```text
Global
├── text-color-primary
├── bg-color-primary
└── bor-rad-m
```

---

# 12 — PHP / Template Behavior

## Component Location

```text
/components/hero/
```

## Expected Structure

```text
hero/
├── hero.php
├── hero.css
└── hero.js
```

The exact PHP implementation will be defined in the PHP implementation documentation.

## PHP Responsibilities

* Retrieve Brand ACF data
* Determine demographic data
* Determine seasonal data
* Determine appropriate Hero imagery
* Output dynamic values
* Render optional content
* Maintain the Hero component structure

PHP should not control the visual page layout that belongs to Elementor.

---

# 13 — JavaScript

## Required JavaScript

**Status:** To Be Determined

The Hero should not include custom JavaScript unless required for a specific interaction.

Potential functionality may include:

* Video behavior
* Form behavior
* CTA interaction
* Tracking
* Animation

Global functionality should remain outside the Hero component.

---

# 14 — Accessibility

The Hero must maintain:

* Proper heading hierarchy
* Accessible logo/image handling
* Accessible form labels
* Keyboard navigation
* Visible focus states
* Appropriate color contrast
* Accessible video controls where applicable

The primary Hero heading should normally be the page's H1.

---

# 15 — SEO

## Primary Heading

The Hero should normally contain the page's primary H1.

```html
<h1>Primary Page Heading</h1>
```

## Content

Important page information should exist as accessible text rather than being contained only within an image or video.

## Media

Hero media should support, rather than replace, the page's primary textual content.

---

# 16 — Variations

Hero variations may use modifiers where required.

Examples:

```text
hero--dark
hero--light
hero--split
```

Modifiers should only be introduced when a genuine component variation exists.

Brand, demographic, and seasonal differences should primarily be handled through the appropriate ACF/PHP data rather than creating separate Hero components.

---

# 17 — Dependencies

## ACF

```text
Brand
├── hero_logo
├── Demographics
├── Seasonal
├── Primary Color
├── Secondary
├── Text
└── Accent
```

## Theme/PHP

```text
--text-p
--text-h1
--text-h2
--space-m
--hero-image
--demo-img
--season-img
```

## Elementor

```text
#hero__container
#hero__logo
#hero__cta
#hero__content
```

## Global

```text
text-color-primary
bg-color-primary
bor-rad-m
```

---

# 18 — QA Checklist

## Structure

* [ ] `hero` component exists
* [ ] `hero__container` exists
* [ ] `hero__content` exists
* [ ] `hero__logo` exists
* [ ] `hero__header` exists
* [ ] `hero__cta` exists
* [ ] `hero__subtitle` exists
* [ ] `hero__form` exists
* [ ] `hero__media` exists
* [ ] `hero__video` exists

## ACF

* [ ] Brand field group available
* [ ] `hero_logo` available
* [ ] Primary Color available
* [ ] Secondary available
* [ ] Text available
* [ ] Accent available
* [ ] Demographic PHP logic verified
* [ ] Seasonal PHP logic verified

## Theme/PHP

* [ ] `--text-p` available
* [ ] `--text-h1` available
* [ ] `--text-h2` available
* [ ] `--space-m` available
* [ ] `--hero-image` available
* [ ] `--demo-img` available
* [ ] `--season-img` available

## Elementor

* [ ] `#hero__container`
* [ ] `#hero__logo`
* [ ] `#hero__cta`
* [ ] `#hero__content`

## Global

* [ ] `text-color-primary`
* [ ] `bg-color-primary`
* [ ] `bor-rad-m`

## Responsive

* [ ] Desktop verified
* [ ] Tablet verified
* [ ] Mobile verified
* [ ] Content stacks correctly on mobile
* [ ] Hero media remains responsive
* [ ] No horizontal overflow

---

# 19 — Component Summary

```text
HERO
│
├── ACF
│   └── Brand
│       ├── hero_logo
│       ├── Demographics → PHP
│       ├── Seasonal → PHP
│       ├── Primary Color
│       ├── Secondary
│       ├── Text → Static
│       └── Accent → Border
│
├── THEME / PHP
│   ├── --text-p
│   ├── --text-h1
│   ├── --text-h2
│   ├── --space-m
│   ├── --hero-image
│   ├── --demo-img
│   └── --season-img
│
├── ELEMENTOR
│   ├── #hero__container
│   ├── #hero__logo
│   ├── #hero__cta
│   └── #hero__content
│
└── GLOBAL
    ├── text-color-primary
    ├── bg-color-primary
    └── bor-rad-m
```

---

# 20 — Change Log

| Version | Date       | Change                                                            | Author |
| ------- | ---------- | ----------------------------------------------------------------- | ------ |
| 1.0     | 2026-09-30 | Initial Hero documentation                                        | Cindy H |
| 1.1     | 2026-09-30 | Added ACF, Theme/PHP, Elementor, and Global variable architecture | Cindy H |

```

This version makes the **source of each value explicit**, which will be especially useful when we document the other sections. One thing we should preserve consistently going forward is the distinction between **ACF data**, **PHP-generated values**, **Elementor IDs**, and **global design variables**.
```