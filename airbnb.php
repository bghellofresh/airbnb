<?php
/**
 * @package AirBnb Calendar Sync
 * @version 0.0.1
 */
/*
Plugin Name: AirBnB Calendar Sync
Plugin URI: http://wordpress.org/plugins/airbnb-sync
Description: Create a page with title airbnb.ics. This plugin then exposes an ics endpoint for consumption by airbnb's calendar.
Author: Brian Greenhill
Version: 0.0.1
Author URI: http://briancurtis.de
*/
require_once __DIR__ . '/vendor/autoload.php';

\Greenhill\Airbnb\Plugin::register($hook = 'nd_booking_reservation_added_in_db');
