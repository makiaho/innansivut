<?php

someloader("some.application.controller");

class CrudController extends SomeController {
    
    public function display() {
        $this->thelist();
    }
    
    public function thelist() {
        $model = $this->getModel('list');
        $model->thelist();
        
        $view = $this->getView('list');
        $view->setModel($model);
        $view->thelist();
        
    }
    
     
      
    
    
    

    
    
    public function read() {
        $model = $this->getModel('crud');
        $model->read();
        
        $view = $this->getView('crud');
        $view->setModel($model);
        $view->read();
    }
    
    public function update() {
        // show form if GET or is this update POST?
        $httpMethod = SomeRequest::getString('REQUEST_METHOD','','SERVER'); 
        
        $model = $this->getModel('crud');
        
        if ($httpMethod === 'GET') {
            $model->read();
        } else {
            $model->update();
        };
        
        $view = $this->getView('crud');
        $view->setModel($model);
        
        
        if ($httpMethod === 'GET') { 
           $view->update();
        } else {
            $model = $this->getModel('list');
            $model->thelist();
            $view = $this->getView('list');
            $view->setModel($model);
            $view->thelist();
        }
        
       // $view->update();
    }
    
    public function create() {
        $model = $this->getModel('crud');
        $httpMethod = SomeRequest::getString('REQUEST_METHOD','','SERVER'); 
        
        $model = $this->getModel('crud');
        
        if ($httpMethod === 'GET') {
            $model->read();
        } else {
            $model->create();
            $frontController = SomeFactory::getApplication();
            $frontController->redirect("?app=crud&action=update&id=". $model->getId());
            // anything after redirect is not executed.
        }
        
        $view = $this->getView('crud');
        $view->setModel($model);
        $view->create();
    }
    
    public function askdelete() {
        $model = $this->getModel('crud');
        $model->askdelete();
        
        $view = $this->getView('crud');
        $view->setModel($model);
        $view->delete();
    }
    
    public function dodelete() {
        $model = $this->getModel('crud');
        $model->delete();
        
        $view = $this->getView('crud');
        $frontController = SomeFactory::getApplication();
        $frontController->redirect("?app=crud");
    }
    
}

