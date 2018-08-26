<?php

return [
    'column' => [
        'name'          => 'Name',
        'slug'          => 'Slug',
        'level'         => 'Level',
        'users'         => 'Users',
    ],
    'field' => [
        'name'          => 'Name',
        'slug'          => 'Slug',
        'description'   => 'Description',
        'level'         => 'Level',
        'users'         => 'Users'
    ],
    'placeholder' => [
        'name'          => 'Name',
        'slug'          => 'Slug',
        'description'   => 'Description',
        'level'         => 'Level',
        'users'         => 'Select Users Multiple'
    ],
    'message' => [
        'success_create'        => 'Successfully created role!',
        'success_update'        => 'Successfully updated role!',
        'success_delete'        => 'Successfully deleted role!',
        'success_restore'       => 'Successfully restored role!',
        'success_force_delete'  => 'Successfully force deleted role!',
        'error_delete_self'     => 'You can not delete your self role!',
        'error_delete_has_user' => 'You can not delete this role! Because the role has :count user(s).',
    ],
    'confirm' => [
        'title_delete'      => '{0} Delete Role|[1,*] Delete ":name" Role',
        'message_delete'    => 'Are you sure you want to completely delete this role ?'
    ]
];
