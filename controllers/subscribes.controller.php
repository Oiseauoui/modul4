
<?php

class SubscribesController extends Controller
{

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new Subscribe();
    }

     public function subscribe()
    {
        if ($_POST && isset($_POST['login']) && isset($_POST['email'])) {
            $new_subscribe = $this->model->addSubscribe($_POST);
            if ($new_subscribe) {
            }
            Router::redirect('/');
        }
    }
}