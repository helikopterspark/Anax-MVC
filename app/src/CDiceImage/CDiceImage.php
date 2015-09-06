<?php

/**
 * A dice with images as graphical representation
 *
 */
namespace CR\CDiceImage;

class CDiceImage extends \CR\CDice\CDice {

    /**
     * Properties
     *
     */
    const FACES = 6;

    /**
     * Constructor
     *
     */
    public function __construct() {
        parent::__construct(self::FACES);
    }

    /**
     * Get the rolls as a series of images
     *
     */
    public function GetRollsAsImageList() {
        $html = "<ul class='dice'>";
        foreach ($this->rolls as $value) {
            $html .= "<li class='dice-{$value}'></li>";
        }
        $html .= "</ul>";
        return $html;
    }

}
