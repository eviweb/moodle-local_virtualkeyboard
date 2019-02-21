# Change Log
All notable changes to this project will be documented in this file.
This project adheres to [Semantic Versioning](http://semver.org/).

### [Unreleased][unreleased]

### 0.1.4 - 2019-02-21
#### Changed
- enable the keyboard dead keys by default

### 0.1.3 - 2017-05-17
#### Fixed
- keyboard resource files were not loaded when Moodle `wwwroot` contained subfolders (ie. http://domain.tld/moodle)
- fix `TypeError: Y.one(...) is null` error when closing the virtual keyboard by clicking on the keyboard icon

### 0.1.2 - 2017-02-01
#### Fixed
- virtualkeyboard loaded only once after purging caches under Moodle 3.2+

### 0.1.1 - 2016-04-15
#### Fixed
- fix keyboard never shown in embedded questions (cloze)

#### Changed
- enhance keyboard open/close behaviours
- update readme
- change license terms to GPL-3.0

#### Added
- new config setting `contextlayout`
- language provider interface + default implementation
- main factory class
- screen captures

### 0.1.0 - 2015-03-16
#### Added
- package files
- required default files to create a plugin for moodle
- virtual keyboard files (js, ccs, img)
- autoloader
- keyboard layout extractor interface + default implementation
- js loader + in quiz context activator