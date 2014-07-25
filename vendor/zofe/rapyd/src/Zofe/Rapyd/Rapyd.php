<?php namespace Zofe\Rapyd;

use Illuminate\Container\Container;
use Illuminate\Support\Facades\HTML;

class Rapyd
{

    protected static $container;
    protected static $js = array();
    protected static $css = array();
    protected static $scripts = array();
    protected static $styles = array();
    
    /**
     * Bind a Container to Rapyd
     *
     * @param Container $container
     */
    public static function setContainer(Container $container)
    {
        static::$container = $container;
    }

    /**
     * Get the Container from Rapyd
     *
     * @param string $make A dependency to make on the fly
     * @return Container
     */
    public static function getContainer($make = null)
    {
        if ($make) {
            return static::$container->make($make);
        }

        return static::$container;
    }

    public static function head()
    {
        $buffer = "\n";

        //css links
        foreach (self::$css as $item) {
            $buffer .= HTML::style($item);
        }
        //js links
        foreach (self::$js as $item) {
            $buffer .= HTML::script($item);
        }
        
        //inline styles & scripts
        if (count(self::$styles)) {
            $buffer .= sprintf("<style type=\"text/css\">\n%s\n</style>", implode("\n", self::$styles));
        }
        if (count(self::$scripts)) {
            $buffer .= sprintf("\n<script language=\"javascript\" type=\"text/javascript\">\n\$(document).ready(function() {\n\n %s \n\n});\n</script>\n", implode("\n", self::$scripts));
        }
        return $buffer;
    }

    public static function scripts()
    {
        $buffer = "\n";
        
        //js links
        foreach (self::$js as $item) {
            $buffer .= HTML::script($item);
        }

        //inline scripts
        if (count(self::$scripts)) {
            $buffer .= sprintf("\n<script language=\"javascript\" type=\"text/javascript\">\n\$(document).ready(function() {\n\n %s \n\n});\n\n</script>\n", implode("\n", self::$scripts));
        }
        return $buffer;
    }

    public static function styles()
    {
        $buffer = "\n";

        //css links
        foreach (self::$css as $item) {
            $buffer .= HTML::style($item);
        }

        //inline styles
        if (count(self::$styles)) {
            $buffer .= sprintf("<style type=\"text/css\">\n%s\n</style>", implode("\n", self::$styles));
        }
        return $buffer;
    }
    
    public static function js($js)
    {
        if (!in_array('packages/zofe/rapyd/assets/'.$js, self::$js))
            self::$js[] = 'packages/zofe/rapyd/assets/'.$js;
    }

    public static function css($css)
    {
        if (!in_array('packages/zofe/rapyd/assets/'.$css, self::$css))
            self::$css[] = 'packages/zofe/rapyd/assets/'.$css;
    }

    public static function script($script)
    {
        self::$scripts[] = $script;
    }

    public static function style($style)
    {
        self::$styles[] = $style;
    }

}