Virtual Keyboard
================
This plugin automatically provides a virtual keyboard for simple textfields that don't have a HTML editor.    
It includes Brian HUISMAN's (AKA GreyWyvern) work: [Virtual Keyboard](http://www.greywyvern.com/code/javascript/keyboard)    
    
Installation
------------
### Go to the install directory
Before all, change your working directory to `YOUR_MOODLE_DIRROOT/local` where : 
*YOUR_MOODLE_DIRROOT* represents the root directory of your moodle site.   
    
### Get the plugin
#### using git
Clone the plugin repository by running :    
`git clone https://github.com/eviweb/moodle-local_virtualkeyboard.git virtualkeyboard`   
    
#### using archive
Download the zip archive directly from github and uncompress under *virtualkeyboard* directory :    

    wget -c https://github.com/eviweb/moodle-local_virtualkeyboard/archive/master.zip    
    unzip master.zip && mv moodle-local_virtualkeyboard-master virtualkeyboard    

### Finalize the installation
Authenticate with an administrator account and go to the notifications page to 
finish the install. This page is located under :    
`http(s)://YOUR_MOODLE_SITE/admin/index.php` where : 
*YOUR_MOODLE_SITE* is the domain of your moodle site.   
    
Configuration
-------------
Configuration menu is available under *Administration > Site administration > Plugins > Local Plugins > Virtual Keyboard*.    
* **Enable Virtual Keyboard**: check this box to enable the plugin behaviour.
* **Default Keyboard Layout**: choose the keyboard layout selected by default.
* **Layout from context language**: check this box to let the plugin automatically set the keyboard layout from the context language.

*![(Virtual keyboard settings)](/docs/img/settings.png)*

What it does
------------
In this early version, when enabled, this plugin automatically adds a keyboard icon *![(Virtual keyboard icon)](/resources/img/keyboard.png)* next to all simple textfields that are not attached to a HTML editor.    
For now, only textfields in a Quiz activity are concerned.    

*![(Virtual keyboard in action)](/docs/img/quiz.png)*

Known issues
------------
Requires Moodle 2.8 (only tested version), but it should be compatible with newer versions.    
The keyboard default layout configuration is global and then is the same for all keyboard instances.    
The keyboard is automatically activated only in Quiz activities.    
     
Want to contribute
------------------
Please feel free to fork this repository and ask for pull requests.

License
-------
This project is licensed under the terms of the [GNU General Public License, version 3](/LICENSE)