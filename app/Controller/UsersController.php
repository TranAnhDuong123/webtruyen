<?php
class UsersController extends AppController
{
    var $uses = array('User');
    var $layout = "admin";
    public function beforeFilter(){
        parent::beforeFilter();
    }

    public function admin_login(){
        if($this->request->is('post')){
            if($this->Auth->login()){
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Session->setFlash('Username hoặc pass sai');
            }
        }
    }

    public function admin_logout(){
        $this->redirect($this->Auth->logout());
    }
}