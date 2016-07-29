<?php
class Controller{
    public function model($model) {
        require_once "../project_MVC/models/mysql_getdata.php";
        require_once "../project_MVC/models/$model.php";
        
        return new $model ();
    }
    
    public function view($view, $data = Array()) {
        require_once "../project_MVC/views/$view.php";
        
    }
    
    
    
    
    
    
}

?>
