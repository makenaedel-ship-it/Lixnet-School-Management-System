# Lixnet SMS - Project Structure Overview

This document provides a comprehensive overview of the project structure for the Lixnet School Management System, designed to align with the System Requirements Specification (SRS) v2.0.

## 📁 Root Directory Structure

```
Lixnet-School-Management-System/
├── 📁 .github/                     # GitHub configuration and templates
│   ├── 📁 ISSUE_TEMPLATE/          # Issue templates for bugs and features
│   ├── 📁 PULL_REQUEST_TEMPLATE/   # PR templates and checklists
│   └── 📁 workflows/               # CI/CD GitHub Actions (to be added)
├── 📁 frontend/                    # React TypeScript frontend application
├── 📁 backend/                     # Laravel PHP backend API
├── 📁 docs/                        # Comprehensive project documentation
├── 📁 docker/                      # Docker configuration files
├── 📁 scripts/                     # Build, deployment, and utility scripts
├── 📁 tests/                       # Integration and E2E tests
├── 📄 docker-compose.yml          # Development environment orchestration
├── 📄 .gitignore                  # Git ignore patterns
├── 📄 README.md                   # Main project documentation
├── 📄 CONTRIBUTING.md             # Contribution guidelines
├── 📄 LICENSE                     # Project license
└── 📄 PROJECT_STRUCTURE.md        # This file
```

## 🎨 Frontend Structure (`/frontend/`)

The React TypeScript frontend follows modern best practices and component-based architecture:

```
frontend/
├── 📁 public/                      # Static public assets
│   ├── 📄 index.html              # Main HTML template
│   ├── 📄 favicon.ico             # Application favicon
│   └── 📄 manifest.json           # PWA manifest
├── 📁 src/                         # Source code
│   ├── 📁 components/             # Reusable UI components
│   │   ├── 📁 common/             # Common components (Button, Modal, etc.)
│   │   ├── 📁 forms/              # Form components
│   │   ├── 📁 layout/             # Layout components (Header, Sidebar)
│   │   └── 📁 charts/             # Chart and visualization components
│   ├── 📁 pages/                  # Page components (route components)
│   │   ├── 📁 auth/               # Authentication pages
│   │   ├── 📁 dashboard/          # Dashboard pages
│   │   ├── 📁 students/           # Student management pages
│   │   ├── 📁 staff/              # Staff management pages
│   │   ├── 📁 attendance/         # Attendance pages
│   │   ├── 📁 exams/              # Exam management pages
│   │   ├── 📁 finance/            # Finance and fees pages
│   │   └── 📁 reports/            # Reports and analytics pages
│   ├── 📁 hooks/                  # Custom React hooks
│   │   ├── 📄 useAuth.ts          # Authentication hook
│   │   ├── 📄 useApi.ts           # API interaction hook
│   │   └── 📄 useLocalStorage.ts  # Local storage hook
│   ├── 📁 services/               # API service functions
│   │   ├── 📄 api.ts              # Base API configuration
│   │   ├── 📄 authService.ts      # Authentication services
│   │   ├── 📄 studentService.ts   # Student-related API calls
│   │   ├── 📄 attendanceService.ts # Attendance API calls
│   │   └── 📄 financeService.ts   # Finance API calls
│   ├── 📁 utils/                  # Utility functions
│   │   ├── 📄 constants.ts        # Application constants
│   │   ├── 📄 helpers.ts          # Helper functions
│   │   ├── 📄 validators.ts       # Form validation utilities
│   │   └── 📄 formatters.ts       # Data formatting utilities
│   ├── 📁 types/                  # TypeScript type definitions
│   │   ├── 📄 User.ts             # User-related types
│   │   ├── 📄 Student.ts          # Student-related types
│   │   ├── 📄 Attendance.ts       # Attendance types
│   │   └── 📄 api.ts              # API response types
│   ├── 📁 assets/                 # Static assets
│   │   ├── 📁 images/             # Image files
│   │   ├── 📁 icons/              # Icon files
│   │   └── 📁 fonts/              # Custom fonts
│   ├── 📁 styles/                 # Styling files
│   │   ├── 📄 globals.css         # Global styles
│   │   ├── 📄 variables.css       # CSS variables
│   │   └── 📄 components.css      # Component-specific styles
│   ├── 📄 App.tsx                 # Main application component
│   ├── 📄 index.tsx               # Application entry point
│   └── 📄 reportWebVitals.ts      # Performance monitoring
├── 📁 tests/                      # Frontend tests
│   ├── 📁 components/             # Component tests
│   ├── 📁 pages/                  # Page tests
│   ├── 📁 services/               # Service tests
│   └── 📁 utils/                  # Utility tests
├── 📄 package.json                # Dependencies and scripts
├── 📄 tsconfig.json               # TypeScript configuration
├── 📄 .env.example                # Environment variables template
└── 📄 Dockerfile.dev              # Development Docker configuration
```

## ⚙️ Backend Structure (`/backend/`)

The Laravel PHP backend follows clean architecture principles and modular design:

```
backend/
├── 📁 app/                         # Application source code
│   ├── 📁 Http/                   # HTTP layer
│   │   ├── 📁 Controllers/        # API controllers
│   │   │   ├── 📁 Auth/           # Authentication controllers
│   │   │   ├── 📁 Student/        # Student management controllers
│   │   │   ├── 📁 Staff/          # Staff management controllers
│   │   │   ├── 📁 Attendance/     # Attendance controllers
│   │   │   ├── 📁 Exam/           # Exam management controllers
│   │   │   ├── 📁 Finance/        # Finance controllers
│   │   │   └── 📁 Report/         # Reporting controllers
│   │   ├── 📁 Middleware/         # Custom middleware
│   │   │   ├── 📄 RoleMiddleware.php # Role-based access control
│   │   │   ├── 📄 ApiKeyMiddleware.php # API key validation
│   │   │   └── 📄 AuditMiddleware.php # Audit logging
│   │   ├── 📁 Requests/           # Form request validation
│   │   │   ├── 📁 Auth/           # Authentication requests
│   │   │   ├── 📁 Student/        # Student validation requests
│   │   │   └── 📁 Finance/        # Finance validation requests
│   │   └── 📁 Resources/          # API response resources
│   ├── 📁 Models/                 # Eloquent models
│   │   ├── 📄 User.php            # User model
│   │   ├── 📄 Student.php         # Student model
│   │   ├── 📄 Staff.php           # Staff model
│   │   ├── 📄 Attendance.php      # Attendance model
│   │   ├── 📄 Exam.php            # Exam model
│   │   ├── 📄 Grade.php           # Grade model
│   │   ├── 📄 Invoice.php         # Invoice model
│   │   └── 📄 Payment.php         # Payment model
│   ├── 📁 Services/               # Business logic services
│   │   ├── 📄 AuthService.php     # Authentication business logic
│   │   ├── 📄 StudentService.php  # Student management logic
│   │   ├── 📄 AttendanceService.php # Attendance logic
│   │   ├── 📄 ExamService.php     # Exam management logic
│   │   ├── 📄 FinanceService.php  # Finance and payment logic
│   │   ├── 📄 NotificationService.php # Notification logic
│   │   └── 📄 ReportService.php   # Report generation logic
│   ├── 📁 Repositories/           # Data access layer
│   │   ├── 📄 UserRepository.php  # User data access
│   │   ├── 📄 StudentRepository.php # Student data access
│   │   └── 📄 AttendanceRepository.php # Attendance data access
│   ├── 📁 Jobs/                   # Background jobs
│   │   ├── 📄 SendNotification.php # Notification job
│   │   ├── 📄 GenerateReport.php  # Report generation job
│   │   └── 📄 ProcessPayment.php  # Payment processing job
│   ├── 📁 Events/                 # Application events
│   ├── 📁 Listeners/              # Event listeners
│   ├── 📁 Mail/                   # Email templates
│   ├── 📁 Notifications/          # Notification classes
│   └── 📁 Exceptions/             # Custom exceptions
├── 📁 database/                   # Database related files
│   ├── 📁 migrations/             # Database migrations
│   │   ├── 📄 2024_01_01_000000_create_users_table.php
│   │   ├── 📄 2024_01_02_000000_create_students_table.php
│   │   ├── 📄 2024_01_03_000000_create_staff_table.php
│   │   ├── 📄 2024_01_04_000000_create_attendance_table.php
│   │   ├── 📄 2024_01_05_000000_create_exams_table.php
│   │   ├── 📄 2024_01_06_000000_create_grades_table.php
│   │   ├── 📄 2024_01_07_000000_create_invoices_table.php
│   │   └── 📄 2024_01_08_000000_create_payments_table.php
│   ├── 📁 seeders/                # Database seeders
│   │   ├── 📄 DatabaseSeeder.php  # Main seeder
│   │   ├── 📄 UserSeeder.php      # User data seeder
│   │   ├── 📄 StudentSeeder.php   # Student data seeder
│   │   └── 📄 RoleSeeder.php      # Role and permission seeder
│   └── 📁 factories/              # Model factories for testing
├── 📁 routes/                     # Route definitions
│   ├── 📄 api.php                 # API routes
│   ├── 📄 web.php                 # Web routes
│   └── 📄 channels.php            # Broadcast channels
├── 📁 tests/                      # Backend tests
│   ├── 📁 Feature/                # Feature tests
│   │   ├── 📄 AuthTest.php        # Authentication tests
│   │   ├── 📄 StudentTest.php     # Student management tests
│   │   ├── 📄 AttendanceTest.php  # Attendance tests
│   │   └── 📄 FinanceTest.php     # Finance tests
│   ├── 📁 Unit/                   # Unit tests
│   │   ├── 📄 UserModelTest.php   # User model tests
│   │   └── 📄 ServiceTest.php     # Service tests
│   └── 📄 TestCase.php            # Base test case
├── 📁 storage/                    # Storage directories
│   ├── 📁 app/                    # Application storage
│   ├── 📁 framework/              # Framework storage
│   └── 📁 logs/                   # Application logs
├── 📁 config/                     # Configuration files
├── 📁 resources/                  # Resources
│   ├── 📁 views/                  # Blade templates
│   └── 📁 lang/                   # Language files
├── 📄 composer.json               # PHP dependencies
├── 📄 .env.example                # Environment template
├── 📄 artisan                     # Artisan command line tool
└── 📄 Dockerfile.dev              # Development Docker configuration
```

## 📚 Documentation Structure (`/docs/`)

Comprehensive documentation organized by audience and purpose:

```
docs/
├── 📄 README.md                   # Documentation overview
├── 📁 api/                        # API documentation
│   ├── 📄 README.md               # API overview
│   ├── 📄 authentication.md      # Auth endpoints
│   ├── 📄 students.md             # Student endpoints
│   ├── 📄 attendance.md           # Attendance endpoints
│   ├── 📄 finance.md              # Finance endpoints
│   └── 📄 openapi.yaml            # OpenAPI specification
├── 📁 architecture/               # System architecture
│   ├── 📄 README.md               # Architecture overview
│   ├── 📄 database-schema.md      # Database design
│   ├── 📄 api-design.md           # API design principles
│   ├── 📄 security.md             # Security architecture
│   └── 📄 deployment-architecture.md # Deployment design
├── 📁 deployment/                 # Deployment guides
│   ├── 📄 README.md               # Deployment overview
│   ├── 📄 docker.md               # Docker deployment
│   ├── 📄 production.md           # Production deployment
│   ├── 📄 staging.md              # Staging environment
│   ├── 📄 monitoring.md           # Monitoring setup
│   └── 📄 backup.md               # Backup procedures
├── 📁 development/                # Development guides
│   ├── 📄 README.md               # Development setup
│   ├── 📄 coding-standards.md     # Coding guidelines
│   ├── 📄 testing.md              # Testing guidelines
│   ├── 📄 debugging.md            # Debugging guide
│   └── 📄 tools.md                # Development tools
└── 📁 user-guides/                # End-user documentation
    ├── 📄 admin-guide.md          # Administrator manual
    ├── 📄 teacher-guide.md        # Teacher manual
    ├── 📄 parent-guide.md         # Parent manual
    ├── 📄 student-guide.md        # Student manual
    └── 📄 faq.md                  # Frequently asked questions
```

## 🐳 Docker Configuration (`/docker/`)

Docker setup for different environments:

```
docker/
├── 📁 nginx/                      # Nginx configuration
│   ├── 📄 nginx.conf              # Main nginx config
│   └── 📁 sites/                  # Site configurations
├── 📁 php/                        # PHP configuration
│   ├── 📄 Dockerfile              # PHP Docker image
│   └── 📄 php.ini                 # PHP configuration
├── 📁 mysql/                      # MySQL configuration
│   ├── 📄 my.cnf                  # MySQL configuration
│   └── 📁 init/                   # Initialization scripts
└── 📁 ssl/                        # SSL certificates
```

## 🔧 Scripts Directory (`/scripts/`)

Automation and utility scripts:

```
scripts/
├── 📄 setup.sh                   # Initial project setup
├── 📄 deploy.sh                  # Deployment script
├── 📄 backup.sh                  # Database backup script
├── 📄 test.sh                    # Run all tests
├── 📄 build.sh                   # Build for production
└── 📄 migrate.sh                 # Database migration script
```

## 🧪 Testing Structure (`/tests/`)

Integration and end-to-end tests:

```
tests/
├── 📁 e2e/                       # End-to-end tests
│   ├── 📄 auth.spec.js           # Authentication E2E tests
│   ├── 📄 student-management.spec.js # Student management E2E
│   └── 📄 attendance.spec.js     # Attendance E2E tests
├── 📁 integration/               # Integration tests
│   ├── 📄 api-integration.test.js # API integration tests
│   └── 📄 database-integration.test.js # Database tests
└── 📁 performance/               # Performance tests
    ├── 📄 load-test.js           # Load testing
    └── 📄 stress-test.js         # Stress testing
```

## 🔄 Branching Strategy

The repository follows GitFlow branching model:

- **`main`** - Production-ready code
- **`develop`** - Integration branch for features
- **`feature/*`** - Feature development branches
- **`bugfix/*`** - Bug fix branches
- **`hotfix/*`** - Critical production fixes
- **`release/*`** - Release preparation branches

## 📋 Module Mapping to SRS Requirements

This structure directly supports the SRS v2.0 modules:

| SRS Module | Frontend Location | Backend Location |
|------------|------------------|------------------|
| Authentication | `/pages/auth/` | `/Controllers/Auth/` |
| Student Records | `/pages/students/` | `/Controllers/Student/` |
| Attendance | `/pages/attendance/` | `/Controllers/Attendance/` |
| Staff Management | `/pages/staff/` | `/Controllers/Staff/` |
| Courses | `/pages/courses/` | `/Controllers/Course/` |
| Exams & Grading | `/pages/exams/` | `/Controllers/Exam/` |
| Finance & Fees | `/pages/finance/` | `/Controllers/Finance/` |
| Communication | `/components/notifications/` | `/Services/NotificationService.php` |
| Analytics | `/pages/reports/` | `/Controllers/Report/` |
| Library | `/pages/library/` | `/Controllers/Library/` |

## 🎯 Development Workflow Integration

This structure supports the 12-week development roadmap:

1. **Weeks 1-2**: Setup and Authentication modules
2. **Weeks 3-4**: Student Records and Attendance
3. **Weeks 5-6**: Staff Management and Courses
4. **Weeks 7-8**: Exams and Finance modules
5. **Weeks 9-10**: Communication and Analytics
6. **Weeks 11-12**: Library, Testing, and Deployment

Each module can be developed independently while maintaining integration through shared services and components.

---

This structure ensures scalability, maintainability, and alignment with modern development practices while supporting the specific requirements of the Lixnet School Management System.
