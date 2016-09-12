<?php 
	exit; //Prevent exposure on the web
?>

[production]
;First key is Worldcat, Second is a dummy etc.
ApiKeys="demoapikey1,demoapikey2" 
Log="/tmp/rta_"
LogLevel=1
;START CATALOGUE ENTRIES
;Add your aleph server url's here
ItemsServer = "http://alephtest.library.uu.nl/F?"
XServer = "https://alephtest.library.uu.nl/X?"
;This code is not functional and is only there for having some analytics
ItemsServerAnalyticsCode="&amp;source=wcds"
XServerCred="/some_path_outside_your_webroot/cred_alephx_portal.ini"
;Some CURL settings
CurloptLowSpeedLimit=100
CurloptLowSpeedTime=1
CurloptConnectTimeout=1
SlowConnectTest="https://www.deelay.me/4000/https://aleph.library.uu.nl/exlibris/aleph/u22_1/alephe/www_f_ned/icon/images/kop_catalogus_nl_isolated.jpg"
TestOCN="64886290,73007423,776475259,65487768,901061357,906497788,52847682,dummy"
TestLoopRepeats=10
MaxItems=300
;Some organisation specific logic on item status 
ItemStatusAvailable=01,02,03
ItemStatusUnavailable=35
ItemStatusMissing=29,30,31,32,33
ItemStatusNotYetAvailable=37
LoanStatusUnavailable=A,L,C
;Path to Restler framework
RestlerLocation="./restler_minified/restler.php"

[test]
;First key is Worldcat, Second is a dummy etc.
ApiKeys="demoapikey1,demoapikey2" 
Log="/tmp/rta_"
LogLevel=1
;START CATALOGUE ENTRIES
;Add your aleph server url's here
ItemsServer = "http://alephtest.library.uu.nl/F?"
XServer = "https://alephtest.library.uu.nl/X?"
;This code is not functional and is only there for having some analytics
ItemsServerAnalyticsCode="&amp;source=wcds"
XServerCred="/some_path_outside_your_webroot/cred_alephx_portal.ini"
;Some CURL settings
CurloptLowSpeedLimit=100
CurloptLowSpeedTime=1
CurloptConnectTimeout=1
SlowConnectTest="https://www.deelay.me/4000/https://aleph.library.uu.nl/exlibris/aleph/u22_1/alephe/www_f_ned/icon/images/kop_catalogus_nl_isolated.jpg"
TestOCN="64886290,73007423,776475259,65487768,901061357,906497788,52847682,dummy"
TestLoopRepeats=10
MaxItems=300
;Some organisation specific logic on item status 
ItemStatusAvailable=01,02,03
ItemStatusUnavailable=35
ItemStatusMissing=29,30,31,32,33
ItemStatusNotYetAvailable=37
LoanStatusUnavailable=A,L,C
;Path to Restler framework
RestlerLocation="./restler_minified/restler.php"

[dev]
;First key is Worldcat, Second is a dummy etc.
ApiKeys="demoapikey1,demoapikey2" 
Log="/tmp/rta_"
LogLevel=1
;START CATALOGUE ENTRIES
;Add your aleph server url's here
ItemsServer = "http://alephtest.library.uu.nl/F?"
XServer = "https://alephtest.library.uu.nl/X?"
;This code is not functional and is only there for having some analytics
ItemsServerAnalyticsCode="&amp;source=wcds"
XServerCred="/some_path_outside_your_webroot/cred_alephx_portal.ini"
;Some CURL settings
CurloptLowSpeedLimit=100
CurloptLowSpeedTime=1
CurloptConnectTimeout=1
SlowConnectTest="https://www.deelay.me/4000/https://aleph.library.uu.nl/exlibris/aleph/u22_1/alephe/www_f_ned/icon/images/kop_catalogus_nl_isolated.jpg"
TestOCN="64886290,73007423,776475259,65487768,901061357,906497788,52847682,dummy"
TestLoopRepeats=10
MaxItems=300
;Some organisation specific logic on item status 
ItemStatusAvailable=01,02,03
ItemStatusUnavailable=35
ItemStatusMissing=29,30,31,32,33
ItemStatusNotYetAvailable=37
LoanStatusUnavailable=A,L,C
;Path to Restler framework
RestlerLocation="./restler_minified/restler.php"


[servers]
;these entries should contain the php_uname('n')  value of your machine. Will default to production if no match is found
dev=mydevserver.mydomain.com
test=mytestserver.mydomain.com