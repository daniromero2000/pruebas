<?php

namespace Modules\Development\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Development\Entities\Projects\Repositories\ProjectRepository;
use Modules\Development\Entities\Projects\Repositories\Interfaces\ProjectRepositoryInterface;
use Modules\Development\Entities\Sprints\Repositories\SprintRepository;
use Modules\Development\Entities\Sprints\Repositories\Interfaces\SprintRepositoryInterface;
use Modules\Development\Entities\Issues\Issues\Repositories\IssueRepository;
use Modules\Development\Entities\Issues\Issues\Repositories\Interfaces\IssueRepositoryInterface;
use Modules\Development\Entities\IssueStatuses\Repositories\IssueStatusRepository;
use Modules\Development\Entities\IssueStatuses\Repositories\Interfaces\IssueStatusRepositoryInterface;
use Modules\Development\Entities\IssueTypes\Repositories\IssueTypeRepository;
use Modules\Development\Entities\IssueTypes\Repositories\Interfaces\IssueTypeRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            ProjectRepositoryInterface::class,
            ProjectRepository::class
        );

        $this->app->bind(
            SprintRepositoryInterface::class,
            SprintRepository::class
        );

        $this->app->bind(
            IssueRepositoryInterface::class,
            IssueRepository::class
        );

        $this->app->bind(
            IssueStatusRepositoryInterface::class,
            IssueStatusRepository::class
        );

        $this->app->bind(
            IssueTypeRepositoryInterface::class,
            IssueTypeRepository::class
        );
    }
}
