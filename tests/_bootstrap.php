<?php
// This is global bootstrap for autoloading

putenv('rhubarb_app=' . HexTechnology\HexTechnology::class);
include __DIR__ . '/../vendor/rhubarbphp/rhubarb/platform/execute-test.php';