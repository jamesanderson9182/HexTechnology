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
                <li><h1><a href="/assets/">Assets</a></h1></li>
                <li><h1><a href="/clients/">Clients</a></h1></li>
                <li><h1><a href="/projects/">Projects</a></h1></li>
                <li><h1><a href="/expenses/">Expenses</a></h1></li>
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