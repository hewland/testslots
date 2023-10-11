    <?php
    // config for Wainwright/CasinoDog
    return [

    'server_ip' => '192.168.178.245',
    'securitysalt' => 'el02015km210Zsfnf2ff0f0ffO', // salt used for general signing of entry sessions and so on
    'domain' => env('APP_URL', 'http://localhost'),
    'hostname' => '777.dog',
    'master_ip' => '85.148.48.255', // this IP should be your personal or whatever your testing on, this IP will surpass the Operator IP check


    /* Wildcard domain session can be used to assign game sessions (i.e. https://d485649e-b239-4dad-ac2e-8ec5a756b504.sessiondomain.tld instead of maindomain.tld/g?sessiontoken=&entry=). 
       It is highly preferred because of: 
         - You do not need to find a way to send token of 'parent session' in any game requests, instead of changing API url to '/api/games/{TOKEN}/{GAMES}' and so on you can retain the original API syntax
         - You can retain the url segment syntax integrity of game provider much easier because you can resolve any subdirs to same location
         - Dynamic asset management just becomes much easier, let's say  you need to change something in a .js file that runs through this API based on the player id or even game, so for instance:
              -  https://d485649e-b239-4dad-ac2e-8ec5a756b504.sessiondomain.tld/dynamic_asset/game.js
              -  https://1aa84430-5b8d-4fa7-9d90-858563135e71.sessiondomain.tld/dynamic_asset/game.js
              These urls ^ will look same to player (as in same static asset) while you can load ofcourse totally different .js easily based on the parent token in the subdomain.

        Same goes for storing 'session' information inside of .js through dynamic_asset(), you could even do RTP rules storage within .js based on operator ID or any other data that you store inside parent_sessions.

       Make sure to setup a very high block rate on '404' errors to prevent any "bruteforce" of session domains.
       All you need is a domain with wildcard SSL certificates and wildcard A record (*.sessiondomain.tld) pointing towards '/wildcard' of wherever you host this main API package, by nginx proxy

       Some providers delivered stock/default will require this setup, it will be noted within the documentation if you can use without use of wildcard session domains.
    */
    'wildcard_session_domain' => [
      'domain' => '.d777.dog', // use .DOMAIN.TLD syntax, for example: .777.dog when generating session will become https://d485649e-b239-4dad-ac2e-8ec5a756b504.777.dog
    ],

    'urlscan_apikey' => '98a289d6-c886-446d-898f-9f99e352b850', // apikey is free for 5K reques ts per day at urlscan.io


    /* Used retrieving and then storing game thumbnails on S3*/
    's3_image_store' => [
      'disk' => 'minio', // this "disk" should be available within config/filesystems.php & should be using the "s3" driver within filesystem
      'image_source_url' => 'https://cdn.softswiss.net/i/s3/', // image url prefix
      'fallback_image_source' => 'https://cdn.softswiss.net/i/s3/', // used when image url not set direct linking
    ],

    'cors_anywhere' => 'https://cors-4.herokuapp.com/',

    'wainwright_proxy' => [
      'get_demolink' => 1, // set to 1 if wanting to use proxy through cors_anywhere url
      'get_gamelist' => 1, // set to 1 if wanting to use proxy through cors_anywhere url
    ],

    'games' => [
      'bgaming' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/bgaming/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Bgaming\BgamingMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 1,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all routes access
      ],
      'wainwright' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/wainwright/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Wainwright\WainwrightMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 1,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all routes access
      ],
      'pragmaticplay' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/pragmaticplay/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\PragmaticPlay\PragmaticPlayMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 1,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all routes access
      ],
      'mascot' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/mascot/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Mascot\MascotMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 1,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all routes access
      ],
      'isoftbet' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/isoftbet/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\iSoftbet\iSoftbetMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all routes access
      ],
      'platipus' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/platipus/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Platipus\PlatipusMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 1,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'hacksaw' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/hacksaw/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Hacksaw\HacksawMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'redirect', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'netent' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/netent/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Netent\NetentMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 1, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'redirect', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'nolimitcity' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/nolimitcity/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Nolimitcity\NolimitcityMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'bsg' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/betsoft/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Betsoft\BetsoftMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'betsoft' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/betsoft/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Betsoft\BetsoftMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      '3oaks' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/3oaks/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Oaks\OaksMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'quickspin' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/quickspin/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Quickspin\QuickspinMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'uranus-quickspin' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/quickspin/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Quickspin\QuickspinMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'spinomenal' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/spinomenal/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Spinomenal\SpinomenalMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'stakelogic' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/stakelogic/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Stakelogic\StakelogicMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'relax' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/relaxgaming/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Relaxgaming\RelaxgamingMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'kalamba-games' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/relaxgaming/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Relaxgaming\RelaxgamingMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'relax-big-time-gaming' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/relaxgaming/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Relaxgaming\RelaxgamingMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'relax-apollo' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/relaxgaming/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Relaxgaming\RelaxgamingMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'relax-gaming-realms' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/relaxgaming/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Relaxgaming\RelaxgamingMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'relaxgaming' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/relaxgaming/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Relaxgaming\RelaxgamingMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'habanero' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/habanero/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Habanero\HabaneroMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'playson' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/playson/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Playson\PlaysonMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'yggdrasil' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/yggdrasil/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Yggdrasil\YggdrasilMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'redtiger' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/redtiger/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\RedTiger\RedTigerMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 0,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],
      'playngo' => [
        'new_api_endpoint' => env('APP_URL').'/api/games/playngo/',
        'controller' => \Wainwright\CasinoDog\Controllers\Game\Playngo\PlayngoMain::class,
        'extra_game_metadata' => 0,
        'fake_iframe_url' => 0,
        'demolink_retrieval_method' => 0, // customize the demo link retrieval used on datacontroller, if set to 1 you will need'demolink_retrieval_method () in your Main class
        'custom_entry_path' => 1,
        'launcher_behaviour' => 'internal_game', // 'internal_game' or 'redirect' - expecting url on 'redirect' on SessionsHandler::requestSession()
        'active' => 1, //set to 0 to immediate cease all access on routes
      ],

    ],


    ];
