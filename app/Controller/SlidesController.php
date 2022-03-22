<?php
class SlidesController extends AppController{
    var $layout = 'admin';
    var $uses = array('Slide');
    var $helpers = array('Session', 'Paginator');
    var $paginate = array();
    public function beforeFilter()
    {
        parent::beforeFilter();
    }

    public function admin_index(){
        $this->paginate = array(
            'order' => array('id' => 'desc'),
            'recursive' => -1
        );
        $data = $this->paginate("Slide");
        $this->set('data', $data);
    }

    public function admin_add(){
        $error = array();
        if($this->request->is('post')){
            $arrParams = $this->data['Slide']; //Lay du lieu sau khi submit
            if($arrParams['link'] == null){
                $error['link'] = 'Link anh khong duoc rong';
            }
            if(empty($this->data['Slide']['image']['name'])){
                $error['image'] = 'Vui long chon anh';
            }
            if(!empty($this->data['Slide']['image']['name'])){
                $file = $this->data['Slide']['image'];
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                if(in_array($ext, $arr_ext)){
                    $fla = 1;
                }
                else{
                    $error['image'] = 'Hình ảnh chỉ có thể có định dạng là jpg, jpeg, gif';
                }
            }
            if(empty($error)){
                $arrParams['active'] = 1;
                if($this->Slide->save($arrParams)){
                    if(!empty($fla)){
                        $file_name = $this->Slide->id.'.jpg';
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . IMG_DIR . DS . SLIDE_DIR . DS . $file_name);
                    }
                }
                $this->Session->setFlash('Them thanh cong','default', array('class' => "alert alert-success"));
                $this->redirect(array('action' => 'index'));
            }
            $this->set("error", $error);
        }
    }
    
    public function admin_edit($id){
        $error = array();
        $detail = $this->Slide->find('first', array(
            'conditions' => array('id = '.$id),
            'recursive' => -1
        ));
        $this->set('detail', $detail);
        if($this->request->is('post')){
            $arrParams = $this->data['Slide'];//du lieu sau khi submit
            if($arrParams['link'] == null){
                $error['link'] = 'Link ảnh không được rỗng';
            }
            if(!empty($this->data['Slide']['image']['name'])){
                $file = $this->data['Slide']['image'];
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                $arr_ext = array('jpg', 'jpeg', 'gif', 'png');
                if(in_array($ext, $arr_ext)){
                    $fla = 1;
                }
                else{
                    $error['image'] = 'Hình ảnh chỉ có thể có định dạng là jpg, jpeg, gif';
                }
            }
            if(empty($error)){
                $arrParams['id'] = $id;
                if($this->Slide->save($arrParams)){
                    if(!empty($fla)){
                        $file_name = $this->Slide->id.'.jpg';
                        move_uploaded_file($file['tmp_name'], WWW_ROOT . IMG_DIR . DS . SLIDE_DIR . DS . $file_name);
                    }
                }
                $this->Session->setFlash('Cap nhat thanh cong', 'default', array('class' => "alert alert-success"));
                $this->redirect(array('action' => 'index'));
            }
            $this->set("error",$error);
        }
    }

    public function admin_delete($id = null){
        if($this->request->is('get')){
            $data = $this->Slide->find('first', array(
                'conditions' => array('id = '.$id)
            ));
            if(!empty($data)){
                $this->Slide->delete($id);
                $file_name = $id.'.jpg';
                @unlink(WWW_ROOT . IMG_DIR . DS . SLIDE_DIR . DS .$file_name);
                $this->Session->setFlash('Success','default', array('class' => "alert alert-success"));
            }
            else{
                $this->Session->setFlash('Error','default', array('class' => "alert alert-success"));
            }
            $this->redirect(array('action' => 'list'));
        }
    }
}

?>