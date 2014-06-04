<?php
// Include the autoloader - edit this path!
require_once 'WURFL/src/autoload.php';
 
// Create a configuration object 
$config = new ScientiaMobile\WurflCloud\Config(); 
 
// Set your WURFL Cloud API Key 
$config->api_key = '954898:bBcFxmhVfn9DWP28LweyCT63YNkJ1jaX';  
 
// Create the WURFL Cloud Client 
$client = new ScientiaMobile\WurflCloud\Client($config); 
 
// Detect your device 
$client->detectDevice(); 
 
// Use the capabilities 
if ($client->getDeviceCapability('ux_full_desktop')) { 
    echo "This is a desktop device"; 
} else { 
    echo "This is a mobile device";
}