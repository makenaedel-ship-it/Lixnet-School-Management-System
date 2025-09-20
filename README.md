# Lixnet School Management System

[![Build Status](https://github.com/frostlab63/Lixnet-School-Management-System/workflows/CI/badge.svg)](https://github.com/frostlab63/Lixnet-School-Management-System/actions)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Version](https://img.shields.io/badge/version-2.0.0-blue.svg)](https://github.com/frostlab63/Lixnet-School-Management-System)

## 🎯 Overview

Lixnet School Management System (SMS) is a comprehensive, modular, and scalable web-based application designed to automate and streamline the administrative and academic processes of educational institutions. Built with modern technologies and following industry best practices.

### ✨ Key Features

- **👥 User Management**: Role-based authentication with RBAC, MFA support
- **📚 Student Information System**: Complete student lifecycle management
- **📊 Attendance Tracking**: Real-time attendance with automated notifications
- **👨‍🏫 Staff Management**: Teacher profiles, assignments, and scheduling
- **📅 Course Management**: Timetables, subjects, and resource allocation
- **📝 Exams & Grading**: Comprehensive examination and assessment system
- **💰 Finance & Fees**: M-Pesa integration for seamless payments
- **📢 Communication**: SMS/Email notifications and announcements
- **📈 Analytics & Reporting**: Advanced dashboards and custom reports
- **📖 Library Management**: Book inventory and circulation system

## 🏗️ Architecture

### Technology Stack

| Component | Technology | Version |
|-----------|------------|---------|
| **Frontend** | React with TypeScript | 18.x |
| **Backend** | Laravel (PHP) | 10.x |
| **Database** | MySQL/MariaDB | 8.x |
| **Containerization** | Docker & Docker Compose | Latest |
| **CI/CD** | GitHub Actions | - |
| **Payment Gateway** | M-Pesa API | Latest |

### System Architecture

```
┌─────────────────┐    ┌─────────────────┐    ┌─────────────────┐
│   React SPA     │    │   Laravel API   │    │   MySQL DB      │
│   (Frontend)    │◄──►│   (Backend)     │◄──►│   (Database)    │
└─────────────────┘    └─────────────────┘    └─────────────────┘
         │                       │                       │
         │                       │                       │
         ▼                       ▼                       ▼
┌─────────────────┐    ┌─────────────────┐    ┌─────────────────┐
│   CDN/Nginx     │    │   Load Balancer │    │   Redis Cache   │
│   (Static)      │    │   (API Gateway) │    │   (Sessions)    │
└─────────────────┘    └─────────────────┘    └─────────────────┘
```

## 🚀 Quick Start

### Prerequisites

- **Node.js** >= 18.x
- **PHP** >= 8.1
- **Composer** >= 2.x
- **MySQL** >= 8.x
- **Docker** & **Docker Compose** (optional)

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/frostlab63/Lixnet-School-Management-System.git
   cd Lixnet-School-Management-System
   ```

2. **Setup Backend**
   ```bash
   cd backend
   composer install
   cp .env.example .env
   php artisan key:generate
   php artisan migrate --seed
   php artisan serve
   ```

3. **Setup Frontend**
   ```bash
   cd frontend
   npm install
   npm start
   ```

4. **Using Docker (Recommended)**
   ```bash
   docker-compose up --build
   ```

### Environment Configuration

Create `.env` files in both `frontend` and `backend` directories:

**Backend (.env)**
```env
APP_NAME="Lixnet SMS"
APP_ENV=local
APP_KEY=base64:your-app-key
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lixnet_sms
DB_USERNAME=root
DB_PASSWORD=

MPESA_CONSUMER_KEY=your-mpesa-key
MPESA_CONSUMER_SECRET=your-mpesa-secret
```

**Frontend (.env)**
```env
REACT_APP_API_URL=http://localhost:8000/api
REACT_APP_APP_NAME="Lixnet SMS"
```

## 📁 Project Structure

```
Lixnet-School-Management-System/
├── 📁 frontend/                 # React frontend application
│   ├── 📁 src/
│   │   ├── 📁 components/       # Reusable UI components
│   │   ├── 📁 pages/           # Page components
│   │   ├── 📁 hooks/           # Custom React hooks
│   │   ├── 📁 services/        # API service functions
│   │   ├── 📁 utils/           # Utility functions
│   │   ├── 📁 types/           # TypeScript type definitions
│   │   └── 📁 assets/          # Static assets
│   └── 📁 public/              # Public assets
├── 📁 backend/                  # Laravel backend API
│   ├── 📁 app/
│   │   ├── 📁 Http/            # Controllers, Middleware, Requests
│   │   ├── 📁 Models/          # Eloquent models
│   │   ├── 📁 Services/        # Business logic services
│   │   └── 📁 Repositories/    # Data access layer
│   ├── 📁 database/            # Migrations, seeders, factories
│   └── 📁 routes/              # API routes
├── 📁 docs/                     # Project documentation
│   ├── 📁 api/                 # API documentation
│   ├── 📁 architecture/        # System architecture docs
│   ├── 📁 deployment/          # Deployment guides
│   └── 📁 user-guides/         # User manuals
├── 📁 docker/                   # Docker configuration
├── 📁 scripts/                  # Build and deployment scripts
├── 📁 tests/                    # Integration and E2E tests
└── 📁 .github/                  # GitHub workflows and templates
```

## 👥 Team & Roles

| Role | Responsibility | Team Member |
|------|---------------|-------------|
| **Team Lead** | Project coordination, architecture, DevOps | Josh |
| **Frontend Owner** | React UI, components, user experience | Victoria |
| **Backend Owner** | Laravel APIs, business logic, data models | Edel |
| **Full-Stack Developer** | Finance module, M-Pesa integration | Fahat |
| **Full-Stack Developer** | Authentication, integrations, database | Samuel |

## 🔄 Development Workflow

### Branching Strategy

- **`main`** - Production-ready code
- **`develop`** - Integration branch for features
- **`feature/*`** - Feature development branches
- **`bugfix/*`** - Bug fix branches
- **`hotfix/*`** - Critical production fixes

### Sprint Workflow

1. **Sprint Planning** (Monday)
2. **Daily Standups** (Daily)
3. **Development** (Tuesday-Thursday)
4. **Code Review & Testing** (Friday)
5. **Sprint Demo** (Friday)
6. **Retrospective** (Friday)

### Pull Request Process

1. Create feature branch from `develop`
2. Implement feature with tests
3. Open PR with description and checklist
4. Code review by team members
5. CI/CD checks must pass
6. Merge to `develop` after approval

## 🧪 Testing

### Running Tests

**Backend Tests**
```bash
cd backend
php artisan test
php artisan test --coverage
```

**Frontend Tests**
```bash
cd frontend
npm test
npm run test:coverage
```

**E2E Tests**
```bash
npm run test:e2e
```

### Testing Strategy

- **Unit Tests**: Individual components and functions
- **Integration Tests**: API endpoints and workflows
- **E2E Tests**: Complete user journeys
- **Performance Tests**: Load and stress testing

## 🚀 Deployment

### Staging Environment
```bash
docker-compose -f docker-compose.staging.yml up -d
```

### Production Deployment
```bash
./scripts/deploy-production.sh
```

### Environment URLs
- **Development**: http://localhost:3000
- **Staging**: https://staging.lixnet.com
- **Production**: https://app.lixnet.com

## 📚 Documentation

- [📖 API Documentation](docs/api/README.md)
- [🏗️ Architecture Guide](docs/architecture/README.md)
- [🚀 Deployment Guide](docs/deployment/README.md)
- [👤 User Guides](docs/user-guides/README.md)
- [💻 Development Setup](docs/development/README.md)

## 🤝 Contributing

We welcome contributions! Please read our [Contributing Guidelines](CONTRIBUTING.md) for details on our code of conduct and the process for submitting pull requests.

### Development Setup

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🆘 Support

- **Documentation**: [docs/](docs/)
- **Issues**: [GitHub Issues](https://github.com/frostlab63/Lixnet-School-Management-System/issues)
- **Discussions**: [GitHub Discussions](https://github.com/frostlab63/Lixnet-School-Management-System/discussions)

## 🗺️ Roadmap

### Phase 1 (Weeks 1-4) - Core Foundation
- [x] Project setup and architecture
- [x] Authentication & user management
- [x] Student information system
- [x] Basic attendance tracking

### Phase 2 (Weeks 5-8) - Academic Features
- [ ] Staff management
- [ ] Course & timetable management
- [ ] Exams & grading system
- [ ] Finance & fee management

### Phase 3 (Weeks 9-12) - Advanced Features
- [ ] Communication system
- [ ] Parent/student portals
- [ ] Analytics & reporting
- [ ] Library management

## 📊 Project Status

![Progress](https://progress-bar.dev/25/?title=Overall%20Progress)

- **Authentication Module**: ✅ Complete
- **Student Records**: 🔄 In Progress
- **Attendance**: ⏳ Planned
- **Finance**: ⏳ Planned

---

**Built with ❤️ by the Lixnet Team**
