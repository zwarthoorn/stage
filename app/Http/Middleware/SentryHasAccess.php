<?php namespace App\Http\Middleware;

use Closure;
use Sentry;

class SentryHasAccess {

    /**
   * Sentry - Check role permission
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    $actions = $request->route()->getAction();

    if (array_key_exists('hasAccess', $actions)) 
    {
      $permission = $actions['hasAccess'];
    
      try
      {
        $user = Sentry::getUser();
       
        if ( ! $user->hasAccess($permission))
        {
          return redirect()->route('dashboard.index')->with('merror', trans('acl.you_dont_have_permission_for_this_resource'));
        }
      }
      catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
      {
        return redirect()->route('login')->with('merror', trans('acl.user_not_found'));
      }	
    }

    return $next($request);
  }
}