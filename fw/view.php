<?php

// fw/view.php

abstract class view
{
    public function render()
    {
        include '../html/' . get_class($this) . '.php';
    }
}
