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
    public function admin_list(){
        //Lay du lieu trong table users
        $array_user = $this->User->find('all', array(
            'conditions'=>array('id > 0'),
            'recursive'   =>-1
        ));
        //đưa dữ liệu lấy được qua view bằng biến users
        $this->set('users', $array_user);
    }
    public function admin_delete($id = null){
        if($this->request->is('get')){
            $data = $this->User->find('first', array(
                'fields' => array('id','name'),
                'conditions'=>array('id'=>$id),
                'recursive'=>-1
            ));
            if(!empty($data)){
                $this->Session->setFlash('Success');
                //$this->User->delete($id);
            }else{
                $this->Session->setFlash('Error');
            }
            $this->redirect(array('action'=>'list'));
        }
    }
}