<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\QuestionBank;
use App\Models\Subject;
use App\Models\User;
use App\Policies\ChapterPolicy;
use App\Policies\ExamineePolicy;
use App\Policies\ExamSetupPolicy;
use App\Policies\QuestionBankPolicy;
use App\Policies\SubjectPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('users',[UserPolicy::class,'create']);
        Gate::define('subjects',[SubjectPolicy::class,'create']);
        Gate::define('chapters',[ChapterPolicy::class,'create']);
        Gate::define('questionbanks',[QuestionBankPolicy::class,'create']);
        Gate::define('examsetups',[ExamSetupPolicy::class,'create']);
        Gate::define('examinees',[ExamineePolicy::class,'create']);
        
        // Gate::define('isAdmin', function ($user) {
        //     return $user->user_type === 'admin';
        // });
        
        // Gate::define('isEditor', function ($user) {
        //     return $user->user_type === 'editor';
        // });
        
        // Gate::define('isUser', function ($user) {
        //     return $user->user_type === 'user';
        // });

        // Gate::define('edit-subject', function (User $user, Subject $subjetc) {
        //     $allowedUserTypes = ['admin', 'editor'];

        // return in_array($user->user_type, $allowedUserTypes);
        // });

        // Gate::define('delete-subject', function (User $user, Subject $subject) {
        // $allowedUserTypes = ['admin'];

        // return in_array($user->user_type, $allowedUserTypes);
        // });

    }
}
