# Development Lifecycle & Deployment Status

This document outlines the software development phases and the current deployment status of the Abriba project.

## 🔄 Deployment Phases

We follow a three-tier environment strategy to ensure stability and code quality.

| Phase | Environment | Purpose | Access |
|---|---|---|---|
| **Development** | Local / Dev Server | Feature building, experimentation, and unit testing. | Developers Only |
| **Testing** | Staging / QA | Integration testing, bug fixing, and user acceptance. | QA & Stakeholders |
| **Production** | Live Server | Final public release. High availability and performance. | Public / All |

---

## 🚀 The "Upload" (Deployment) Workflow

The process of moving code from local development to the live site.

### 1. Development to Testing
- **Action**: Merge `feature-branch` into `staging`.
- **Process**: Automatic trigger via CI/CD (GitHub Actions).
- **Verification**: Run `php artisan test` and manual QA.

### 2. Testing to Production
- **Action**: Create a `Release` or merge `staging` into `main`.
- **Process**: Manual approval required on GitHub.
- **Verification**: Post-deployment smoke tests.

---

## 📊 Project Deployment Status

*Last Updated: 2026-03-10*

| Module | Dev Status | Test Status | Production |
|---|---|---|---|
| **Core Architecture** | ✅ Done | ✅ Verified | 🚀 Deployed |
| **Folder Structure** | ✅ Done | ✅ Verified | 🚀 Deployed |
| **Documentation** | 🏗️ In Progress | 🏗️ In Progress | ❌ Pending |
| **Blog Engine** | 📝 Planned | ❌ N/A | ❌ N/A |
| **User Auth** | 📝 Planned | ❌ N/A | ❌ N/A |

### Legend:
- ✅ **Done**: Feature complete.
- 🏗️ **In Progress**: Active development.
- 📝 **Planned**: On the roadmap.
- 🚀 **Deployed**: Live on production.
- ❌ **Pending**: Not yet started or deployed.
