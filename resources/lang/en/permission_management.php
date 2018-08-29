<?php

return [
    'column' => [
        'name'          => 'Name',
        'slug'          => 'Slug',
        'model'         => 'Model',
        'relationships' => 'Relationships',
        'users'         => 'Users',
        'roles'         => 'Roles',
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
        'success_detach_role'   => 'Successfully detach role from permission!',
        'success_detach_user'   => 'Successfully detach user from permission!',
        'error_delete_self'     => 'You can not delete your self permission!',
        'error_delete_has_user' => 'You can not delete this permission! Because the permission has :count user(s).',
        'error_undefined'       => 'You have some problem for this action',
    ],
    'confirm' => [
        'title_delete'      => '{0} Delete Permission|[1,*] Delete ":name" Permission',
        'message_delete'    => 'Are you sure you want to completely delete this permission ?',
        'title_detach_role'    => '{0} Detach Role From Permission|[1,*] Detach ":name" Role From Permission',
        'message_detach_role'  => 'Are you sure you want to detach role from this permission ?',
        'title_detach_user'    => '{0} Detach User From Permission|[1,*] Detach ":name" User From Permission',
        'message_detach_user'  => 'Are you sure you want to detach user from this permission ?',
    ]
];
