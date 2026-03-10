# Abriba API Documentation (v1)

Abriba provides a robust RESTful API for headless integrations and mobile applications.

## Authentication
All API requests require a Bearer Token obtained via the login endpoint.
- **Header**: `Authorization: Bearer <your_token>`
- **Accept**: `application/json`

---

## Endpoints

### 1. Authentication
| Method | Endpoint | Description |
|---|---|---|
| POST | `/api/v1/login` | Authenticate user and return token |
| POST | `/api/v1/register` | Register new subscriber |
| POST | `/api/v1/logout` | Revoke current token |

### 2. Blog Posts
| Method | Endpoint | Description |
|---|---|---|
| GET | `/api/v1/posts` | List all published posts |
| GET | `/api/v1/posts/{slug}` | Get individual post details |
| POST | `/api/v1/admin/posts` | Create new post (Admin/Author only) |
| PUT | `/api/v1/admin/posts/{id}` | Update existing post |

### 3. Comments
| Method | Endpoint | Description |
|---|---|---|
| GET | `/api/v1/posts/{id}/comments` | Fetch comments for a post |
| POST | `/api/v1/comments` | Submit a new comment |

### 4. Categories & Media
| Method | Endpoint | Description |
|---|---|---|
| GET | `/api/v1/categories` | List all categories |
| POST | `/api/v1/media/upload` | Upload image for content |

---

## Response Format
Success Responses:
```json
{
  "success": true,
  "data": { ... },
  "message": "Resource retrieved successfully"
}
```

Error Responses:
```json
{
  "success": false,
  "error": "Unauthorized",
  "code": 401
}
```
