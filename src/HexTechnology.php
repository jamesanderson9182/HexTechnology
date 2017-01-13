<?php

namespace HexTechnology;

use HexTechnology\Custard\HexTechnologyDataSeeder;
use HexTechnology\Layouts\DefaultLayout;
use HexTechnology\Layouts\HexTechnologyLayoutProvider;
use HexTechnology\Leaves\Assets\AssetsCollection;
use HexTechnology\Leaves\Assets\AssetTypes\AssetTypesCollection;
use HexTechnology\Leaves\Assets\Manufacturers\ManufacturersCollection;
use HexTechnology\Leaves\Index\Index;
use HexTechnology\Leaves\Assets\Serials\SerialsCollection;
use HexTechnology\Models\Asset;
use HexTechnology\Models\AssetType;
use HexTechnology\Models\HexTechnologySolutionSchema;
use HexTechnology\Models\Manufacturer;
use HexTechnology\Models\SerialNumber;
use HexTechnology\RestApi\AssetsResource;
use HexTechnology\RestApi\SerialsResource;
use Rhubarb\Crown\Application;
use Rhubarb\Crown\Layout\LayoutModule;
use Rhubarb\Crown\String\StringTools;
use Rhubarb\Crown\UrlHandlers\ClassMappedUrlHandler;
use Rhubarb\Leaf\Crud\UrlHandlers\CrudUrlHandler;
use Rhubarb\Leaf\LayoutProviders\LayoutProvider;
use Rhubarb\Leaf\LeafModule;
use Rhubarb\RestApi\Resources\ApiDescriptionResource;
use Rhubarb\RestApi\UrlHandlers\RestApiRootHandler;
use Rhubarb\RestApi\UrlHandlers\RestCollectionHandler;
use Rhubarb\Stem\Custard\SeedDemoDataCommand;
use Rhubarb\Stem\Repositories\MySql\MySql;
use Rhubarb\Stem\Repositories\Repository;
use Rhubarb\Stem\Schema\SolutionSchema;
use Rhubarb\Stem\StemModule;

class HexTechnology extends Application
{
    protected function initialise()
    {
        parent::initialise();

        if (file_exists(APPLICATION_ROOT_DIR . "/settings/site.config.php")) {
            include_once(APPLICATION_ROOT_DIR . "/settings/site.config.php");
        }
        SolutionSchema::registerSchema('myApp', HexTechnologySolutionSchema::class);
        Repository::setDefaultRepositoryClassName(MySql::class);

        LayoutProvider::setProviderClassName(HexTechnologyLayoutProvider::class);
    }

    protected function registerUrlHandlers()
    {
        parent::registerUrlHandlers();
        ///TODO: Require login

        /*
         * Urls for api
         */
        $this->addUrlHandlers([
            "/api" => new RestApiRootHandler(ApiDescriptionResource::class, [
                "/assets" => new RestCollectionHandler(AssetsResource::class, [
                    "/serials" => new RestCollectionHandler(SerialsResource::class)
                ])
            ])
        ]);

        /*
         * Urls for web pages
         */
        $this->addUrlHandlers(
            [
                "/" => new ClassMappedUrlHandler(Index::class, [
                    "assets/" => new CrudUrlHandler(Asset::class, StringTools::getNamespaceFromClass(AssetsCollection::class), [], [
                        "types/" => new CrudUrlHandler(AssetType::class, StringTools::getNamespaceFromClass(AssetTypesCollection::class)),
                        "serials/" => new CrudUrlHandler(SerialNumber::class, StringTools::getNamespaceFromClass(SerialsCollection::class)),
                        "manufacturers/" => new CrudUrlHandler(Manufacturer::class, StringTools::getNamespaceFromClass(ManufacturersCollection::class))
                    ])
                ])
            ]
        );
    }

    /**
     * Should your module require other modules, they should be returned here.
     */
    protected function getModules()
    {
        return [
            new LayoutModule(DefaultLayout::class),
            new LeafModule(),
            new StemModule(),

        ];
    }

    public function getCustardCommands()
    {
        SeedDemoDataCommand::registerDemoDataSeeder(new HexTechnologyDataSeeder);
        return parent::getCustardCommands();
    }

}