Installation Guide 
==================
```bash
FORGET THE GUIDE, USE EVENTS TO FIRE JQUERY BACK!
git clone git@gitlab.com:janderson9182/HexTechnology.git
cd HexTechnology
composer install 
vagrant up 
vagrant ssh 
cd /vagrant 
vendor/rhubarbphp/custard/bin/custard stem:update-schemas
vendor/rhubarbphp/custard/bin/custard stem:seed-data
```
Environment Setup: Windows
==========================
Do the following in the following order:
* Install Code Editor: PhpStorm or NetBeans 
* GitBash 
* Install Composer
* Install Virtual Box
* Install Vagrant
* Install PuttyGen
* Install Putty
* Install HeidiSQL
* Use PuttyGen to add a public and pivate key to /Users/YourUserName/.ssh/
* Use git bash to navigate to where you want the project to be downloaded to 
* Do all of the steps listed in the installation guide except for vagrant ssh, instead you will need to use putty 
to ssh to 127.0.0.1 port 2222 username vagrant password vagrant 
* Continue from cd /vagrant
* In heidi sql you can add a connection to the database which is at 127.0.1 port 3307  username vagrant password vagrant 
* You should now be able to see the site in a browser at localhost:8080

TODO
====

* pull list creator
* quote generator
* invoice generator
* contact list
* Project List
* wish list that does web scraping of prices. Can create a graph of a rise and fall of prices. Notifies us if it reaches a certain level
* It could pull in the feed from the pi cams so one web page for each rather than having to remote into each
* Have a look at https://developers.google.com/vision/barcodes-overview
* https://github.com/LazarSoft/jsqrcode for a very simple bar code scanner that would work for a phone. This would probably be a bit slow for us and we would want an android app that has this integerated into it 
* Price lists for a rental from us to another competitor?
* Price lists tracking for other people that we have found out 
