<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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

        if (Auth::check()) {
            // Admin Menu Generator
            \Menu::make('AdminSidebarMenu', function ($menu) {
                $menu->add(trans('admin.menu.dashboard'),  [ 'route' => 'admin' ])
                    ->nickname('admin')
                    ->data('icon', trans('admin.icon.dashboard'))
                    ->data('order', 1);

                $menu->group([], function($m) {
                    $m->divide(['class' => 'header', 'title' => trans('admin.menu.system')]);
                    $m->add(trans('admin.menu.user_management'), [ 'route' => 'admin.users' ])
                        ->nickname('admin.user_management')
                        ->data('icon', trans('admin.icon.user_management'))
                        ->data('order', 101)
                        ->data('permission', 'permission:users.list');
                    $m->add(trans('admin.menu.role_management'), [ 'route' => 'admin.roles' ])
                        ->nickname('admin.role_management')
                        ->data('icon', trans('admin.icon.role_management'))
                        ->data('order', 102)
                        ->data('permission', 'role:root');
                    $m->add(trans('admin.menu.permission_management'), [ 'route' => 'admin.permissions' ])
                        ->nickname('admin.permission_management')
                        ->data('icon', trans('admin.icon.permission_management'))
                        ->data('order', 103)
                        ->data('permission', 'role:root');
                });
            })
            ->sortBy('order')
            ->filter(function($item) {
                if ($item->data('permission')) {
                    $parse = explode(':', $item->data('permission'));
                    switch ($parse[0]) {
                        case 'role':
                                $result = (Auth::user()->hasRole($parse[1]));
                            break;
                        case 'permission':
                                $result = (Auth::user()->hasPermission($parse[1]) || Auth::user()->hasRole('root'));
                            break;
                        case 'level':
                                $result = (Auth::user()->level() >= (int) $parse[1] || Auth::user()->hasRole('root'));
                            break;
                        default:
                            $result = false;
                        break;
                    }
                } else {
                    $result = true;
                }

                return $result;
            });
        }

        return $next($request);
    }
}
