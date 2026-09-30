# [SECTION NAME]

**Component:** `[section]`
**Version:** 1.0
**Status:** [Draft / Approved]
**Last Updated:** [YYYY-MM-DD]

---

## 01 — Purpose

### Overview

[Describe what this section is responsible for and why it exists.]

### Primary Goal

[Describe the primary purpose of the section.]

### Used On

* [PPG]
* [Promo]
* [Seminar]
* [Thank You]

---

# 02 — Component Structure

```text
[section]
└── [section]__container
    ├── [section]__content
    │   ├── [section]__[element]
    │   └── [section]__[element]
    │
    └── [section]__media
        └── [section]__[element]
```

### Structure Notes

[Explain the purpose of each major structural area.]

---

# 03 — Class Names

| Element   | Class                  | Purpose                         |
| --------- | ---------------------- | ------------------------------- |
| Section   | `[section]`            | Main component                  |
| Container | `[section]__container` | Controls component width/layout |
| Content   | `[section]__content`   | Main content area               |
| Media     | `[section]__media`     | Media area                      |
| Header    | `[section]__header`    | Heading/header content          |
| Text      | `[section]__text`      | Supporting text                 |
| CTA       | `[section]__cta`       | Call-to-action                  |
| Item      | `[section]__item`      | Repeating item                  |

> Only include the elements that actually exist in this component.

---

# 04 — Elementor Configuration

### Elementor Section ID

```text
[section]
```

### Elementor Structure

```text
[Elementor Section]
    └── [Container]
        ├── [Element]
        └── [Element]
```

### Elementor Responsibilities

* [Layout]
* [Content presentation]
* [Media placement]
* [Responsive adjustments]
* [Page-specific styling]

### Elementor Classes

| Elementor Element | Custom Class           |
| ----------------- | ---------------------- |
| Section           | `[section]`            |
| Container         | `[section]__container` |
| Element           | `[section]__[element]` |

### Elementor Notes

[Document any Elementor-specific implementation requirements.]

---

# 05 — ACF Configuration

### ACF Field Group

`[Field Group Name]`

### Data Source

* [Post Type]
* [Page]
* [Global]
* [Options Page]

### Fields

| Field          | Type      | Required | Purpose   |
| -------------- | --------- | -------: | --------- |
| `[field_name]` | [Text]    |      Yes | [Purpose] |
| `[field_name]` | [Image]   |       No | [Purpose] |
| `[field_name]` | [WYSIWYG] |       No | [Purpose] |
| `[field_name]` | [URL]     |       No | [Purpose] |

### ACF Rules

[Document conditional logic, repeaters, flexible content, relationships, or other ACF requirements.]

---

# 06 — Content Requirements

### Required Content

* [Content requirement]
* [Content requirement]
* [Content requirement]

### Optional Content

* [Optional content]
* [Optional content]

### Content Rules

[Document character limits, formatting requirements, required fields, fallback behavior, etc.]

---

# 07 — PHP / Template Behavior

### Template Location

```text
/components/[section]/
```

### Expected Files

```text
[section]/
├── [section].php
├── [section].css
└── [section].js
```

> Adjust the file structure according to the final theme architecture.

### PHP Responsibilities

* [Render component]
* [Retrieve ACF data]
* [Apply classes]
* [Handle optional content]
* [Handle fallback states]

### Data Flow

```text
ACF
 ↓
PHP
 ↓
Component
 ↓
Elementor / Page
```

### Conditional Logic

[Document when elements should or should not render.]

Example:

```php
if ( $field ) {
    // Render element
}
```

---

# 08 — CSS Requirements

### Component CSS

```text
[section]
[section]__container
[section]__content
[section]__media
```

### Global Dependencies

* [Typography]
* [Spacing]
* [Colors]
* [Container]
* [Grid]
* [Flex]
* [Border Radius]

### CSS Variables

```css
--[variable-name]:
```

### Layout

**Desktop**

[Describe desktop layout.]

**Tablet**

[Describe tablet layout.]

**Mobile**

[Describe mobile layout.]

---

# 09 — Responsive Behavior

| Element   | Desktop    | Tablet     | Mobile     |
| --------- | ---------- | ---------- | ---------- |
| Container | [Behavior] | [Behavior] | [Behavior] |
| Content   | [Behavior] | [Behavior] | [Behavior] |
| Media     | [Behavior] | [Behavior] | [Behavior] |
| CTA       | [Behavior] | [Behavior] | [Behavior] |

### Mobile Priority

1. [Primary content]
2. [Secondary content]
3. [CTA]
4. [Media]

### Responsive Exceptions

[Document any component-specific responsive exceptions.]

---

# 10 — JavaScript Behavior

### Required JavaScript

* [None / Required]

### Functionality

[Describe interactive behavior.]

### JavaScript Scope

```text
[section]
└── [functionality]
```

### Events

* [Click]
* [Submit]
* [Scroll]
* [Load]
* [Other]

---

# 11 — Accessibility

### Requirements

* [Semantic HTML]
* [Heading hierarchy]
* [Image alt text]
* [Keyboard navigation]
* [Form labels]
* [Focus states]
* [Color contrast]

### Accessibility Notes

[Document component-specific accessibility requirements.]

---

# 12 — SEO Considerations

### Heading

[H1 / H2 / H3 / Dynamic]

### Content

[SEO/content requirements.]

### Media

[Image/video requirements.]

### Structured Data

[If applicable.]

---

# 13 — Variations

### Modifier Classes

```text
[section]--[modifier]
```

| Modifier                | Purpose   |
| ----------------------- | --------- |
| `[section]--[modifier]` | [Purpose] |
| `[section]--[modifier]` | [Purpose] |

### Variation Rules

[Explain when each variation should be used.]

---

# 14 — Dependencies

### Theme

* [Theme component]
* [Global CSS]
* [Global JS]

### ACF

* [Field Group]
* [Field]

### Elementor

* [Widget]
* [Template]
* [Global Style]

### Plugins

* [Plugin]
* [Plugin]

---

# 15 — QA Checklist

### Structure

* [ ] Correct section class
* [ ] Correct container class
* [ ] Correct element classes
* [ ] Correct Elementor ID
* [ ] No unnecessary duplicate classes

### Content

* [ ] Required fields populated
* [ ] Optional fields tested
* [ ] Empty states tested
* [ ] Content formatting verified

### Desktop

* [ ] Layout verified
* [ ] Typography verified
* [ ] Spacing verified
* [ ] Media verified
* [ ] CTA verified

### Tablet

* [ ] Layout verified
* [ ] Spacing verified
* [ ] Typography verified
* [ ] Media verified
* [ ] CTA verified

### Mobile

* [ ] Content stacks correctly
* [ ] Spacing verified
* [ ] Typography verified
* [ ] Media verified
* [ ] CTA verified
* [ ] Touch targets verified

### Accessibility

* [ ] Keyboard navigation
* [ ] Focus states
* [ ] Alt text
* [ ] Heading hierarchy
* [ ] Contrast
* [ ] Form accessibility

---

# 16 — Implementation Notes

[Add technical notes, known limitations, special cases, or future improvements.]

---

# 17 — Change Log

| Version | Date         | Change                | Author |
| ------- | ------------ | --------------------- | ------ |
| 1.0     | [YYYY-MM-DD] | Initial documentation | [Name] |

---

# Component Summary

```text
Component:
[section]

Purpose:
[Short description]

Elementor ID:
[section]

ACF:
[Field Group]

PHP:
[Template/Component]

CSS:
[Component CSS]

JavaScript:
[Required / None]

Responsive:
Desktop → Tablet → Mobile
```
