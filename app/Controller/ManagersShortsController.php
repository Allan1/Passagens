<?php
App::uses('AppController', 'Controller');
/**
 * Shorts Controller
 *
 * @property ManagersShort $ManagersShort
 */
class ManagersShortsController extends AppController {

    public function delete($manager_id = null, $short_id = null) {
        if (!$this->request->is('post')) {
                throw new MethodNotAllowedException();
        }
        $result = ($this->ManagersShort->find('first',array('conditions'=>array('ManagersShort.short_id'=>$short_id,'ManagersShort.manager_id'=>$manager_id))));
        $this->ManagersShort->id = $result['ManagersShort']['id'];
        if($this->ManagersShort->delete())
            $this->Session->setFlash ('Relação deletada com sucesso','default',array('class'=>'success'));
        else
            $this->Session->setFlash ('Relação não pôde ser deletada');
        $this->redirect(array('controller'=>'shorts','action'=>'managers',$short_id));
    }
}
	
