<?php
namespace App\Helpers;
// make function to get guard form $notifiable
function getGuard($notifiable)
{
    $class = get_class($notifiable);
    $guard = array_search($class, config('auth.providers'));
    return $guard;
}
