# 02 — Offer Component Documentation

Component: `offer`
Version: 1.0
Status: Draft

---

# 01 — Purpose

The Offer component presents the primary offer information using a structured content and media layout.

The component supports:

* Offer title
* Supporting subtitle
* Offer details
* Address
* Date and time
* Two images
* Call to action
* Reversible content order

The component is designed to be reusable across the landing-page architecture while allowing the content order to change through ACF.

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
    │
    └── offer__cta
```

## Structure Responsibilities

| Element            | Purpose                                    |
| ------------------ | ------------------------------------------ |
| `offer`            | Root Offer component                       |
| `offer__container` | Main component container                   |
| `offer__header`    | Displays the primary Offer heading/content |
| `offer__grid`      | Contains the Offer items                   |
| `offer__item`      | Individual Offer item                      |
| `offer__text`      | Supporting Offer information               |
| `offer__cta`       | Call-to-action area                        |

The HTML structure remains consistent regardless of the content direction.

---

# 03 — Class Names

The Offer component follows the project BEM naming convention.

| Element   | Class              |
| --------- | ------------------ |
| Section   | `offer`            |
| Container | `offer__container` |
| Header    | `offer__header`    |
| Grid      | `offer__grid`      |
| Item      | `offer__item`      |
| Text      | `offer__text`      |
| CTA       | `offer__cta`       |

## Modifier

| Modifier         | Purpose                                        |
| ---------------- | ---------------------------------------------- |
| `offer--reverse` | Reverses the visual order of the Offer content |

### Default

```text
offer
```

### Reverse

```text
offer offer--reverse
```

The modifier changes the visual order without requiring a separate component structure.

---

# 04 — ACF Configuration

The Offer component uses the Page ACF field group for structured page-level content.

## ACF Field Group

```text
Page
```

## Fields

| Field     | Type             | Purpose                                                | Grouping    |
| --------- | ---------------- | ------------------------------------------------------ | ----------- |
| Title     | Text             | Primary heading for the Offer section.                 | Repeater    |   
| Subtitle  | Text             | Supporting heading or introductory text for the Offer. | Repeater    |
| Direction | True / False     | Controls the visual order of the Offer content.        | Repeater    |
| Address   | Text             | Stores the physical address associated with the Offer. |             |
| Datetime  | Date Time Picker | Stores the date and time associated with the Offer.    |             |
| Image 1   | Image            | Primary image used for the Offer.                      |             |
| Image 2   | Image            | Secondary image used for the Offer.                    |             |

---

## 04.1 — Title

Field Type: `Text`

Purpose:
Stores the primary heading displayed within the Offer component.

```text
Title
└── Text
```

### Recommended Settings

| Setting         | Value      |
| --------------- | ---------- |
| Required        | Yes        |
| Formatting      | Plain Text |
| Character Limit | Optional   |

---

## 04.2 — Subtitle

Field Type: `Text`

Purpose:
Stores supporting text associated with the Offer title.

```text
Subtitle
└── Text
```

### Recommended Settings

| Setting         | Value      |
| --------------- | ---------- |
| Required        | No         |
| Formatting      | Plain Text |
| Character Limit | Optional   |

---

## 04.3 — Direction

Field Type: `True / False`

Purpose:
Controls the visual order of the Offer content.

The field is a layout switch rather than a content field.

```text
Direction
└── True / False
```

### Recommended Settings

| Setting       | Value        |
| ------------- | ------------ |
| Field Type    | True / False |
| UI            | Toggle       |
| Default Value | Off          |
| Required      | No           |

### Layout Behavior

Direction = Off

```text
Content → Media
```

Direction = On

```text
Media → Content
```

When enabled, PHP applies:

```text
offer--reverse
```

Resulting class:

```text
offer offer--reverse
```

The CSS modifier controls the visual ordering.

### Responsibility

ACF

Stores the Direction value.

PHP / Theme

Reads the value and applies the `offer--reverse` modifier.

Theme CSS

Controls the visual content order.

Elementor

Controls presentation and responsive adjustments.

---

## 04.4 — Address

Field Type: `Text`

Purpose:
Stores the physical address associated with the Offer.

```text
Address
└── Text
```

### Recommended Settings

| Setting    | Value      |
| ---------- | ---------- |
| Required   | No         |
| Formatting | Plain Text |

The address remains structured content and can be presented by the Offer component or used for navigation functionality.

---

## 04.5 — Datetime

Field Type: `Date Time Picker`

Purpose:
Stores the date and time associated with the Offer.

```text
Datetime
└── Date Time Picker
```

### Recommended Settings

| Setting        | Value                     |
| -------------- | ------------------------- |
| Required       | No                        |
| Date Picker    | Enabled                   |
| Time Picker    | Enabled                   |
| Return Format  | Defined by implementation |
| Display Format | Defined by implementation |

PHP should format the stored value for frontend display.

---

## 04.6 — Image 1 & 2

Field Type: `Image`

Purpose:
Stores the primary Offer images for seminar.

```text
Image 1
└── Image
```

### Recommended Settings

| Setting | Value |
| ------- | ----- |
|         |       |
