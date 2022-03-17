<?php
class StoriesController extends AppController{
    var $layout = 'admin';
    var $uses = array('Category', 'Story');
    public function beforeFilter()
    {
        parent::beforeFilter();
    }

    public function admin_list(){
        $this->set('title_for_layout', 'Story');
        $data = $this->Story->find('all', array(
            'conditions' => array('status' => 1),
            'order' => array('updated' => 'desc', 'Story.name' => 'asc'),
            'recursive' => 0
        ));
        $this->set('data', $data);
    }

    public function admin_delete($id = null){
        if($this->request->is('get')){
            $data = $this->Story->find('first', array(
                'conditions' => array('id = '.$id),
                'recursive' => -1
            ));
            if(!empty($data)){
                $this->Story->delete($id);
                @unlink(WWW_ROOT.'img'.DS.'stories'.DS.$id.'.jpg'); //đây là đoạn để xoá tấm ảnh, DS chính là dấu ‘/’ trong cakephp, dấu @ là để ẩn cảnh báo nếu không tồn tại ảnh, bạn không thích để @ thì hay kiểm tra file ảnh có tồn tại trong thư mục hay không rùi hãy xoá, mình thì dùng đơn giản ở trên thôi.
                $this->Session->setFlash('Success','default',array('class' => "alert alert-success"));
            }
            else{
                $this->Session->setFlash('Error','default',array('class' => "alert alert-success"));
            }
            $this->redirect('list');
        }
    }

    public function admin_add(){
        //Lấy dữ liệu thể loại truyện đang có để chọn
        $result = $this->Category->generateTreeList(null,null,null, "---");
        $this->set('result', $result);
        //mảng thông báo lỗi (cách này không dùng validate bên model)
        $error = array();
        if($this->request->is('post')){
            $arrParams = $this->data['Story'];
            //dữ liệu sau khi submit
            //kiểm tra lỗi
            if($arrParams['name'] == null){
                $error['name'] = 'Ten truyen khong the rong';
            }
            if(empty($arrParams['category_id'])){
                $error['category_id'] = 'Vui long chon the loai truyen';
            } 
            //Kiểm tra có thực hiện upload hình đại diện hay không
            if(!empty($this->data['Story']['upload']['name'])){
                $file = $this->data['Story']['upload'];
                $ext = substr(strtolower(strrchr($file['name'], '.')), 1);//lấy phần mở rộng của file
                $arr_ext = array('jpg', 'jpeg', 'gif'); //mảng các loại file được upload
                //chỉ những file thuộc mảng trên mới có quyền upload, còn lại sẽ thông báo
                if(in_array($ext, $arr_ext)){
                    $fla = 1; // biến xác định có tồn tại upload file
                }
                else{
                    $error['upload'] = 'Hình ảnh chỉ có thể có định dạng là jpg, jpeg, gif';
                }
            }
        }
    }
}
?>