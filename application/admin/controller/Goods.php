<?php
namespace app\admin\controller;
use think\Controller;
// use app\common\model;

class Goods extends Controller
{
    private $model;
    public function _initialize(){
        // $this->model = new Goods();   使用这种方式，突然内存占用过大，不知道为什么
    	$this->model = model('Goods');
    }

    public function show_list(){
        return $this->view->fetch();
    }

    /**
     * 添加商品
     */
    public function add(){
    	// 若是get方法，就返回商品添加页面add.html
    	if($this->request->isGet()){
    		return $this->view->fetch();
    	}

    	// 若是post方法，就处理提交的数据
    	if($this->request->isPost()){

            // 处理上传的商品图片
            $image = $this->upload_image();
            if($image['status']==0){
                $this->error($image['mesg']);
            }

    		$data = input('post.');
            $data['goods_big_logo'] = $image['path'];

            //数据验证
            $validate = validate('Goods');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->getError());
            }

            $res = $this->model->add($data);
            if($res){
                $this->success('添加商品成功', 'Goods/show_list','',1);
            }else{
                $this->error('添加商品失败', 'Goods/add','',1);
            }
    	}
    }

    /**
     * 处理上传的商品图片
     * @access private
     * @param 
     * @return array ['status'=>0|1, 'mesg'=>'string']
     */
    private function upload_image(){
        // 获取表单上传文件
        $file = request()->file('goods_big_logo');
        if(is_null($file)){
            return [
                'status' => 0,
                'mesg'   => '未上传图片'
            ];
        }

        // 移动到框架应用根目录下的public/uploads/goods目录下
        $info = $file->move(config('upload_goods_image'));
        if($info){
            return [
                'status' => 1,
                'path'   => $info->getSaveName()
            ];
        }else{
            // 上传失败返回相关信息
            return [
                'status' => 0,
                'mesg'   => $file->getError()
            ];
        }
    }

    public function update(){
        return $this->view->fetch();
    }

}
