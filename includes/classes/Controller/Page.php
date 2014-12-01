<?php

class Controller_Page extends Controller
{
    public function indexAction()
    {
        $this->pageId = 1; 
        $occasion = new Model_Occasion(Db::getInstance());
        $search   = new Model_Search(Db::getInstance());

        // Zoek Selects
        $searchValues   = $search->get_widget_values();
        $featured_autos = $occasion->get_featured();

        $this->render('index', compact('featured_autos') + $searchValues);
    }

    public function amissAction()
    {
        require_once(__DIR__.'/../../../vendor/amiss/src/Amiss.php');
        Amiss::register();

        // This is basically a PDO with a bit of extra niceness. You should use it instead
        // of PDO in your own code
        $connector = new Amiss\Sql\Connector('mysql:host=127.0.0.1;dbname=autopasson_db', 'root', 'root');

        // This will create a SQL manager using the default configuration (note mapper, default types
        // and relators, no cache)
        $manager = Amiss::createSqlManager($connector);

        // Configure the default mapper
        //$manager->mapper->objectNamespace = '\\';

        $car = $manager->getById('Occasion', 11);
        echo $car->uitvoering;
    }
}

/**
 * Explicit table name annotation. Leave this out and the table will default to 'venue'
 * @table occasions
 */
class Occasion
{
    /**
     * @primary
     * @type autoinc
     */
    public $occasion_id;

    /** @field */
    public $merk_id;

    /** @field */
    public $model_id;

    /** @field */
    public $brandstof_type_id;

    /** @field */
    public $transmissie_id;

    /** @field */
    public $kleur_id;

    /** @field */
    public $uitvoering;

    /** @field */
    public $bouwjaar;

    /** @field */
    public $kilometerstand;

    /** @field */
    public $vermogen;

    /** @field */
    public $verbruik;

    /** @field */
    public $gewicht;

    /** @field */
    public $prijs;

    /** @field */
    public $vervaldatum;

    /** @field */
    public $cilinderinhoud;

    /** @field */
    public $cilinders;

    /** @field */
    public $deuren;

    /** @field */
    public $details;

    /** @field */
    public $omschrijving;

    /** @field */
    public $ingevoerd;

    /** @field */
    public $isGezien;

}