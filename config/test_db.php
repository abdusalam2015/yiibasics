<?php
$db = require __DIR__ . '/db.php';
// test database! Important not to run tests on production or development databases
$db['dsn'] = 'mysql:host=us-cdbr-iron-east-04.cleardb.net;dbname=heroku_863ef3af3f86ae3';

return $db;
