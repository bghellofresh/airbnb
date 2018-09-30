<?php
/**
 * @package AirBnb Calendar Sync
 * @version 0.0.1
 */
/*
Plugin Name: AirBnB Calendar Sync
Plugin URI: http://wordpress.org/plugins/airbnb-sync
Description: This plugin publishes to a rabbit queue each time a booking is completed.
Author: Brian Greenhill
Version: 0.0.1
Author URI: http://briancurtis.de
*/
require_once __DIR__ . '/vendor/autoload.php';

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

$connection = new AMQPStreamConnection("rabbit", "5672", "cabinscape", "cabinscape", "/");

\Greenhill\Airbnb\Plugin::register($connection->channel(), $hook = 'admin_notices');
