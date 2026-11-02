<?php
// Front Controller - semua request masuk lewat sini
session_start();

require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/app/core/Database.php';
require_once __DIR__ . '/app/core/Controller.php';
require_once __DIR__ . '/app/core/App.php';

new App();
