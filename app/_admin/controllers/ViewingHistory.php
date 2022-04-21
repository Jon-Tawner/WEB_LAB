<?php

namespace  app\_admin\controllers;

use app\core\Controller;

class ViewingHistory extends Controller {

    public function show_Action() {
        $lenPage = 5;
        $vars = array();

        $vars["page"] = isset($_GET["page"]) ? $this->setPage($_GET["page"], $lenPage) : 1;
        $firsElementPage = ($vars["page"] - 1) * $lenPage;

        $vars['reсords'] = $this->model->getRecords($firsElementPage, $lenPage, "ORDER BY date DESC");

        $this->view->render('История просмотров', $vars);
    }

    public function setPage($pageIn, $lenPage) {
        $countRecords = $this->model->getCount() - 1;
        $countPages = ceil($countRecords / $lenPage);
        if ($pageIn <= $countPages && $pageIn > 0)
            $pageOut = $pageIn;
        elseif ($pageIn > $countPages)
            $pageOut = $countPages;
        else
            $pageOut = 1;

        return $pageOut;
    }
}
