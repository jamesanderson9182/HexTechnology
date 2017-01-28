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
    <ul class="topnav" id="myTopnav">
        <li><a href="/"><img src="/static/images/logo.png" alt="Hex Technology"></a></li>
        <li><a href="/assets/">Assets</a></li>
        <li><a href="/assets/manufacturers/">Manufacturers</a></li>
        <li><a href="/assets/types/">Asset-Types</a></li>
        <li><a href="/clients/">Clients</a></li>
        <li><a href="/expenses/">Expenses</a></li>
        <li><a href="/projects/">Projects</a></li>
        <li><a href="/projects/quotes/">Quotes</a></li>
        <li><a href="/tasks/">Tasks</a></li>
        <li class="icon">
            <a href="javascript:void(0);" onclick="mmmBurgers()">&#9776;</a>
        </li>
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
            <script>
                function mmmBurgers() {
                    var x = document.getElementById("myTopnav");
                    if (x.className === "topnav") {
                        x.className += " responsive";
                    } else {
                        x.className = "topnav";
                    }
                }
            </script>
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