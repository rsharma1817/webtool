<?php

class DomainController extends MController
{
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
        $this->renderJSON($this->data);
    }

    public function save()
    {
        try {
            $model = new fnbr\models\Domain($this->data->domain->idDomain);
            $this->data->domain->entry = 'dom_' . str_replace('dom_', '', $this->data->domain->entry);
            $model->setData($this->data->domain);
            $model->save();
            $this->renderResponseSuccess('Domain updated.');
        } catch (\Exception $e) {
            $this->renderResponseError($e->getMessage());
        }
    }

    public function saveFrameDomain()
    {
        try {
            $structure = Manager::getAppService('structuredomain');
            $structure->saveFrameDomain($this->data->idFrame, $this->data->toSave);
            $this->renderResponseSuccess('Domain updated.');
        } catch (\Exception $e) {
            $this->renderResponseError($e->getMessage());
        }
    }

}
