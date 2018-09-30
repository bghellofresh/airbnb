<?php
namespace Greenhill\Airbnb;

use PhpAmqpLib\Channel\AMQPChannel;
use PhpAmqpLib\Message\AMQPMessage;

class Plugin
{
    private const EXCHANGE = 'cabinscape';
    private const QUEUE = 'cabinscape_bookings';

    /** @var AMQPChannel */
    private $channel;

    private function __construct(AMQPChannel $channel, string $hook)
    {
        $this->channel = $channel;
        add_action($hook, [$this, 'publishBookingMessage']);
    }

    public static function register(AMQPChannel $channel, string $hook)
    {
        $channel->queue_declare(self::QUEUE, false, true, false, false);
        $channel->exchange_declare(self::EXCHANGE, 'direct', false, true, false);
        $channel->queue_bind(self::QUEUE, self::EXCHANGE);
        new self($channel, $hook);
    }

    public function publishBookingMessage()
    {
        $messageBody = '{"message": "Cabinscape booking registered"}';
        $message = new AMQPMessage($messageBody, array('content_type' => 'text/plain', 'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT));
        $this->channel->basic_publish($message, self::EXCHANGE);
        $this->close();
    }

    private function close()
    {
        $this->channel->close();
    }
}
