<?php

return [
    'column' => [
        'name'          => 'Full Name',
        'email'         => 'Email Adress',
        'role'          => 'Role',
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
        'error_delete_self'     => 'You cannot delete yourself!',
    ],
    'confirm' => [
        'title_trash'       => '{0} Delete User|[1,*] Delete ":name" User',
        'message_trash'     => 'Are you sure you want to delete this user ?',
        'title_delete'      => '{0} Delete User|[1,*] Delete ":name" User',
        'message_delete'    => 'Are you sure you want to completely delete this user ?',
        'title_restore'     => '{0} Restore User|[1,*] Restore ":name" User',
        'message_restore'   => 'Are you sure you want to restore this user ?',
    ]
];
