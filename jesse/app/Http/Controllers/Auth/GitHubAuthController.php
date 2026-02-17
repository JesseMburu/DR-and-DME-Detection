<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

class GitHubAuthController extends Controller
{
    /**
     * Redirect the user to GitHub for authentication.
     */
    public function redirect(): RedirectResponse
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub and authenticate locally.
     */
    public function callback(): RedirectResponse
    {
        try {
            $githubUser = Socialite::driver('github')->user();
        } catch (Throwable $exception) {
            report($exception);

            return redirect()->route('login')->withErrors([
                'github' => __('Unable to authenticate with GitHub. Please try again.'),
            ]);
        }

        $email = $githubUser->getEmail();

        if (! $email) {
            $email = sprintf('github+%s@users.noreply.github.com', $githubUser->getId());
        }

        $user = User::query()
            ->where('github_id', $githubUser->getId())
            ->orWhere('email', $email)
            ->first();

        $user = $user ?? User::create([
            'name' => $githubUser->getName() ?: $githubUser->getNickname() ?: 'GitHub User',
            'email' => $email,
            'password' => Str::random(32),
        ]);

        $user->forceFill([
            'github_id' => (string) $githubUser->getId(),
            'github_username' => $githubUser->getNickname(),
            'github_avatar' => $githubUser->getAvatar(),
        ]);

        if (! $user->email_verified_at) {
            $user->forceFill(['email_verified_at' => now()]);
        }

        $user->save();

        Auth::login($user, true);

        return redirect()->intended(route('home', absolute: false));
    }
}

