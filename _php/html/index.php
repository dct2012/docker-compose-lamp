<?php
require_once( 'vendor/autoload.php' );
require_once( 'config.php' );

use App\DB;
use App\Config;
use App\Models\Greetings;

use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;

$Whoops = new Run();
$Whoops->pushHandler( new PrettyPageHandler() );
$Whoops->register();

Mustache_Autoloader::register();

$M = new Mustache_Engine(
	[
		'loader' => new Mustache_Loader_FilesystemLoader( dirname( __FILE__ ).'/views' ),
	]
);

$Config = new Config( CONFIG );

$DB        = new DB( $Config );
$Greetings = new Greetings( $DB );
$greeting  = $Greetings->getGreeting();

echo $M->render(
	'html',
	[
		'greeting' => $greeting,
		'ip'       => $_SERVER[ 'REMOTE_ADDR' ]
	]
);
?>


