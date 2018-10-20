<?php declare(strict_types=1);
namespace Greenhill\Airbnb;

class Booking
{
    public static function icsFormat(\stdClass $booking):string
    {
        $dateTo = (new \DateTimeImmutable($booking->date_to))->format('Ymd');
        $dateFrom = (new \DateTimeImmutable($booking->date_from))->format('Ymd');
        return sprintf(
            "BEGIN:VEVENT\nDTEND:%s\nDTSTART:%s\nSUMMARY:Booking from %s to %s cabin %s\nUID:%s\nEND:VEVENT\n",
            $dateTo,
            $dateFrom,
            $dateFrom,
            $dateTo,
            $booking->id_post,
            sha1($booking->id . $dateFrom . $dateTo)
        );
    }
}
