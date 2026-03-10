# Abriba Software Architecture

## Folder Structure (Modular)

We deviate from the standard Laravel `app/Http/Controllers` structure to prioritize scalability via **Modules**.

```text
app/
└── Modules/                      # Core business logic
    ├── Blog/                     # Individual Feature Module
    │   ├── Controllers/          # Feature-specific Controllers
    │   ├── Models/               # Eloquent Models
    │   ├── Providers/            # Module Service Providers
    │   ├── Routes/               # Primary: web.php, Optional: api.php
    │   ├── Services/             # Complex business logic
    │   └── Views/                # Blade templates for this module
    ├── UserManagement/
    ├── SEO/
    └── [Other Modules...]
docs/                             # Documentation blueprint
public/                           # Compiled assets
resources/                        # Global Views, Lang, raw assets
tests/                            # Unit and Feature tests
```

---

## Design Patterns

### 1. Server-Side Rendering (SSR)
Abriba is built on **Laravel Blade**. We prioritize SSR for unmatched SEO, performance, and simplicity. Each module manages its own frontend views.

### 2. Service-Repository Pattern
While Laravel promotes Eloquent usage, we use **Services** to encapsulate complex business logic, ensuring controllers remain thin and readable.

### 3. Modular View Loading
Each module's `ServiceProvider` registers its views using `loadViewsFrom`. Example:
`@include('Blog::list')`

### 3. Future-Proofing
The modular structure allows seamless addition of:
- **Newsletter**: A new `app/Modules/Newsletter` directory.
- **E-commerce**: Integrate `app/Modules/Store` for selling merchandise or digital goods.
- **Analytics**: Dedicated module for internal tracking and 3rd party reporting.

---

## UI/UX Principles
- **Premium Aesthetics**: Use of CSS variables for theming.
- **Micro-animations**: Subtle transitions for hover and loading states.
- **Mobile First**: Fully responsive layouts using Vanilla CSS Flex/Grid.
