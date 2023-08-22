<?php

declare(strict_types=1);

namespace App\Enums;

class RoutesEnum
{
    /**
     * @string
     */
    public const FRONT_WELCOME = 'front.welcome';

    /**
     * @string
     */
    public const ADMIN_INDEX_CLIENTS = 'admin.clients.index';

    /**
     * @string
     */
    public const ADMIN_CREATE_CLIENT = 'admin.clients.create';

    /**
     * @string
     */
    public const ADMIN_STORE_CLIENT = 'admin.clients.store';

    /**
     * @string
     */
    public const ADMIN_EDIT_CLIENT = 'admin.clients.edit';

    /**
     * @string
     */
    public const ADMIN_UPDATE_CLIENT = 'admin.clients.update';
}
