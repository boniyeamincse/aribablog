# Abriba Module Specifications

Each module in Abriba is designed to be self-contained, following the "Service-Provider" pattern for clear separation.

---

## 1. User Management
**Features**:
- Authentication (Login, Register, Password Reset)
- Role-Based Access Control (Admin, Editor, Author, Subscriber)
- Profile management with avatars.

**Key Routes**:
- `POST /api/register`
- `POST /api/login`
- `GET /api/user/profile`

**Middleware**: `auth:sanctum`, `role:admin`

---

## 2. Blog Module
**Features**:
- Post creation with Markdown/HTML support.
- Draft/Publish workflow.
- Featured images and post scheduling.

**Key Routes**:
- `GET /blog` (List)
- `GET /blog/{slug}` (Detail)
- `POST /admin/posts` (Store)

**Services**: `PostService`, `SlugGenerator`

---

## 3. Comments Module
**Features**:
- Nested (threaded) comments.
- Akismet/Spam protection.
- Comment moderation queue.

**Key Routes**:
- `POST /blog/{post_id}/comments`
- `DELETE /admin/comments/{id}`

---

## 4. Media Module
**Features**:
- Centralized media library.
- Automatic image resizing and optimization.
- Support for S3 and Local storage.

**Key Routes**:
- `POST /admin/media/upload`

**Services**: `ImageOptimizer`, `FileUploadService`

---

## 5. Categories & Tags
**Features**:
- Hierarchical categories.
- Dynamic tagging system.
- SEO-friendly slugs for taxonomy pages.

---

## 6. Dashboard
**Features**:
- Analytics overview (Views, Top Posts).
- Quick action shortcuts.
- System health monitoring.

---

## 7. Notifications
**Features**:
- Email notifications (Mailgun/SES).
- Real-time browser notifications (Pusher/Reverb).
- Notification preferences per user.

---

## 8. SEO Module
**Features**:
- Meta tag management per post.
- Automatic Sitemap (XML) generation.
- OpenGraph & Twitter Card support.
- Canonical URL enforcement.

---

## 9. Security Module
**Features**:
- Rate limiting on sensitive routes.
- SQL injection & XSS protection (Laravel defaults).
- Activity logging for administrative actions.

---

## 10. API Module
**Features**:
- Versioned API (v1).
- JSON:API compliant responses.
- API Key management for external integrations.

---

## 11. Settings Module
**Features**:
- Site configuration (Title, Logo, Social links).
- SMTP/Mail settings.
- Third-party script integration (GTM, Analytics).
