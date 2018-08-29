<?php

return [
    'column' => [
        'name'          => 'Name',
        'slug'          => 'Slug',
        'level'         => 'Level',
        'relationships' => 'Relationships',
        'users'         => 'Users',
        'permissions'   => 'Permissions',
    ],
    'field' => [
        'name'          => 'Name',
        'slug'          => 'Slug',
        'description'   => 'Description (Optional)',
        'level'         => 'Level',
        'users'         => 'Users',
        'permissions'   => 'Permissions (Multiple)'
    ],
    'placeholder' => [
        'name'          => 'Name',
        'slug'          => 'Slug',
        'description'   => 'Description (Optional)',
        'level'         => 'Level',
        'users'         => 'Select Users Multiple',
        'permissions'   => 'Select Permissions Multiple',
    ],
    'message' => [
        'success_create'        => 'Successfully created role!',
        'success_update'        => 'Successfully updated role!',
        'success_delete'        => 'Successfully deleted role!',
        'success_restore'       => 'Successfully restored role!',
        'success_force_delete'  => 'Successfully force deleted role!',
        'success_detach_permission' => 'Successfully detach permission from role!',
        'success_detach_user'   => 'Successfully detach user from role!',
        'error_delete_self'     => 'You can not delete your self role!',
        'error_delete_has_user' => 'You can not delete this role! Because the role has :count user(s).',
        'error_undefined'       => 'You have some problem for this action',
    ],
    'confirm' => [
        'title_delete'      => '{0} Delete Role|[1,*] Delete ":name" Role',
        'message_delete'    => 'Are you sure you want to completely delete this role ?',
        'title_detach_permission'    => '{0} Detach Permission From Role|[1,*] Detach ":name" Permission From Role',
        'message_detach_permission'  => 'Are you sure you want to detach permission from this role ?',
        'title_detach_user'    => '{0} Detach User From Role|[1,*] Detach ":name" User From Role',
        'message_detach_user'  => 'Are you sure you want to detach user from this role ?',
    ]
];
