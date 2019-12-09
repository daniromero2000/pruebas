<?php

namespace App\Providers;

use App\Entities\Generals\Cities\Repositories\CityRepository;
use App\Entities\Generals\Cities\Repositories\Interfaces\CityRepositoryInterface;
use App\Entities\Generals\Countries\Repositories\CountryRepository;
use App\Entities\Generals\Countries\Repositories\Interfaces\CountryRepositoryInterface;
use App\Entities\Generals\Provinces\Repositories\Interfaces\ProvinceRepositoryInterface;
use App\Entities\Generals\Provinces\Repositories\ProvinceRepository;
use App\Entities\Generals\Epss\Repositories\EpsRepository;
use App\Entities\Generals\Epss\Repositories\Interfaces\EpsRepositoryInterface;
use App\Entities\Generals\Genres\Repositories\GenreRepository;
use App\Entities\Generals\Genres\Repositories\Interfaces\GenreRepositoryInterface;
use App\Entities\Generals\CivilStatuses\Repositories\CivilStatusRepository;
use App\Entities\Generals\CivilStatuses\Repositories\Interfaces\CivilStatusRepositoryInterface;
use App\Entities\Generals\IdentityTypes\Repositories\IdentityTypeRepository;
use App\Entities\Generals\IdentityTypes\Repositories\Interfaces\IdentityTypeRepositoryInterface;
use App\Entities\Generals\ProfessionsGroups\Repositories\ProfessionsGroupRepository;
use App\Entities\Generals\ProfessionsGroups\Repositories\Interfaces\ProfessionsGroupRepositoryInterface;
use App\Entities\Generals\ProfessionsLists\Repositories\ProfessionsListRepository;
use App\Entities\Generals\ProfessionsLists\Repositories\Interfaces\ProfessionsListRepositoryInterface;
use App\Entities\Generals\ReferenceTypes\Repositories\ReferenceTypeRepository;
use App\Entities\Generals\ReferenceTypes\Repositories\Interfaces\ReferenceTypeRepositoryInterface;
use App\Entities\Generals\Relationships\Repositories\RelationshipRepository;
use App\Entities\Generals\Relationships\Repositories\Interfaces\RelationshipRepositoryInterface;
use App\Entities\Generals\Scholarities\Repositories\ScholarityRepository;
use App\Entities\Generals\Scholarities\Repositories\Interfaces\ScholarityRepositoryInterface;
use App\Entities\Generals\Stratums\Repositories\StratumRepository;
use App\Entities\Generals\Stratums\Repositories\Interfaces\StratumRepositoryInterface;
use App\Entities\Generals\Housings\Repositories\HousingRepository;
use App\Entities\Generals\Housings\Repositories\Interfaces\HousingRepositoryInterface;
use App\Entities\Generals\VehicleBrands\Repositories\VehicleBrandRepository;
use App\Entities\Generals\VehicleBrands\Repositories\Interfaces\VehicleBrandRepositoryInterface;
use App\Entities\Generals\VehicleTypes\Repositories\VehicleTypeRepository;
use App\Entities\Generals\VehicleTypes\Repositories\Interfaces\VehicleTypeRepositoryInterface;
use App\Entities\Generals\EconomicActivityTypes\Repositories\EconomicActivityTypeRepository;
use App\Entities\Generals\EconomicActivityTypes\Repositories\Interfaces\EconomicActivityTypeRepositoryInterface;
use App\Entities\Generals\Tools\ToolRepositoryInterface;
use App\Entities\Generals\Tools\ToolRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            SubsidiaryRepositoryInterface::class,
            SubsidiaryRepository::class
        );

        $this->app->bind(
            CountryRepositoryInterface::class,
            CountryRepository::class
        );

        $this->app->bind(
            ProvinceRepositoryInterface::class,
            ProvinceRepository::class
        );

        $this->app->bind(
            CityRepositoryInterface::class,
            CityRepository::class
        );

        $this->app->bind(
            EpsRepositoryInterface::class,
            EpsRepository::class
        );

        $this->app->bind(
            GenreRepositoryInterface::class,
            GenreRepository::class
        );

        $this->app->bind(
            CivilStatusRepositoryInterface::class,
            CivilStatusRepository::class
        );

        $this->app->bind(
            IdentityTypeRepositoryInterface::class,
            IdentityTypeRepository::class
        );

        $this->app->bind(
            ProfessionsGroupRepositoryInterface::class,
            ProfessionsGroupRepository::class
        );

        $this->app->bind(
            ProfessionsListRepositoryInterface::class,
            ProfessionsListRepository::class
        );

        $this->app->bind(
            ReferenceTypeRepositoryInterface::Class,
            ReferenceTypeRepository::class
        );

        $this->app->bind(
            RelationshipRepositoryInterface::Class,
            RelationshipRepository::class
        );

        $this->app->bind(
            ScholarityRepositoryInterface::Class,
            ScholarityRepository::class
        );

        $this->app->bind(
            StratumRepositoryInterface::Class,
            StratumRepository::class
        );

        $this->app->bind(
            HousingRepositoryInterface::Class,
            HousingRepository::class
        );

        $this->app->bind(
            VehicleBrandRepositoryInterface::Class,
            VehicleBrandRepository::class
        );

        $this->app->bind(
            VehicleTypeRepositoryInterface::Class,
            VehicleTypeRepository::class
        );

        $this->app->bind(
            EconomicActivityTypeRepositoryInterface::Class,
            EconomicActivityTypeRepository::class
        );

        $this->app->bind(
            ToolRepositoryInterface::Class,
            ToolRepository::class
        );
    }
}
