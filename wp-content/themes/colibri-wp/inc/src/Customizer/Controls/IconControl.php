<?php


namespace ColibriWP\Theme\Customizer\Controls;


class IconControl extends VueControl {

    public $type = "colibri-icon";

    protected function printVueContent() {
        ?>
        <icon-picker :value="value" :icons="icons"></icon-picker>
        <?php
    }
}
