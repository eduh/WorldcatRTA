# WorldcatRTA
A REST facade between Aleph and Worldcat.
This REST\PHP  based facade delivers real time availability from a Aleph system to Worldcat OCLC.
The service expects a OCN number from a WorldCat title as start identifier. The service tries to resolve this to an Aleph systemnumber and will provide the availability of the items.

To make this work you need several things
* A PHP with CURL website where the endpoint lives. HTTPS is highly recommended
* Make sure your mod_rewrite is working
* A writable directory for logging. Default configuration is /tmp/
* Access to your Aleph Xservices from your endpoint the portal-x credentials)
* Someone who can configure your Worldcat instance to consume the REST service
* In Aleph make sure there is an index on the oclc (ocn) number. The Xserver must be able to resolve something like /X?op=find&code=oclc&request=[ocn number]&base=[your base]


# Install
Unzip the package to your desired weblocation

#Configure
In config.php: define in [servers] section the machines that will act as dev\test. It must match your php_uname('n'). If nothing matches your machinename it will default to the [production] section.

Define some configs in corresponding test\dev\production server section
* Log (defaults to /tmp and make sure it is writable for the httpd webserver account))
* ApiKeys (a comma delimited set of apikeys. Api keys are plaintext strings you define yourself. It is not a foolproof access mechanism but will do for most organisations)
* Define your Aleph bibliographic library in AlephDocLib
* ItemsServer (your aleph server)
* Xserver (your aleph x server. Make sure your sysadmin configures Xserver access for your RTA machine)
* XserverCred (This is a pointer to a file. The file itself must contain two lines. First line is Xuser, second line is the password. Make sure this file is outside your application or httpd webroot! Also make sure the file can be read by the httpd webserver account)
* RestlerLocation (a tiny framework to take care of the Rest. Version 2 of https://github.com/Luracast/Restler  included in the package)
* Several item status codes should be altered to your own environment. The values are the ones we use at Utrecht  University.

Set the credentials to your Aleph Xserver
It is best to store the plaintext Xserver credentials outside of your http webroot or application directory. Create an empty file at the location you specified in the config entry `XserverCred`.  In the first line put the Xserver user. In the second put your password.

#Basic Usage
From your appdir make the call 

/rtaservice/rta/[a valid ocn]/[your api key]/ocn/html

/rtaservice/rta/[a valid ocn]/[your api key]/ocn/xml

/rtaservice/rta/[a valid ocn]/[your api key]/ocn (defaults to html output)

Review the logfile as defined in the config to check if all is well. Check for 'ERR' to detect if errors occur.







