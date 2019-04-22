<?php





class DomainController extends MController
{
    public function main()
    {
        $this->data->query = Manager::getAppURL('', 'admin/domain/gridData');
        $this->data->save = "@admin/domain/save/";
        $this->render();
    }
    
    public function gridData()
    {
        $model = new fnbr\models\Domain();
        $criteria = $model->listByFilter($this->data->filter);
        $this->renderJSON($model->gridDataAsJSON($criteria));
    }

    public function formData()
    {
        $model = new fnbr\models\Domain($this->data->id);
        $this->data = $model->getData('domain');
        $this->renderJSON(json_encode($this->data));
    }

    public function formObject()
    {
        $model = new fnbr\models\Domain($this->data->id);
        $this->data->forUpdate = ($this->data->id != '');
        $this->data->object = $model->getData();
        $this->data->title = $this->data->forUpdate ? $model->getDescription() : _M("new fnbr\models\Domain");
        $this->data->save = "@admin/domain/save/" . $model->getId() . '|formObject';
        $this->data->delete = "@admin/domain/delete/" . $model->getId() . '|formObject';
        $this->render();
    }

    public function save()
    {
        try {
            $model = new fnbr\models\Domain();
            $this->data->domain->entry = 'dom_' . str_replace('dom_','', $this->data->domain->entry);
            $model->setData($this->data->domain);
            //$model->save();
            $this->renderPrompt('information', 'OK', "editEntry('{$this->data->domain->entry}');");
        } catch (\Exception $e) {
            $this->renderPrompt('error', $e->getMessage());
        }
    }

    public function saveFrameDomain() {
        try {
            $structure = Manager::getAppService('structuredomain');
            $structure->saveFrameDomain($this->data->idFrame, $this->data->toSave);
            $this->renderPrompt('information', "Ok","$('#{$this->data->idGrid}').datagrid('reload');");
        } catch (\Exception $e) {
            $this->renderPrompt('error', $e->getMessage());
        }
    }

}
