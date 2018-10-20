<?php declare(strict_types=1);

use Greenhill\Airbnb\DisplayBookingsInIcsFormat;

header('Content-Type: text/plain; charset=utf-8');
echo (new DisplayBookingsInIcsFormat)->perform();
