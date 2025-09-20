# Contributing to Lixnet School Management System

Thank you for your interest in contributing to the Lixnet School Management System! This document provides guidelines and information for contributors.

## 📋 Table of Contents

- [Code of Conduct](#code-of-conduct)
- [Development Workflow](#development-workflow)
- [Branching Strategy](#branching-strategy)
- [Pull Request Process](#pull-request-process)
- [Coding Standards](#coding-standards)
- [Testing Requirements](#testing-requirements)
- [Documentation](#documentation)
- [Issue Reporting](#issue-reporting)

## 🤝 Code of Conduct

We are committed to providing a welcoming and inclusive environment for all contributors. Please be respectful and professional in all interactions.

### Our Standards

- Use welcoming and inclusive language
- Be respectful of differing viewpoints and experiences
- Gracefully accept constructive criticism
- Focus on what is best for the community
- Show empathy towards other community members

## 🔄 Development Workflow

### Sprint Methodology

We follow **Agile-Scrum** methodology with 1-week sprints:

- **Monday**: Sprint planning and task assignment
- **Tuesday-Thursday**: Development and implementation
- **Friday**: Code review, testing, and sprint demo
- **Daily**: Stand-up meetings (15 minutes)

### Team Roles

| Role | Responsibilities | Team Member |
|------|-----------------|-------------|
| **Team Lead** | Coordination, architecture, DevOps | Josh |
| **Frontend Owner** | React components, UI/UX | Victoria |
| **Backend Owner** | Laravel APIs, business logic | Edel |
| **Full-Stack (Finance)** | Finance module, M-Pesa integration | Fahat |
| **Full-Stack (Auth)** | Authentication, integrations | Samuel |

## 🌿 Branching Strategy

### Branch Types

```
main
├── develop
│   ├── feature/auth-module
│   ├── feature/student-records
│   ├── feature/attendance-system
│   ├── bugfix/login-validation
│   └── hotfix/critical-security-fix
```

### Branch Naming Convention

- **Feature branches**: `feature/<module-name>` or `feature/<ticket-id>`
- **Bug fixes**: `bugfix/<issue-id>` or `bugfix/<description>`
- **Hotfixes**: `hotfix/<critical-issue>`
- **Release branches**: `release/<version>`

### Branch Rules

- **Never commit directly to `main`**
- All features must branch from `develop`
- Hotfixes can branch from `main` for critical issues
- Delete feature branches after successful merge

## 🔀 Pull Request Process

### Before Creating a PR

1. **Sync with develop**
   ```bash
   git checkout develop
   git pull origin develop
   git checkout your-feature-branch
   git rebase develop
   ```

2. **Run tests locally**
   ```bash
   # Backend tests
   cd backend && php artisan test
   
   # Frontend tests
   cd frontend && npm test
   
   # Linting
   npm run lint
   ```

3. **Update documentation** if needed

### PR Requirements

- [ ] **Descriptive title** following conventional commits
- [ ] **Detailed description** of changes
- [ ] **Linked issue** or task reference
- [ ] **Screenshots** for UI changes
- [ ] **Tests added/updated** for new functionality
- [ ] **Documentation updated** if applicable
- [ ] **No merge conflicts** with develop branch

### PR Template Checklist

```markdown
## Description
Brief description of changes made.

## Type of Change
- [ ] Bug fix (non-breaking change which fixes an issue)
- [ ] New feature (non-breaking change which adds functionality)
- [ ] Breaking change (fix or feature that would cause existing functionality to not work as expected)
- [ ] Documentation update

## Testing
- [ ] Unit tests pass
- [ ] Integration tests pass
- [ ] Manual testing completed
- [ ] Cross-browser testing (if applicable)

## Screenshots (if applicable)
Add screenshots here

## Checklist
- [ ] My code follows the style guidelines
- [ ] I have performed a self-review of my code
- [ ] I have commented my code, particularly in hard-to-understand areas
- [ ] I have made corresponding changes to the documentation
- [ ] My changes generate no new warnings
- [ ] I have added tests that prove my fix is effective or that my feature works
```

### Review Process

1. **Automated checks** must pass (CI/CD)
2. **At least 1 reviewer approval** required
3. **Team lead approval** for architectural changes
4. **QA testing** for major features
5. **Squash and merge** to maintain clean history

## 💻 Coding Standards

### PHP (Laravel Backend)

- Follow **PSR-12** coding standard
- Use **meaningful variable names**
- Add **type hints** for all parameters and return types
- Write **PHPDoc comments** for all methods

```php
<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateStudentRequest;
use App\Services\StudentService;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    /**
     * Create a new student record.
     *
     * @param CreateStudentRequest $request
     * @param StudentService $studentService
     * @return JsonResponse
     */
    public function store(CreateStudentRequest $request, StudentService $studentService): JsonResponse
    {
        $student = $studentService->createStudent($request->validated());
        
        return response()->json([
            'message' => 'Student created successfully',
            'data' => $student
        ], 201);
    }
}
```

### JavaScript/TypeScript (React Frontend)

- Use **TypeScript** for all new code
- Follow **ESLint** and **Prettier** configurations
- Use **functional components** with hooks
- Implement **proper error handling**

```typescript
import React, { useState, useEffect } from 'react';
import { Student } from '../types/Student';
import { studentService } from '../services/studentService';

interface StudentListProps {
  classId: string;
}

export const StudentList: React.FC<StudentListProps> = ({ classId }) => {
  const [students, setStudents] = useState<Student[]>([]);
  const [loading, setLoading] = useState<boolean>(true);
  const [error, setError] = useState<string | null>(null);

  useEffect(() => {
    const fetchStudents = async () => {
      try {
        const data = await studentService.getStudentsByClass(classId);
        setStudents(data);
      } catch (err) {
        setError('Failed to fetch students');
      } finally {
        setLoading(false);
      }
    };

    fetchStudents();
  }, [classId]);

  if (loading) return <div>Loading...</div>;
  if (error) return <div>Error: {error}</div>;

  return (
    <div className="student-list">
      {students.map(student => (
        <div key={student.id} className="student-card">
          {student.name}
        </div>
      ))}
    </div>
  );
};
```

### Commit Message Convention

Use **Conventional Commits** format:

```
<type>[optional scope]: <description>

[optional body]

[optional footer(s)]
```

**Types:**
- `feat`: New feature
- `fix`: Bug fix
- `docs`: Documentation changes
- `style`: Code style changes (formatting, etc.)
- `refactor`: Code refactoring
- `test`: Adding or updating tests
- `chore`: Maintenance tasks

**Examples:**
```
feat(auth): add multi-factor authentication
fix(attendance): resolve date calculation bug
docs(api): update authentication endpoints
test(student): add unit tests for student service
```

## 🧪 Testing Requirements

### Test Coverage Requirements

- **Minimum 80% code coverage** for new features
- **All API endpoints** must have integration tests
- **Critical user flows** must have E2E tests

### Testing Guidelines

#### Backend Testing (PHPUnit)

```php
<?php

namespace Tests\Feature;

use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_student(): void
    {
        $user = User::factory()->create(['role' => 'admin']);
        
        $response = $this->actingAs($user)
            ->postJson('/api/students', [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'class_id' => 1
            ]);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'message',
                'data' => ['id', 'name', 'email']
            ]);

        $this->assertDatabaseHas('students', [
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ]);
    }
}
```

#### Frontend Testing (Jest + React Testing Library)

```typescript
import { render, screen, fireEvent, waitFor } from '@testing-library/react';
import { StudentForm } from '../StudentForm';
import { studentService } from '../../services/studentService';

jest.mock('../../services/studentService');

describe('StudentForm', () => {
  it('should submit form with valid data', async () => {
    const mockCreate = jest.spyOn(studentService, 'createStudent')
      .mockResolvedValue({ id: 1, name: 'John Doe' });

    render(<StudentForm />);

    fireEvent.change(screen.getByLabelText(/name/i), {
      target: { value: 'John Doe' }
    });

    fireEvent.click(screen.getByRole('button', { name: /submit/i }));

    await waitFor(() => {
      expect(mockCreate).toHaveBeenCalledWith({
        name: 'John Doe'
      });
    });
  });
});
```

## 📚 Documentation

### Required Documentation

- **API endpoints** in OpenAPI format
- **Component documentation** with Storybook
- **Database schema** with ER diagrams
- **Deployment guides** for different environments

### Documentation Standards

- Use **clear, concise language**
- Include **code examples** where applicable
- Keep documentation **up-to-date** with code changes
- Use **proper markdown formatting**

## 🐛 Issue Reporting

### Bug Reports

Use the bug report template and include:

- **Clear description** of the issue
- **Steps to reproduce** the problem
- **Expected vs actual behavior**
- **Environment details** (browser, OS, etc.)
- **Screenshots or logs** if applicable

### Feature Requests

Use the feature request template and include:

- **Problem statement** or use case
- **Proposed solution** or approach
- **Alternative solutions** considered
- **Additional context** or mockups

## 🚀 Release Process

### Version Numbering

We follow **Semantic Versioning** (SemVer):

- **MAJOR**: Breaking changes
- **MINOR**: New features (backward compatible)
- **PATCH**: Bug fixes (backward compatible)

### Release Checklist

- [ ] All tests passing
- [ ] Documentation updated
- [ ] CHANGELOG.md updated
- [ ] Version bumped in package.json
- [ ] Release notes prepared
- [ ] Deployment tested in staging

## 📞 Getting Help

- **Slack**: #lixnet-development
- **Email**: dev-team@lixnet.com
- **GitHub Discussions**: For general questions
- **GitHub Issues**: For bug reports and feature requests

---

Thank you for contributing to Lixnet School Management System! 🎉
