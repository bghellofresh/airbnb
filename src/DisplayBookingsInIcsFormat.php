<?php declare(strict_types=1);
namespace Greenhill\Airbnb;

class DisplayBookingsInIcsFormat {
    public function perform():string
    {
        global $wpdb;
        $table = $wpdb->prefix . 'nd_booking_booking';
        $bookings = $wpdb->get_results("SELECT date_from, date_to, id, id_post FROM $table");
        $results = "BEGIN:VCALENDAR\nVERSION:2.0\nPRODID:cabinscape\n";
        foreach($bookings as $booking) {
            $results .= Booking::icsFormat($booking);
        }
        $results .= "END:VCALENDAR\n";
        return $results;
    }
}
