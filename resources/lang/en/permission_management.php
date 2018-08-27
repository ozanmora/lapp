<?php

return [
    'column' => [
        'name'          => 'Name',
        'slug'          => 'Slug',
        'model'         => 'Model',
        'users'         => 'Users',
    ],
    'field' => [
        'name'          => 'Name',
        'slug'          => 'Slug',
        'description'   => 'Description',
        'model'         => 'Model'
    ],
    'placeholder' => [
        'name'          => 'Name',
        'slug'          => 'Slug',
        'description'   => 'Description',
        'model'         => 'Model'
    ],
    'message' => [
        'success_create'        => 'Successfully created permission!',
        'success_update'        => 'Successfully updated permission!',
        'success_delete'        => 'Successfully deleted permission!',
        'success_restore'       => 'Successfully restored permission!',
        'success_force_delete'  => 'Successfully force deleted permission!',
        'error_delete_self'     => 'You can not delete your self permission!',
        'error_delete_has_user' => 'You can not delete this permission! Because the permission has :count user(s).',
    ],
    'confirm' => [
        'title_delete'      => '{0} Delete Permission|[1,*] Delete ":name" Permission',
        'message_delete'    => 'Are you sure you want to completely delete this permission ?'
    ]
];
