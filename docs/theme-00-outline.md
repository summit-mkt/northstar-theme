
ACF
├── Post Types
│   ├── PPG
│   ├── Promo
│   ├── Seminar
│   └── Thank you
│   
└── Field Groups
    ├── Brand
    ├── Download
    ├── Events
    └── Page


THEME/PHP
└──  Root variables
    ├── Clamp Font	
    ├── Clamp Spacing
    └── CSS reset
 

ELEMENTOR
└── IDs
    ├── hero
    ├── offer
    │  ┌───────┐*
    ├──│ brand │
    │  └───────┘
    ├── details
    ├── benefit
    │  ┌─────────────┐
    ├──│ testimonial │
    │  └─────────────┘
    └── closer


GLOBAL
├── Flex
├── Grid
├── Color
└── Sizes
    ├── Spacing
    └── Border-Radius






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


offer
└── offer__container
    ├── offer__header
    │
    └── offer__grid
    │    └── offer__item
    │
    ├── offer__text
    └── offer__cta


┌───────┐*
│ brand │
├───────┘
│
└── brand__container
    ├── brand__content
    │   ├── brand__header
    │   └── brand__cta
    │
    └── brand__media
        └── brand__video


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


benefit
└── benefit__container
    ├── benefit__header
    │
    └── benefit__grid
        └── benefit__item
            ├── benefit__icon
            ├── benefit__title
            └── benefit__text

┌─────────────┐
│ testimonial │
├─────────────┘
│
└── testimonial__container
    ├── testimonial__header
    │
    └── testimonial__grid
        └── testimonial__item
            ├── testimonial__quote
            ├── testimonial__author
            ├── testimonial__rating
            └── testimonial__image


closer
└── closer__container
    ├── hero__header
    └── hero__cta




footer
└── footer__container
    ├── footer__content
    │
    └── footer__disclaimer
        ├── disclaimer
        ├── disclaimer--promo
        ├── disclaimer--state
        └── disclaimer--phone


┌───────────────────────┬───────────────────────────────┬───────────────────────┐
│ Purpose		│ Convention			│ Example		│
├───────────────────────┼───────────────────────────────┼───────────────────────┤ 
│ Section		│ [section]			│ hero			│
│ Container		│ [section]__container		│ hero__container	│
│ Content     		│ [section]__content		│ hero__content		│
│ Media	        	│ [section]__media		│ hero__media		│
│ Header		│ [section]__header		│ offer__header		│
│ Title	        	│ [section]__title		│ hero__title		│
│ Text	        	│ [section]__text		│ hero__text		│
│ CTA	        	│ [section]__cta		│ hero__cta		│
│ Grid	        	│ [section]__grid		│ benefit__grid		│
│ Item	        	│ [section]__item		│ benefit__item		│
│ Icon	        	│ [section]__icon		│ benefit__icon		│
│ Image	        	│ [section]__image		│ details__image	│
│ Form	        	│ [section]__form		│ hero__form		│
│ Variation		│ [component]--[modifier]	│ hero--dark		│
└───────────────────────┴───────────────────────────────┴───────────────────────┘


