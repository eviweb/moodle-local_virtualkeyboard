Virtual Keyboard
================
This plugin automatically provides a virtual keyboard for simple textfields that don't have a HTML editor.    
It includes Brian HUISMAN's (AKA GreyWyvern) work: [Virutal Keyboard](http://www.greywyvern.com/code/javascript/keyboard)    
    
Installation
------------
### go to the right directory
Before all, change your working directory to `YOUR_MOODLE_DIRROOT/local` where : 
*YOUR_MOODLE_DIRROOT* represents the root directory of your moodle site.   
    
### get the plugin
#### using git
Clone the plugin repository by running : 
`git clone https://github.com/eviweb/moodle-local_virtualkeyboard.git sanitychecker`   
    
#### using archive
Download the zip archive directly from github and uncompress under *virtualkeyboard* directory :    
    
    wget -c https://github.com/eviweb/moodle-local_virtualkeyboard/archive/master.zip    
    unzip master.zip && mv moodle-local_virtualkeyboard-master virtualkeyboard    
     
### finalize the installation
Authenticate with an administrator account and go to the notifications page to 
finish the install. This page is located under :    
`http(s)://YOUR_MOODLE_SITE/admin/index.php` where : 
*YOUR_MOODLE_SITE* is the domain of your moodle site.   
    
Configuration
-------------
Configuration menu is available under *Administration > Site administration > Plugins > Local Plugins > Virtual Keyboard*.    
    
What it does
------------
In this early version, when enabled, this plugin automatically adds a keyboard icon *![(Virtual keyboard icon)](https://github.com/eviweb/moodle-local_virtualkeyboard/resources/img/keyboard.png)* next to all simple textfields that are not attached to a HTML editor.    
For now, only textfields of Short answer questions in a Quiz activity are concerned.    
     
Known issues
------------
Requires Moodle 2.8, because it was not tested on previous versions. But it should be compatible with some of them.    
The keyboard default layout configuration is global and then is the same for all instances.    
The keyboard is automatically activated only in Quiz activity.    
     
Want to contribute
------------------
Please feel free to fork this repository and ask for pull requests.    
     