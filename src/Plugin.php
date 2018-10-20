<?php declare(strict_types=1);
namespace Greenhill\Airbnb;

class Plugin
{
    private function __construct(string $hook)
    {
        add_filter( 'template_include', [$this, 'getTemplate'], 99 );
    }

    function getTemplate( $template ) {
        $file_name = 'CustomTemplate.php';

        if ( is_page( 'airbnb.ics' ) ) {
            if ( locate_template( $file_name ) ) {
                $template = locate_template( $file_name );
            } else {
                $template = dirname( __FILE__ ) . '/templates/' . $file_name;
            }
        }

        return $template;
    }

    public static function register(string $hook): self
    {
        return new self($hook);
    }
}
