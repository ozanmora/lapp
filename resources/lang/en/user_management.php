<?php

return [
    'column' => [
        'name'          => 'Full Name',
        'email'         => 'Email Adress',
        'role'          => 'Role',
        'permissions'   => 'Permissions',
        'created_at'    => 'Registered Date',
        'deleted_at'    => 'Deleted Date',
    ],
    'field' => [
        'name'                  => 'Full Name',
        'email'                 => 'Email Adress',
        'password'              => 'Password',
        'password_confirmation' => 'Password Confirmation',
        'role'                  => 'Role'
    ],
    'placeholder' => [
        'name'                  => 'Full Name',
        'email'                 => 'Email Adress',
        'password'              => 'Password',
        'password_confirmation' => 'Password Confirmation',
        'role'                  => 'Select a Role'
    ],
    'message' => [
        'success_create'        => 'Successfully created user!',
        'success_update'        => 'Successfully updated user!',
        'success_delete'        => 'Successfully deleted user!',
        'success_restore'       => 'Successfully restored user!',
        'success_force_delete'  => 'Successfully completely deleted user!',
        'success_detach_role'   => 'Successfully detach role from user!',
        'success_detach_permission' => 'Successfully detach permission from user!',
        'error_delete_self'     => 'You can not delete yourself!',
        'error_delete_root'     => 'You can not delete "ROOT" user!',
        'error_delete_level'    => 'You can not delete the user from higher level user yourself!',
        'error_undefined'       => 'You have some problem for this action',
    ],
    'confirm' => [
        'title_trash'       => '{0} Delete User|[1,*] Delete ":name" User',
        'message_trash'     => 'Are you sure you want to delete this user ?',
        'title_delete'      => '{0} Delete User|[1,*] Delete ":name" User',
        'message_delete'    => 'Are you sure you want to completely delete this user ?',
        'title_restore'     => '{0} Restore User|[1,*] Restore ":name" User',
        'message_restore'   => 'Are you sure you want to restore this user ?',
        'title_detach_role'    => '{0} Detach Role From User|[1,*] Detach ":name" Role From User',
        'message_detach_role'  => 'Are you sure you want to detach role from this user ?',
        'title_detach_permission'    => '{0} Detach Permission From User|[1,*] Detach ":name" Permission From User',
        'message_detach_permission'  => 'Are you sure you want to detach permission from this user ?',
    ]
];
