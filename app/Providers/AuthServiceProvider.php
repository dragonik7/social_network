<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Chat;
use App\Models\Message;
use App\Models\Post;
use App\Policies\ChatPolicy;
use App\Policies\MessagePolicy;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

	/**
	 * The model to policy mappings for the application.
	 *
	 * @var array<class-string, class-string>
	 */
	protected $policies = [
		// 'App\Models\Model' => 'App\Policies\ModelPolicy',
		Post::class    => PostPolicy::class,
		Message::class => MessagePolicy::class,
		Chat::class    => ChatPolicy::class,
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
