<?php

namespace App;

class View
{
    /**
     * @param $template
     */
    public function display($template)
    {
        echo $this->render($template);
    }

    /**
     * @param $template
     * @return string
     */
    public function render($template)
    {
        ob_start();
        include $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}