<?php

namespace App\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Front End Menu Generator
        \Menu::make('HeaderMenu', function ($menu) {
            $menu->add('Home');
            $menu->add('About', 'about');
            $menu->add('Services', 'services');
            $menu->add('Contact', 'contact');
        });

        // Admin Menu Generator
        \Menu::make('AdminSidebarMenu', function ($menu) {
            $menu->add(trans('admin.menu.dashboard'),  [ 'route' => 'admin' ])->prepend(trans('admin.icon.dashboard').'&nbsp; ')->nickname('admin');
            $menu->add(trans('admin.menu.user_management'), '#')->prepend(trans('admin.icon.user_management').'&nbsp; ')->nickname('admin.user_management');
            $menu->add(trans('admin.menu.role_management'), '#')->prepend(trans('admin.icon.role_management').'&nbsp; ')->nickname('admin.role_management');
            $menu->add(trans('admin.menu.permission_management'), '#')->prepend(trans('admin.icon.permission_management').'&nbsp; ')->nickname('admin.permission_management');
        });

        return $next($request);
    }
}
