<?php

declare(strict_types=1);

if (! function_exists('can')) {

    /**
     * Provides convenient access to the main Auth class
     * for CodeIgniter Shield.
     *
     * @param string|null $alias Authenticator alias
     */
    function can(string $permission): bool
    {
        $auth = service('auth');
        return $auth->loggedIn() && $auth->user()->can($permission);
    }
}
