# Abriba Database Schema

The database follows a normalized relational structure optimized for fast querying and content retrieval.

## Table: users
| Column | Type | Nullable | Description |
|---|---|---|---|
| id | bigint | No | Primary Key |
| name | varchar | No | User full name |
| email | varchar | No | Unique email address |
| password | varchar | No | Hashed password |
| role | enum | No | admin, editor, author, subscriber |
| timestamps | - | - | created_at, updated_at |

## Table: posts
| Column | Type | Nullable | Description |
|---|---|---|---|
| id | bigint | No | Primary Key |
| author_id | bigint | No | FK to users.id |
| category_id | bigint | No | FK to categories.id |
| title | varchar | No | Post title |
| slug | varchar | No | Unique URL slug |
| excerpt | text | Yes | Short summary |
| content | longtext | No | Main body |
| status | enum | No | draft, published, scheduled |
| published_at | timestamp | Yes | Public release date |

## Table: comments
| Column | Type | Nullable | Description |
|---|---|---|---|
| id | bigint | No | Primary Key |
| post_id | bigint | No | FK to posts.id |
| user_id | bigint | Yes | Null for guest comments |
| parent_id | bigint | Yes | For nested comments |
| body | text | No | Comment text |
| is_approved | boolean | No | Moderation status |

## Table: categories
| Column | Type | Nullable | Description |
|---|---|---|---|
| id | bigint | No | Primary Key |
| parent_id | bigint | Yes | For sub-categories |
| name | varchar | No | Category name |
| slug | varchar | No | Unique URL slug |

## Table: media
| Column | Type | Nullable | Description |
|---|---|---|---|
| id | bigint | No | Primary Key |
| filename | varchar | No | Original filename |
| path | varchar | No | Storage path |
| mime_type | varchar | No | file type |
| size | integer | No | Bytes |

## Table: settings
| Column | Type | Nullable | Description |
|---|---|---|---|
| key | varchar | No | Unique configuration key |
| value | text | Yes | JSON or string value |
