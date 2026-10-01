# 02 — Offer Section

## 01 — Purpose

The Offer section presents the primary offer information, supporting details, imagery, and call to action.

The component is reusable across landing-page types and supports a configurable content order through the ACF `Direction` switch.

---

# 02 — Component Structure

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

---

# 03 — Class Names

| Element   | Class              |
| --------- | ------------------ |
| Section   | `offer`            |
| Container | `offer__container` |
| Header    | `offer__header`    |
| Grid      | `offer__grid`      |
| Item      | `offer__item`      |
| Text      | `offer__text`      |
| CTA       | `offer__cta`       |

### Modifier

```text
offer--reverse
```

The `offer--reverse` modifier changes the visual order of the Offer content.

---

# 04 — ACF Configuration

The Offer uses the **Page** ACF field group for page-level Offer information.

## ACF Field Group

```text
Page
```

## Fields

| Field     | Type             | Purpose                                         |
| --------- | ---------------- | ----------------------------------------------- |
| Title     | Text             | Primary heading for the Offer section.          |
| Subtitle  | Text             | Supporting heading or introductory Offer text.  |
| Direction | True / False     | Controls the visual order of the Offer content. |
| Address   | Text             | Physical address associated with the Offer.     |
| Datetime  | Date Time Picker | Date and time associated with the Offer.        |
| Image 1   | Image            | Primary Offer image.                            |
| Image 2   | Image            | Secondary Offer image.                          |

## Direction

`Direction` is a **True / False** field used as a content-order switch.

### Default

```text
Direction = Off
```

```text
Content → Media
```

### Reverse

```text
Direction = On
```

```text
Media → Content
```

When enabled, PHP applies:

```text
offer--reverse
```

Result:

```text
offer offer--reverse
```

The HTML structure remains unchanged. CSS controls the visual order.

---

# 05 — Theme/PHP Configuration

The Theme/PHP layer retrieves the ACF data and prepares it for the Offer component.

## Responsibilities

* Retrieve Offer ACF fields
* Handle optional fields
* Format the date/time
* Retrieve image data
* Determine the Direction value
* Apply `offer--reverse`
* Maintain the Offer HTML structure

## Direction Logic

```text
ACF Direction
      ↓
   PHP
      ↓
Direction = Off
      ↓
offer

Direction = On
      ↓
offer offer--reverse
```

PHP controls the state; CSS controls the visual result.

---

# 06 — Elementor Configuration

Elementor controls the visual presentation and page-specific configuration.

## Elementor ID

```text
#offer
```

## Elementor Elements

```text
#offer__container
#offer__header
#offer__grid
#offer__item
#offer__text
#offer__cta
```

## Elementor Responsibilities

* Component placement
* Visual presentation
* Grid configuration
* Responsive adjustments
* Page-specific styling
* CTA presentation

Elementor IDs are separate from the BEM class naming system.

---

# 07 — Global Variables

The Offer component uses the project's global design system.

```text
GLOBAL
├── Flex
├── Grid
├── Color
└── Sizes
    ├── Spacing
    └── Border-Radius
```

The component should use existing global variables rather than creating duplicate values.

### Global Variables Used

* Primary text color
* Primary background color
* Typography variables
* Spacing variables
* Border-radius variables
* Grid variables
* Flex variables

---

# 08 — Variable Responsibility

| Variable / Data             | Responsibility |
| --------------------------- | -------------- |
| Title                       | ACF            |
| Subtitle                    | ACF            |
| Direction                   | ACF            |
| Address                     | ACF            |
| Datetime                    | ACF            |
| Image 1                     | ACF            |
| Image 2                     | ACF            |
| Content retrieval           | PHP            |
| `offer--reverse`            | PHP            |
| Component CSS               | Theme          |
| Global design variables     | Theme          |
| Page presentation           | Elementor      |
| Responsive page adjustments | Elementor      |

### Architecture Rule

**ACF = structured data**

**PHP = data retrieval and component logic**

**Theme CSS = universal component styling**

**Elementor = page presentation**

---

# 09 — CSS Requirements

The Offer component requires universal theme CSS for its reusable structure.

## Base Classes

```text
.offer
.offer__container
.offer__header
.offer__grid
.offer__item
.offer__text
.offer__cta
```

## Modifier

```text
.offer--reverse
```

### CSS Responsibilities

* Offer layout
* Grid behavior
* Content ordering
* Spacing
* Typography foundation
* Image behavior
* CTA structure
* Responsive behavior
* Border radius

The theme should provide the reusable Offer styling.

Page-specific styling remains within Elementor.

---

# 10 — Responsive Behavior

The Offer follows the standard project responsive structure:

```text
Desktop
   ↓
Tablet
   ↓
Mobile
```

## Desktop

Default:

```text
Content | Media
```

Reverse:

```text
Media | Content
```

## Tablet

The component adapts to the available width while maintaining the selected content order.

## Mobile

The content stacks vertically.

Default:

```text
Content
Media
```

Reverse:

```text
Media
Content
```

The `Direction` setting controls the intended order across responsive layouts.

---

# 11 — Content/Data Flow

```text
ACF
 │
 ├── Title
 ├── Subtitle
 ├── Direction
 ├── Address
 ├── Datetime
 ├── Image 1
 └── Image 2
 │
 ↓
PHP / Theme
 │
 ├── Retrieve data
 ├── Format data
 ├── Check optional fields
 └── Apply offer--reverse
 │
 ↓
Offer Component
 │
 ├── offer__header
 ├── offer__grid
 ├── offer__item
 ├── offer__text
 └── offer__cta
 │
 ↓
Elementor
 │
 └── Page Presentation
```

---

# 12 — PHP/Template Behavior

The Offer template should:

1. Retrieve the Page ACF fields.
2. Check optional fields.
3. Retrieve the Direction value.
4. Apply `offer--reverse` when enabled.
5. Output only populated content.
6. Maintain the same HTML structure.
7. Provide appropriate image attributes.
8. Allow Elementor to control presentation.

### Direction Example

```php
$direction = get_field('direction');

$offer_class = 'offer';

if ($direction) {
    $offer_class .= ' offer--reverse';
}
```

Output:

```html
<section class="offer">
```

or:

```html
<section class="offer offer--reverse">
```

---

# 13 — JavaScript

The Offer component does not require JavaScript for its core functionality.

```text
JavaScript
└── Not required
```

The Direction functionality is handled through:

```text
ACF → PHP → CSS
```

JavaScript should only be introduced if a future Offer interaction requires it.

---

# 14 — Accessibility

The Offer component should follow standard accessibility practices.

### Headings

* Maintain a logical heading hierarchy.
* Do not skip heading levels for visual styling.

### Images

* Provide meaningful alt text for content images.
* Use empty alt attributes for decorative images when appropriate.

### CTA

* Use descriptive CTA text.
* Ensure links/buttons are keyboard accessible.
* Maintain visible focus states.

### Content

* Address information should remain readable.
* Date/time information should be presented in a human-readable format.

---

# 15 — SEO

The Offer component should use semantic and meaningful content.

### Requirements

* Use the appropriate heading level.
* Keep important Offer content as HTML text.
* Use descriptive image alt text.
* Keep address and date/time information indexable.
* Avoid placing important content exclusively inside images.

The Offer component should not create unnecessary duplicate content or metadata.

---

# 16 — Variations

## Default Offer

```text
offer
```

Content order:

```text
Content → Media
```

## Reverse Offer

```text
offer offer--reverse
```

Content order:

```text
Media → Content
```

The variation is controlled through the ACF `Direction` field.

No separate template is required.

---

# 17 — Dependencies

The Offer component depends on:

### WordPress

* Page/template system
* Media handling
* Content management

### ACF

* Page field group
* Offer fields
* Direction switch

### Theme

* PHP/template structure
* Component architecture
* Universal CSS
* Global design variables

### Elementor Pro

* Page presentation
* Visual editing
* Responsive adjustments
* Page-specific styling

---

# 18 — QA Checklist

### Structure

* [ ] `offer` exists
* [ ] `offer__container` exists
* [ ] `offer__header` exists
* [ ] `offer__grid` exists
* [ ] `offer__item` exists
* [ ] `offer__text` exists
* [ ] `offer__cta` exists

### ACF

* [ ] Page field group configured
* [ ] Title configured as Text
* [ ] Subtitle configured as Text
* [ ] Direction configured as True / False
* [ ] Address configured as Text
* [ ] Datetime configured as Date Time Picker
* [ ] Image 1 configured as Image
* [ ] Image 2 configured as Image

### Direction

* [ ] Default Direction is Off
* [ ] Default content order works
* [ ] Direction On applies `offer--reverse`
* [ ] Reverse content order works
* [ ] Mobile preserves the intended order

### Responsive

* [ ] Desktop verified
* [ ] Tablet verified
* [ ] Mobile verified
* [ ] Content stacks correctly
* [ ] No horizontal overflow

### Elementor

* [ ] `#offer` ID configured
* [ ] Elementor presentation verified
* [ ] Responsive settings do not conflict with theme CSS

---

# 19 — Component Summary

```text
OFFER
│
├── Component
│   └── offer
│
├── ACF
│   └── Page
│       ├── Title
│       ├── Subtitle
│       ├── Direction
│       ├── Address
│       ├── Datetime
│       ├── Image 1
│       └── Image 2
│
├── Theme/PHP
│   ├── Data retrieval
│   ├── Date formatting
│   └── Direction logic
│
├── Elementor
│   └── #offer
│
├── CSS
│   ├── Component styles
│   └── offer--reverse
│
└── Responsive
    └── Desktop → Tablet → Mobile
```

---

# 20 — Change Log

| Version | Change                                             |
| ------- | -------------------------------------------------- |
| 1.0     | Initial Offer component documentation              |
| 1.0     | Added complete ACF field configuration             |
| 1.0     | Changed Direction to True / False                  |
| 1.0     | Defined Direction as content-order control         |
| 1.0     | Added `offer--reverse` modifier                    |
| 1.0     | Standardized structure to match Hero documentation |
