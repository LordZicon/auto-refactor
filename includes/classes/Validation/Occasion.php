<?php

class Validation_Occasion
{
    protected $errors = array();

    protected $required = array(
        'merk',
        'uitvoering',
        'model',
        'transmissie',
        'brandstof',
        'kleur',
        'maand',
        'jaar',
        'kilometerstand',
        'vervaldatum',
        'prijs',
    );

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function validate()
    {
        $args = array(
            'merk'           => FILTER_SANITIZE_NUMBER_INT,
            'uitvoering'     => FILTER_SANITIZE_STRING,
            'model'          => FILTER_SANITIZE_NUMBER_INT,
            'deuren'         => FILTER_SANITIZE_STRING,
            'transmissie'    => FILTER_SANITIZE_NUMBER_INT,
            'vermogen'       => FILTER_SANITIZE_STRING,
            'cilinderinhoud' => FILTER_SANITIZE_NUMBER_INT,
            'cilinders'      => FILTER_SANITIZE_NUMBER_INT,
            'brandstof'      => FILTER_SANITIZE_NUMBER_INT,
            'verbruik'       => FILTER_SANITIZE_STRING,
            'gewicht'        => FILTER_SANITIZE_NUMBER_INT,
            'kleur'          => FILTER_SANITIZE_NUMBER_INT,
            'maand'          => FILTER_SANITIZE_STRING,
            'jaar'           => FILTER_SANITIZE_STRING,
            'kilometerstand' => FILTER_SANITIZE_NUMBER_INT,
            'vervaldatum'    => FILTER_SANITIZE_STRING,
            'prijs'          => FILTER_SANITIZE_NUMBER_INT,
            'details'        => FILTER_SANITIZE_STRING,
            'omschrijving'   => FILTER_SANITIZE_STRING,
        );

        $values = filter_var_array($this->post, $args);

        foreach ($this->required as $key) {
            if ( ! $values[$key]) $this->errors[$key] = 'cannot be empty';
        }

        return ($this->errors) ? false : $values;
    }

    public function getErrors()
    {
        return $this->errors;
    }
}