<?php

namespace HexTechnology\Layouts;


use Rhubarb\Crown\Html\ResourceLoader;
use Rhubarb\Crown\Layout\LayoutModule;
use Rhubarb\Crown\Settings\HtmlPageSettings;
use Rhubarb\Patterns\Layouts\BaseLayout;

class DefaultLayout extends BaseLayout
{
    public function __construct()
    {
        ResourceLoader::loadResource( "/static/css/base.css" );
    }

    protected function printPageHeading()
    {
        ?>
        <div id="top">
            <?php
      /*      $title = $this->getTitle();
            if ($title != "") {
                print "<a href='/'> <h1>" . $title . "</h1></a>";
            }
      */    ?>
        </div>
        <?php print $this->getNav(); ?>
        <div id="content">
        <?php
    }
    protected function printTail()
    {
        parent::printTail();
        ?>
        </div>
        <div id="tail">
        </div>
        <?php
    }
    protected function getTitle()
    {
        $pageSettings = HtmlPageSettings::singleton();
        return "Hex Technology";
    }
    protected function getNav()
    {
        $pageSettings = HtmlPageSettings::singleton();
        return <<<HTML
        <nav>
        <a href="/"><img src="/static/images/logo.png" alt="logo" height="55px"></a>
            <ul>
                <a href="/assets/"><li><h1>Assets</h1></li></a>
                <a href="/assets/manufacturers/"><li><h1>Manufacturers</h1></li></a>
                <a href="/assets/types/"><li><h1>Asset-Types</h1></li></a>
                <a href="/clients/"><li><h1>Clients</h1></li></a>
                <a href="/expenses/"><li><h1>Expenses</h1></li></a>
                <a href="/projects/"><li><h1>Projects</h1></li></a>
                <a href="/tasks/"><li><h1>Tasks</h1></li></a>
            </ul>
        </nav>
HTML;
    }
    protected function printContent($content)
    {
        print $content;
    }
    protected function printLayout($content)
    {
        ?>
        <html>
        <head>
            <title><?= $this->getTitle(); ?></title>
            <?= LayoutModule::getHeadItemsAsHtml(); ?>
            <?= ResourceLoader::getResourceInjectionHtml(); ?>
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        </head>
        <header>
            <?php $this->printPageHeading(); ?>
        </header>
        <body>
        <?= LayoutModule::getBodyItemsAsHtml(); ?>
        <?php $this->printContent($content); ?>
        <?php $this->printTail(); ?>
        </body>
        </html>
        <?php
    }

}