<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

/**
 * Description of FormCommon
 *
 * @author MSI
 */
use PFBC\Element;
use Model\FormRender;

class FormCommon {

    static function Select($label, $name, $options, $properties) {
        return new FormRender(new Element\Select($label, $name, $options, $properties));
    }

}