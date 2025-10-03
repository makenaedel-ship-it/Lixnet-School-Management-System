<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Teacher;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeacherPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->hasRole('admin') || $user->hasRole('teacher');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Teacher $teacher)
    {
        return $user->hasRole('admin') || ($user->hasRole('teacher') && $user->id === $teacher->user_id);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Teacher $teacher)
    {
        return $user->hasRole('admin') || ($user->hasRole('teacher') && $user->id === $teacher->user_id);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Teacher $teacher)
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Teacher $teacher)
    {
        return $user->hasRole('admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Teacher $teacher)
    {
        return $user->hasRole('admin');
    }
}

