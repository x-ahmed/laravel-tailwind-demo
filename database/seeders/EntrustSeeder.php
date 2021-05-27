<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class EntrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin Role
        $adminRole = Role::create([
            'name'          => 'admin',
            'display_name'  => 'Administrator',
            'description'   => 'System Administrator',
            'allowed_route' => 'admin',
        ]);
        // Supervisor Role
        $supervisorRole = Role::create([
            'name'          => 'supervisor',
            'display_name'  => 'Supervisor',
            'description'   => 'System Supervisor',
            'allowed_route' => 'admin',
        ]);
        // End User Role
        $userRole = Role::create([
            'name'          => 'user',
            'display_name'  => 'User',
            'description'   => 'Normal User',
            'allowed_route' => null,
        ]);

        // Main Permission
        $manageMain = Permission::create([
            'name'            => 'main', // permission name.
            'display_name'    => 'Dashboard',
            'description'     => 'Administrator Dashboard',
            'route'           => 'index',
            'module'          => 'index',
            'as'              => 'index',
            'icon'            => 'fas fa-home',
            'parent'          => '0', // has no parent (main list).
            'parent_original' => '0',
            'sidebar_link'    => '1',
            'appear'          => '1',
            'ordering'        => '1',
        ]);
        $manageMain->parent_show = $manageMain->id;
        $manageMain->save();

        // POSTS
        $managePosts = Permission::create([
            'name'            => 'manage_posts',
            'display_name'    => 'Manage Posts',
            // 'display_name'    => 'Posts',
            'route'           => 'posts',
            'module'          => 'posts',
            'as'              => 'posts.index',
            'icon'            => 'fas fa-newspaper',
            'parent'          => '0',
            'parent_original' => '0',
            'appear'          => '1',
            'ordering'        => '5',
        ]);
        $managePosts->parent_show = $managePosts->id;
        $managePosts->save();
        $showPosts = Permission::create([
            'name'            => 'show_posts',
            'display_name'    => 'Show Posts',
            // 'display_name'    => 'Posts',
            'route'           => 'posts',
            'module'          => 'posts',
            'as'              => 'posts.index',
            'icon'            => 'fas fa-newspaper',
            'parent'          => $managePosts->id,
            'parent_show'     => $managePosts->id,
            'parent_original' => $managePosts->id,
            'appear'          => '1',
            'ordering'        => '0',
        ]);
        $createPosts = Permission::create([
            'name'            => 'create_posts',
            'display_name'    => 'Create Post',
            'route'           => 'posts/create',
            'module'          => 'posts',
            'as'              => 'posts.create',
            'icon'            => null,
            'parent'          => $managePosts->id,
            'parent_show'     => $managePosts->id,
            'parent_original' => $managePosts->id,
            'appear'          => '0',
            'ordering'        => '0',
        ]);
        $displayPost = Permission::create([
            'name'            => 'display_posts',
            'display_name'    => 'Show Post',
            'route'           => 'posts/{post}',
            'module'          => 'posts',
            'as'              => 'posts.show',
            'icon'            => null,
            'parent'          => $managePosts->id,
            'parent_show'     => $managePosts->id,
            'parent_original' => $managePosts->id,
            'appear'          => '0',
            'ordering'        => '0',
        ]);
        $updatePosts = Permission::create([
            'name'            => 'update_posts',
            'display_name'    => 'Update Post',
            'route'           => 'posts/{post}/edit',
            'module'          => 'posts',
            'as'              => 'posts.edit',
            'icon'            => null,
            'parent'          => $managePosts->id,
            'parent_show'     => $managePosts->id,
            'parent_original' => $managePosts->id,
            'appear'          => '0',
            'ordering'        => '0',
        ]);
        $destroyPosts = Permission::create([
            'name'            => 'delete_posts',
            'display_name'    => 'Delete Post',
            'route'           => 'posts/{post}',
            'module'          => 'posts',
            'as'              => 'posts.delete',
            'icon'            => null,
            'parent'          => $managePosts->id,
            'parent_show'     => $managePosts->id,
            'parent_original' => $managePosts->id,
            'appear'          => '0',
            'ordering'        => '0',
        ]);

        // POSTS COMMENTS
        $manageComments = Permission::create([
            'name'            => 'manage_post_comments',
            'display_name'    => 'Manage Comments',
            // 'display_name'    => 'Comments',
            'route'           => 'post_comments',
            'module'          => 'post_comments',
            'as'              => 'post_comments.index',
            'icon'            => 'far fa-comment-dots',
            'parent'          => '0',
            'parent_original' => '0',
            'appear'          => '1',
            'ordering'        => '10',
        ]);
        $manageComments->parent_show = $manageComments->id;
        $manageComments->save();
        $showComments = Permission::create([
            'name'            => 'show_post_comments',
            'display_name'    => 'Show Comments',
            // 'display_name'    => 'Comments',
            'route'           => 'post_comments',
            'module'          => 'post_comments',
            'as'              => 'post_comments.index',
            'icon'            => 'far fa-comment-dots',
            'parent'          => $manageComments->id,
            'parent_show'     => $manageComments->id,
            'parent_original' => $manageComments->id,
            'appear'          => '1',
            'ordering'        => '0',
        ]);
        $createComments = Permission::create([
            'name'            => 'create_post_comments',
            'display_name'    => 'Create Comment',
            'route'           => 'post_comments/create',
            'module'          => 'post_comments',
            'as'              => 'post_comments.create',
            'icon'            => null,
            'parent'          => $manageComments->id,
            'parent_show'     => $manageComments->id,
            'parent_original' => $manageComments->id,
            'appear'          => '0',
            'ordering'        => '0',
        ]);
        $displayComments = Permission::create([
            'name'            => 'display_post_comments',
            'display_name'    => 'Show Comment',
            'route'           => 'post_comments/{comment}',
            'module'          => 'post_comments',
            'as'              => 'post_comments.show',
            'icon'            => null,
            'parent'          => $manageComments->id,
            'parent_show'     => $manageComments->id,
            'parent_original' => $manageComments->id,
            'appear'          => '0',
            'ordering'        => '0',
        ]);
        $updateComments = Permission::create([
            'name'            => 'update_post_comments',
            'display_name'    => 'Update Comment',
            'route'           => 'post_comments/{post_comments}/edit',
            'module'          => 'post_comments',
            'as'              => 'post_comments.edit',
            'icon'            => null,
            'parent'          => $manageComments->id,
            'parent_show'     => $manageComments->id,
            'parent_original' => $manageComments->id,
            'appear'          => '0',
            'ordering'        => '0',
        ]);
        $destroyComments = Permission::create([
            'name'            => 'delete_post_comments',
            'display_name'    => 'Delete Comment',
            'route'           => 'post_comments/{post_comments}',
            'module'          => 'post_comments',
            'as'              => 'post_comments.delete',
            'icon'            => null,
            'parent'          => $manageComments->id,
            'parent_show'     => $manageComments->id,
            'parent_original' => $manageComments->id,
            'appear'          => '0',
            'ordering'        => '0',
        ]);

        // POSTS CATEGORIES
        $managePostCategories = Permission::create([
            'name'            => 'manage_post_categories',
            'display_name'    => 'Manage categories',
            // 'display_name'    => 'categories',
            'route'           => 'post_categories',
            'module'          => 'post_categories',
            'as'              => 'post_categories.index',
            'icon'            => 'far fa-folder-open',
            'parent'          => '0',
            'parent_original' => '0',
            'appear'          => '1',
            'ordering'        => '15',
        ]);
        $managePostCategories->parent_show = $managePostCategories->id;
        $managePostCategories->save();
        $showPostCategories = Permission::create([
            'name'            => 'show_post_categories',
            'display_name'    => 'Show Categories',
            // 'display_name'    => 'Categories',
            'route'           => 'post_categories',
            'module'          => 'post_categories',
            'as'              => 'post_categories.index',
            'icon'            => 'far fa-folder-open',
            'parent'          => $managePostCategories->id,
            'parent_show'     => $managePostCategories->id,
            'parent_original' => $managePostCategories->id,
            'appear'          => '1',
            'ordering'        => '0',
        ]);
        $createPostCategories = Permission::create([
            'name'            => 'create_post_categories',
            'display_name'    => 'Create category',
            'route'           => 'post_categories/create',
            'module'          => 'post_categories',
            'as'              => 'post_categories.create',
            'icon'            => null,
            'parent'          => $managePostCategories->id,
            'parent_show'     => $managePostCategories->id,
            'parent_original' => $managePostCategories->id,
            'appear'          => '0',
            'ordering'        => '0',
        ]);
        $displayPostCategories = Permission::create([
            'name'            => 'display_post_categories',
            'display_name'    => 'Show Category',
            'route'           => 'post_categories/{category}',
            'module'          => 'post_categories',
            'as'              => 'post_categories.show',
            'icon'            => null,
            'parent'          => $managePostCategories->id,
            'parent_show'     => $managePostCategories->id,
            'parent_original' => $managePostCategories->id,
            'appear'          => '0',
            'ordering'        => '0',
        ]);
        $updatePostCategories = Permission::create([
            'name'            => 'update_post_categories',
            'display_name'    => 'Update category',
            'route'           => 'post_categories/{post_categories}/edit',
            'module'          => 'post_categories',
            'as'              => 'post_categories.edit',
            'icon'            => null,
            'parent'          => $managePostCategories->id,
            'parent_show'     => $managePostCategories->id,
            'parent_original' => $managePostCategories->id,
            'appear'          => '0',
            'ordering'        => '0',
        ]);
        $destroyPostCategories = Permission::create([
            'name'            => 'delete_post_categories',
            'display_name'    => 'Delete category',
            'route'           => 'post_categories/{post_categories}',
            'module'          => 'post_categories',
            'as'              => 'post_categories.delete',
            'icon'            => null,
            'parent'          => $managePostCategories->id,
            'parent_show'     => $managePostCategories->id,
            'parent_original' => $managePostCategories->id,
            'appear'          => '0',
            'ordering'        => '0',
        ]);

        // PAGES
        $managePages = Permission::create([
            'name'            => 'manage_pages',
            'display_name'    => 'Manage Pages',
            // 'display_name'    => 'Pages',
            'route'           => 'pages',
            'module'          => 'pages',
            'as'              => 'pages.index',
            'icon'            => 'fas fa-file',
            'parent'          => '0',
            'parent_original' => '0',
            'appear'          => '1',
            'ordering'        => '20',
        ]);
        $managePages->parent_show = $managePages->id;
        $managePages->save();
        $showPages = Permission::create([
            'name'            => 'show_pages',
            'display_name'    => 'Show Pages',
            // 'display_name'    => 'Pages',
            'route'           => 'pages',
            'module'          => 'pages',
            'as'              => 'pages.index',
            'icon'            => 'fas fa-file',
            'parent'          => $managePages->id,
            'parent_show'     => $managePages->id,
            'parent_original' => $managePages->id,
            'appear'          => '1',
            'ordering'        => '0',
        ]);
        $createPages = Permission::create([
            'name'            => 'create_pages',
            'display_name'    => 'Create Page',
            'route'           => 'pages/create',
            'module'          => 'pages',
            'as'              => 'pages.create',
            'icon'            => null,
            'parent'          => $managePages->id,
            'parent_show'     => $managePages->id,
            'parent_original' => $managePages->id,
            'appear'          => '0',
            'ordering'        => '0',
        ]);
        $displayPages = Permission::create([
            'name'            => 'display_pages',
            'display_name'    => 'Show Page',
            'route'           => 'pages/{pages}',
            'module'          => 'pages',
            'as'              => 'pages.show',
            'icon'            => null,
            'parent'          => $managePages->id,
            'parent_show'     => $managePages->id,
            'parent_original' => $managePages->id,
            'appear'          => '0',
            'ordering'        => '0',
        ]);
        $updatePages = Permission::create([
            'name'            => 'update_pages',
            'display_name'    => 'Update Page',
            'route'           => 'pages/{pages}/edit',
            'module'          => 'pages',
            'as'              => 'pages.edit',
            'icon'            => null,
            'parent'          => $managePages->id,
            'parent_show'     => $managePages->id,
            'parent_original' => $managePages->id,
            'appear'          => '0',
            'ordering'        => '0',
        ]);
        $destroyPages = Permission::create([
            'name'            => 'delete_pages',
            'display_name'    => 'Delete Page',
            'route'           => 'pages/{pages}',
            'module'          => 'pages',
            'as'              => 'pages.delete',
            'icon'            => null,
            'parent'          => $managePages->id,
            'parent_show'     => $managePages->id,
            'parent_original' => $managePages->id,
            'appear'          => '0',
            'ordering'        => '0',
        ]);

        $admin = User::create([
            'name'               => 'Admin',
            'email'              => 'admin@mail.com',
            'email_verified_at'  => now(),
            'password'           => bcrypt('123123123'),
            'remember_token'     => Str::random(10),
            'profile_photo_path' => 'https://ui-avatars.com/api/?name=Admin&background=random',
        ]);
        $admin->attachRole($adminRole);

        $supervisor = User::create([
            'name'               => 'Supervisor',
            'email'              => 'supervisor@mail.com',
            'email_verified_at'  => now(),
            'password'           => bcrypt('123123123'),
            'remember_token'     => Str::random(10),
            'profile_photo_path' => 'https://ui-avatars.com/api/?name=Supervisor&background=random',
        ]);
        $supervisor->attachRole($supervisorRole);
        $supervisor->attachPermissions([1,2,3,4,5,6,7,8,9,10,11,12,13]);

        $user = User::create([
            'name'               => 'User',
            'email'              => 'user@mail.com',
            'email_verified_at'  => now(),
            'password'           => bcrypt('123123123'),
            'remember_token'     => Str::random(10),
            'profile_photo_path' => 'https://ui-avatars.com/api/?name=user&background=random',
        ]);
        $user->attachRole($userRole);
    }
}
