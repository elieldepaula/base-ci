<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('wpn_asset'))
{
    /**
     * Esta função retorna o código de inclusão de umas
     * biblioteca CSS ou Java-Script. 
     *
     * @param $type string Type of library, CSS, JS or Custom.
     * @param $filename string File name to be included.
     * @return String 
     */
    function wpn_asset($type, $filename)
    {
        switch ($type) {
            case 'css':
                return "<link href=\"".base_url('assets/css/'.$filename)."\" rel=\"stylesheet\">\n";
                break;
            case 'js':
                return "<script src=\"".base_url('assets/js/'.$filename)."\" type=\"text/javascript\"></script>\n";
                break;
            case 'custom':
                return $filename;
                break;
        }
    }
}

if(!function_exists('wpn_widget'))
{

    /**
     * Return a Widget Module. In fact, this is a shortcut to
     * the method $this->widget->runit();
     *
     * @param $widget_name string Widget name.
     * @param $args array Widget parammeters.
     * @return mixed 
     */
    function wpn_widget($widget_name, $args = [])
    {
        $CI =& get_instance();
        return $CI->widget->runit($widget_name, $args);
    }
}

if(!function_exists('wpn_fakelink'))
{

    /**
    * This produces a link based on the string $var
    *
    * @return string
    */
    function wpn_fakelink($var)
    {
        return strtolower(url_title(convert_accented_characters($var)));
    }
}

if(!function_exists('wpn_lang'))
{

    /**
     * Return a config item from config.json.
     *
     * @param $item mixed Config item.
     * @return mixed 
     */
    function wpn_lang($key, $default, $file = 'wpn_common')
    {
        $CI =& get_instance();
        
        $idiom = wpn_config('language');
        
        if(isset($file))
            $CI->lang->load($file, $idiom);

        $line = $CI->lang->line($key, false);
        if($line)
            return $line;
        else
            return $default;
    }
}