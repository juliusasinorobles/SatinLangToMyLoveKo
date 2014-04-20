<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of random_code_validator
 *
 * @author jtan
 */
class image_generator {

    public $no_of_chars = 5;
    
    public function generate()
    {
        header("Content-type: image/png");

        $textToConvert = decrypt($_GET['id']);
        $font = 24;
        $width = ImageFontWidth($font) * strlen($textToConvert);
        $height = ImageFontHeight($font);
        $im = @imagecreate($width, $height);
        imagecolorallocate($im, 50, 50, 50); //this means it's white bg
        $text_color = imagecolorallocate($im, 225, 225, 225); //and of course black text
        imagestring($im, $font, 0, 0, $textToConvert, $text_color);

        imagepng($im);
    }

    private function _randomize()
    {
        $keys = array('ABCDEFGHIJKLMNOPQRSTUVWXYZ', 'abcdefghijklmnopqrstuvwxyz', '1234567890');

        $set = rand(0, 2);

        $chars = $keys[$set];

        $set_count = strlen($chars) - 1;

        $chars_arr = array();

        for ($i = 0; $i <= $set_count; $i++)
        {
            $chars_arr[] = substr($chars, $i, 1);
        }

        $n = rand(0, $set_count);

        return $chars_arr[$n];
    }
    
    public function populate()
    {
        $value = array();

        for ($i = 0; $i <= $this->no_of_chars; $i++)
        {
            $value[] = $this->_randomize();
        }
        
        return implode('', $value);
    }

}

?>
