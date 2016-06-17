# WorldcatRTA
A REST facade between Aleph and Worldcat.
This REST\PHP  based facade delivers real time availability from a Aleph system to Worldcat OCLC.
The service expects a OCN number from a WorldCat title as start identifier. The service tries to resolve this to an Aleph systemnumber and will provide the availability of the items.

To make this work you need several things
-A PHP with CURL website where the endpoint lives. HTTPS is highly recommended
-Make sure your mod_rewrite is working
-A writable directory for logging. Default configuration is /tmp/
-Access to your Aleph Xservices from your endpoint the portal-x credentials)
-Someone who can configure your Worldcat instance to consume the REST service

# Install
Unzip the package to your desired weblocation

In config.php

Define in [servers] the machines that will act as dev\test. It must match php_uname('n')

Define in corresponding section

-Log (defaults to /tmp)
-ApiKeys (a comma delimited set of apikeys.)

-ItemsServer (aleph server)

-Xserver (aleph x server)

-XserverCred (This is a pointer to a file. The file itself contains two line. First line is Xuser, Second line is the password. Make sure this file is outside your webroot!)

-RestlerLocation (a tiny framework to take care of the Rest. Version 2 of https://github.com/Luracast/Restler  included in the package)

Several item status codes aplly to your own environment. The values are the ones we use at Utrecht  University.


