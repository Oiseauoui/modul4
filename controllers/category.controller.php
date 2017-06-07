<?php
class CategoryController extends Controller
{
    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Newss();
    }

    public function list()
    {

        $params = App::getRoutes()->getParams();
        $page = 0;
        if (isset($_GET['pages'])) {
            $page = $_GET['pages'] - 1;
        }
        if (isset($params)) {
            $id = $params[0];
            $this->data['category'] = $this->model->getCategoryById($id, $page);
        } else {
            $this->data['category_list'] = $this->model->getCategoryList($page);
        }


        }
}

