# Contributing to Lixnet SMS

## Workflow
- Work happens in weekly sprints (Agile-Scrum).
- Use **feature branches** off `develop`.  
  - `feature/<module-name>` → new features  
  - `bugfix/<issue-id>` → bug fixes  
- Never commit directly to `main`.

## Pull Requests
- Open PRs into `develop`.  
- Require:
  - Passing CI checks (tests, lint, build).  
  - At least 1 reviewer approval.  
  - Linked Issue or task reference.  
- Use the PR template checklist.  
- Squash commits when merging.

## Coding Standards
- **PHP (Laravel):** PSR-12.  
- **JavaScript (React):** ESLint + Prettier.  
- Write clear commit messages (Conventional Commits preferred).  
  - `feat: add attendance module`  
  - `fix: resolve M-Pesa callback bug`

## Testing
- All features must include unit tests.  
- Run tests before PR:  
  ```bash
  php artisan test
  npm test
