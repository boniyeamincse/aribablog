<?php

return [
    App\Providers\AppServiceProvider::class,
    App\Modules\UserManagement\Providers\UserManagementServiceProvider::class,
    App\Modules\Blog\Providers\BlogServiceProvider::class,
    App\Modules\Comments\Providers\CommentsServiceProvider::class,
    App\Modules\Media\Providers\MediaServiceProvider::class,
    App\Modules\Categories\Providers\CategoriesServiceProvider::class,
    App\Modules\Notifications\Providers\NotificationsServiceProvider::class,
];
