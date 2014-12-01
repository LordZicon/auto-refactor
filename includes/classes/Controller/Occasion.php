<?php

class Controller_Occasion extends Controller
{
    private $occasion;

    public function addAction() {}

    public function detailsAction($params)
    {
        $this->pageId = 8;
        $occasion_id  = $params['id'];

        $occasion = new Model_Occasion(Db::getInstance());
        $search   = new Model_Search(Db::getInstance());

        // Zoek Selects
        $searchValues = $search->get_widget_values();

        $data = array(
          'occasion_details' => $occasion->get_details($occasion_id),
          'occasion_photos'  => $occasion->get_photos($occasion_id),
          'update_status'    => $occasion->update_gezien_status($occasion_id),
        ) + $searchValues;

        $this->render('occasion_details', $data);
    }

    public function searchAction()
    {
        $this->pageId = 2;
        $occasion = new Model_Occasion(Db::getInstance());
        $search   = new Model_Search(Db::getInstance());

        $merk              = filter_input(INPUT_GET, 'merk', FILTER_SANITIZE_NUMBER_INT);
        $model             = filter_input(INPUT_GET, 'model', FILTER_SANITIZE_NUMBER_INT);
        $prijs             = filter_input(INPUT_GET, 'prijs', FILTER_SANITIZE_NUMBER_INT);
        $bouwjaar          = filter_input(INPUT_GET, 'bouwjaar', FILTER_SANITIZE_NUMBER_INT);
        $transmissie       = filter_input(INPUT_GET, 'transmissie', FILTER_SANITIZE_NUMBER_INT); 
        $brandstof         = filter_input(INPUT_GET, 'brandstof', FILTER_SANITIZE_NUMBER_INT);
        $kilometers        = filter_input(INPUT_GET, 'kilometers', FILTER_SANITIZE_NUMBER_INT);
        $kleur             = filter_input(INPUT_GET, 'kleur', FILTER_SANITIZE_NUMBER_INT); 

        $zoek_resultaten = $occasion->zoeken($merk,$model,$prijs,$bouwjaar,$transmissie,$brandstof,
            $kilometers,$kleur); 

        // Zoek Selects
        $searchValues   = $search->get_widget_values();

        $this->render('zoeken', compact('zoek_resultaten') + $searchValues);
    }
}