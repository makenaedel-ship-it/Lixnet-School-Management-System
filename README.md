# Lixnet School Management System

## Overview
A modular, scalable web-based system for schools.  
Features include: user management, student/staff records, courses & timetables, attendance, exams, fees (M-Pesa), communication, optional library, and reporting.

- **Frontend:** React  
- **Backend:** Laravel (PHP)  
- **Database:** MySQL/MariaDB  
- **Deployment:** Docker  
- **CI/CD:** GitHub Actions  

## Workflow
- Agile-Scrum (weekly sprints, daily stand-ups)  
- Branching: `main` (stable), `develop` (active), `feature/*`, `bugfix/*`  
- Pull Requests: reviewed + CI checks before merge  

## Team
- **Team Lead** — coordination, planning, architecture, DevOps alignment  
- **Dev 1** — Frontend (React)  
- **Dev 2** — Backend (Laravel)  
- **Dev 3** — Database & Integrations  
- **Dev 4** — QA & Testing  
- **Dev 5** — Docs & CI/CD  

## Setup
```bash
git clone https://github.com/<org>/gitkart.git
cd frontend && npm install
cd backend && composer install
cp .env.example .env   # configure DB + API keys
php artisan migrate --seed
docker-compose up --build
