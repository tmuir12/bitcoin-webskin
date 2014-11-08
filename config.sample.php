<?php
/*
	Bitcoin Webskin - an open source PHP web interface to bitcoind
	Copyright (c) 2011 14STzHS8qjsDPtqpQgcnwWpTaSHadgEewS
*/

// Communicate with bitcoind via JSON RPC calls:

define('USERNAME', 	'rpcuser');
define('PASSWORD', 	'test');
define('SCHEME',	'http');        // http  or https  
define('HOST',     	'127.0.0.1');   
define('PORT',     	'9332');       

define('SERVER_NETWORK', 'Feathercoin');     // Display name of the network

// Windows Localhost Server

define('SERVER_LOCALHOST', 		true);   // is server on localhost? true / false
define('SERVER_LOCALHOST_TYPE', 'linux');  // type:  windows, linux
#define('WINDOWS_TASKLIST', 		'C:\Windows\System32\tasklist.exe');

define('SERVER',         		'/usr/local/bin/featehrcoind');  // full pathname to bitcoind executable
define('SERVER_NAME',    		'featehrcoind'); // name only of bitcoind executable
define('SERVER_TESTNET',    	true); // use testnet?  true / false
define('SERVER_DATADIR', 		'/home/pi/.feathercoin');  // location of data dir
define('SERVER_CONF',    		'/home/pi/featehrcoin/feathercoin.conf'); // location of conf file
