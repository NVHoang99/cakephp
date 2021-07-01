<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

class UsersController extends AppController
{
    public function login()
    {
        if($this->request->is('post')){
            $user = $this->Auth->identify();
            
            if($user){
                $this->Auth->setUser($user);
                
                if($user['status'] == 0)
                {
                    $this->Flash->error("Bạn không có quyền được truy cập !");
                    return $this->redirect(['controller' => 'Users', 'action' => 'logout']);
                }

                return $this->redirect(['controller'=>'Users','action'=>'index']);
            }else {
                $this->Flash->error("Mật khẩu hoặc tài khoản của bạn không đúng !");
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function index()
    {
        $key = $this->request->getQuery('key');
        if($key){
            $query = $this->Users->findByUsernameOrEmail($key,$key);
        }else{
            $query = $this->Users;
        }
        $users = $this->paginate($query);

        $this->set(compact('users'));
    }

  
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }


    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if(!$user->getErrors){
                $image = $this->request->getData('image_file');

                $name  = $image->getClientFilename();

                if( !is_dir(WWW_ROOT.'img'.DS.'user-img') )
                mkdir(WWW_ROOT.'img'.DS.'user-img',0775);
                
                $targetPath = WWW_ROOT.'img'.DS.'user-img'.DS.$name;

                if($name)
                $image->moveTo($targetPath);
                
                $user->image = 'user-img/'.$name;
            }
            if ($this->Users->save($user)) {
                $this->Flash->success(__('tài khoản đã tạo thành công.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('không thể lưu được'));
        }
        $this->set(compact('user'));
    }


    public function edit($id = null)
    {
        $user = $this->Users->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if (!$user->getErrors) {
                $image = $this->request->getData('change_image');
  
                $name  = $image->getClientFilename();
                
                if ($name){
                    if (!is_dir(WWW_ROOT . 'img' . DS . 'user-img'))
                        mkdir(WWW_ROOT . 'img' . DS . 'user-img', 0775);

                    $targetPath = WWW_ROOT . 'img' . DS . 'user-img' . DS . $name;


                    $image->moveTo($targetPath);

                    $imgpath = WWW_ROOT . 'img' . DS . $user->image;
                    if (file_exists($imgpath)) {
                        unlink($imgpath);
                    }
                    
                    $user->image = 'user-img/' . $name;
                }

                
            }
        if ($this->Users->save($user)) {
            $this->Flash->success(__('tài khoản của bạn đã được lưu.'));

            return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('không thể lưu được tài khoản.'));
        }
        $this->set(compact('user'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);

        $imgpath = WWW_ROOT.'img'.DS.$user->image;
        
        if ($this->Users->delete($user)) {
            if( file_exists($imgpath) ){
                unlink($imgpath);
            }
            $this->Flash->success(__('tài khoản của bạn đã xóa.'));
        } else {
            $this->Flash->error(__('không thể xóa tài khoản.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function deleteAll(){
        $this->request->allowMethod(['post', 'delete']);
        $ids = $this->request->getData('ids');

        if($this->Users->deleteAll(['Users.id IN'=>$ids])){
            $this->Flash->success(__('Người dùng đã xóa.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function userStatus($id=null,$status)
    {
        $this->request->allowMethod(['post']);
        $user = $this->Users->get($id);
        
        if($status == 1 )
            $user->status = 0;
        else
            $user->status = 1;
        
        if($this->Users->save($user))
        {
            $this->Flash->success(__('người dùng đã thay đổi.'));
        }
        return $this->redirect(['action' => 'index']);
    }


}
