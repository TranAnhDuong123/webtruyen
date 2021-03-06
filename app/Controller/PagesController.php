<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	//public $uses = array();

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
    public $layout = "story";
    public $uses = array("Story","Category", "Chapter", "Slide");
    public $components = array('RequestHandler', 'Data');
    public $helpers = array('Js','Paginator','Html');
    var $paginate = array();
    public function beforeFilter()
    {
        parent::beforeFilter();
    }

	public function index() {
		//mới cập nhật
        $dataStoryUpdate = $this->Story->find('all', array(
            'conditions'=>array('status=1'),
            'order' => array('updated' => 'desc'),
            'limit'=>8,
            'recursive'=>-1
        ));
        $i = 1;
        $data = array();
        $item = array();
        $item_active = array();
        foreach($dataStoryUpdate as $row){
            if($i <= 4){
               $item_active[] = $row;
            }else{
               $item[] = $row; 
            }
            $i++;
        }
        $data = array(
            'item_active' 	=> $item_active,
            'item' 			=> $item
        );
        // pr($data);exit;
        $this->set('dataStoryNewUpdate', $data);
        
        //xem nhieu
        $dataStoryView = $this->Story->find('all', array(
            'conditions'=>array('status=1'),
            'order' => array('view' => 'desc'),
            'limit'=>8,
            'recursive'=>-1
        ));
        $i = 1;
        $data = array();
        $item = array();
        $item_active = array();
        foreach($dataStoryView as $row){
            if($i <= 4){
               $item_active[] = $row;
            }else{
               $item[] = $row; 
            }
            $i++;
        }
        $data = array(
            'item_active' 	=> $item_active,
            'item' 			=> $item
        );
        // pr($data);exit;
        $this->set('dataStoryView', $data);

        // $dataSlide = $this->Slide->find('all', array(
        //     'conditions'=>array('active=1'),
        //     'order' => array('id' => 'desc'),
        //     'limit'=>8,
        //     'recursive'=>-1
        // ));
        // $this->set('dataSlide', $dataSlide);
	}


	public function view_genre($id = null, $slug) {
		// echo $id; 
        // echo $slug;
        // exit();
        $data = array();
        //data category
        $dataGenre = $this->Category->find('first', array(
            'fields' => array('id', 'name','parent_id','description'),
            'conditions'=>array('id' => $id),
            'recursive'   =>-1
        ));
        $data["dataGenre"] = $dataGenre;
        $this->set('dataCategory', $dataGenre);
        $this->paginate = array(
            'fields' => array('id', 'name', 'updated', 'view'),
            'conditions' => array('status' => 1, 'category_id' => $id),
            'limit' => 6,
            'order' => array('id' => 'desc'),
            'resursive' => -1
        );
        $dataStory = $this->paginate("Story");
        $data['dataStory'] = $dataStory;
        $this->set('data', $data);
	}

    public function detail_story($slug, $id = null){
        $data = array();
        //chi tiết truyện
        $dataStory = $this->Story->find('first', array(
            'conditions'=>array('Story.id'=>$id, 'Story.status'=> 1),
            'recursive'=>0
        ));
        $data['dataStory'] = $dataStory;
        //Chi tiet chap mới nhất của truyện
        $dataChapterEnd = $this->Chapter->find('first', array(
            'conditions'=>array('Chapter.story_id'=>$id, 'Chapter.status'=> 1),
            'order' =>array('id'=>'DESC'),
            'recursive'=>-1
        ));
        $data['dataChapterEnd'] = $dataChapterEnd;
        //danh sach chapter
        $dataListChapter = $this->Chapter->find('all', array(
            'conditions'=>array('Chapter.story_id' => $id , 'Chapter.status'=> 1),
            'fields'    => array('name', 'id','created'),
            'order' =>array('id'=>'DESC'),
            'recursive'=>-1
        ));

        $data['dataListChapter'] = $dataListChapter;
        //truyện cùng thể loại
        $dataStoryCoincident = $this->Story->find('all', array(
            'conditions'=>array('id <>' => $id ,'status' => 1, "category_id"=> $dataStory["Story"]["category_id"]),
            'order' => array('updated' => 'desc'),
            'limit'=>8,
            'recursive'=>-1
        ));
        $i = 1;
        $dataTem = array();
        $item = array();
        $item_active = array();
        foreach($dataStoryCoincident as $row){
            if($i <= 4){
               $item_active[] = $row;
            }else{
               $item[] = $row; 
            }
            $i++;
        }
        $dataTem = array(
            'item_active'   => $item_active,
            'item'          => $item
        );
        $data['dataStoryCoincident'] = $dataTem;
        // pr($data);exit;
        $this->set('data', $data);
    }

    public function detail_chap($slug1,$slug2,$id = null){
        //chi tiet chapter
        $dataChapter = $this->Chapter->find('first', array(
            'conditions'=>array('Chapter.id' => $id),
            'recursive'=>-1
        ));
        $data['dataChapter'] = $dataChapter;
        //thong tin truyen
        $id_story = $dataChapter['Chapter']['story_id'];
        $dataStory = $this->Story->find('first', array(
            'conditions'=>array('Story.id'=>$id_story, 'Story.status'=> 1),
            'recursive'=>-1
        ));
        $data['dataStory'] = $dataStory;

        //Lấy tất cả các chapter cùng truyện
        $dataListChapter = $this->Chapter->find('all', array(
            'conditions'=>array('story_id' => $id_story),
            'fields'    => array('name', 'id'),
            'order' =>array('id'=>'DESC'),
            'recursive'=>-1
        ));
        $data['dataListChapter'] = $dataListChapter;

        //Lấy thông tin chương trước và chương sau:
        $field = "id";
        $value = $id;
        $neighbors = $this->Chapter->find(
            'neighbors',
            array(
                'fields'=>array('name', 'id'),
                'conditions'=>array('Chapter.story_id' => $id_story),
                'field' => $field, 
                'value' => $value
            )
        );
        $data['dataNeighbors'] = $neighbors;
        $this->set('data', $data);
    }

    public function upload(){

    }
    public function fileupload(){
        $this->layout = "ajax";
        App::import("Vendor", "UploadHandler", array("file"=> "file.upload/UploadHandler.php"));
        $options = array(
            'script_url' => Router::url(),
            'upload_dir' => IMG_DIR . DS . UPLOADS_DIR . DS,
            'upload_url' => Router::url("/". IMG_DIR . DS . UPLOADS_DIR . DS, true),
        );
        $upload_handler = new UploadHandler($options);
        switch ($_SERVER["REQUEST_METHOD"]) {
            case 'GET':
            case 'HEAD':
                $upload_handler->get();
                break;
            case 'POST':
                $upload_handler->post();
                break;
            case 'DELETE';
                $upload_handler->delete();
                break;
            default:
                $this->header('HTTP/1.1 405 Method Not Allowed');
                break;
        }
        exit;
    }
    public function delete(){
        $this->layout = "ajax";
        $this->autoRender = false;
        if($this->RequestHandler->isAjax()){
            $filename = $this->request->query['file'];
            @unlink(WWW_ROOT . IMG_DIR .DS . UPLOADS_DIR . DS .$filename);
            @unlink(WWW_ROOT . IMG_DIR .DS . UPLOADS_DIR . DS ."thumbnail". DS .$filename);
            $result = array("filename"=> $filename);
            return json_encode($result);
        }
    }

}
