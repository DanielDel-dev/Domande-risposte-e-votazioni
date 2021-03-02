<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Answer;
use App\Models\Question;
use App\Policies\AnswerPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        Gate::define('update-question', function(User $user, Question $question){
            return $user->id === $question->user_id;
        });

        Gate::define('delete-question', function(User $user, Question $question){
            return $user->id === $question->user_id;
        });


        Gate::define('update-answer', function(User $user, Answer $answer){
            return $user->id === $answer->user_id;
        });

        Gate::define('delete-answer', function(User $user, Answer $answer){
            return $user->id === $answer->user_id;
        });
    }
}
