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
    │   ├── Routes/               # api.php and web.php for module
    │   └── Services/             # Complex business logic (Design Pattern)
    ├── UserManagement/
    ├── SEO/
    └── [Other Modules...]
docs/                             # Documentation blueprint
public/                           # Compiled assets
resources/                        # Views, Lang, raw assets
tests/                            # Unit and Feature tests
```

---

## Design Patterns

### 1. Service-Repository Pattern
While Laravel promotes Eloquent usage, we use **Services** to encapsulate complex business logic, ensuring controllers remain thin and readable.

### 2. Modular Routing
Each module registers its own routes via its `ServiceProvider`. This prevents the main `web.php` and `api.php` from becoming bottlenecks.

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
