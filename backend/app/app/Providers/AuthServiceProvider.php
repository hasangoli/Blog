<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Category;
use App\Models\Article;
use App\Models\Tag;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('update-article', function (User $user, Article $article) {
            return $user->id == $article->user_id;
        });
        
        Gate::define('update-category', function (User $user, Category $category) {
            return $user->id == $category->user_id;
        });
        
        Gate::define('update-Tag', function (User $user, Tag $tag) {
            return $user->id == $tag->user_id;
        });
    }
}
