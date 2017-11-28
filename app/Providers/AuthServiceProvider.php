<?php

namespace App\Providers;

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
        'App\Model' => 'App\Policies\ModelPolicy',

        # by Deus
        # 連接 Message Model 與 MessagePolicy
        # 這會告訴 Laravel，每當我們嘗試授權 Message instance的行為時該用哪個policy：
        'App\Message' => 'App\Policies\MessagePolicy', // 新增
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
