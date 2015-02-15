<?php
include('inc.php');

$autoload = require('./../ORMLike/Autoload.php');
$autoload->register();

use \ORMLike\Database as Database;
use \ORMLike\Configuration as Configuration;

/*** single ***/

$cfg = [
    'agent' => 'mysqli',
    'database' => [
        'fetch_type' => 'object',
        'charset'    => 'utf8',
        'timezone'   => '+00:00',
        'host'       => 'localhost',
        'name'       => 'test',
        'username'   => 'test',
        'password'   => '********',
        // 'connect_options' => ['mysqli_opt_connect_timeout' => 3],
    ]
];

$db = Database\Factory::build(new Configuration($cfg));
$db->connect();
// pre($db);

$result = $db->getConnection()->getAgent()->query("SELECT 1 AS one");
pre($result);

// pre($result->count());

foreach ($result as $row) {
    pre("row->one = {$row->one}");
}
