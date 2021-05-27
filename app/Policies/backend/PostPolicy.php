<?php

namespace App\Policies\backend;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @throws \InvalidArgumentException
     *
     * @return mixed
     */
    public function viewAny(User $user): array|bool
    {
        return $user->ability(roles: 'admin', permissions: 'manage_posts,show_posts');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @throws \InvalidArgumentException
     *
     * @return mixed
     */
    public function view(User $user, Post $post): array|bool
    {
        return $user->ability(roles: 'admin', permissions: 'display_posts');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @throws \InvalidArgumentException
     *
     * @return mixed
     */
    public function create(User $user): array|bool
    {
        return $user->ability(roles: 'admin', permissions: 'create_posts');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @throws \InvalidArgumentException
     *
     * @return mixed
     */
    public function update(User $user, Post $post): array|bool
    {
        return $user->ability(roles: 'admin', permissions: 'update_posts');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @throws \InvalidArgumentException
     *
     * @return mixed
     */
    public function delete(User $user, Post $post): array|bool
    {
        return $user->ability(roles: 'admin', permissions: 'delete_posts');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        //
    }
}
