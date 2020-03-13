<?php


class StructureConstraintInstanceService extends MService
{
    public function listConstraintsFE($idFrameElement)
    {
        $result = [];
        $fe = new App\Models\FrameElement($idFrameElement);
        $constraints = $fe->listConstraints();
        mdump($constraints);
        foreach ($constraints as $constraint) {
            $node = [];
            $node['id'] = 'x' . strtolower($constraint['type']) . '_' . $fe->getIdEntity() . '_' . $constraint['idConstraint'];
            $node['text'] = $constraint['name'];
            $node['state'] = 'closed';
            $node['iconCls'] = 'icon-blank fa-icon fa fa-crosshairs';
            $result[] = $node;
        }
        return json_encode($result);
    }

    public function listConstraintsLU($idLU)
    {
        $result = [];
        $lu = new App\Models\LU($idLU);
        $constraints = $lu->listConstraints();
        foreach ($constraints as $constraint) {
            $node = [];
            $node['id'] = 'y' . $lu->getIdEntity() . '_' . $constraint['idConstraint'];
            $node['text'] = $constraint['name'];
            $node['state'] = 'closed';
            $node['iconCls'] = 'icon-blank fa-icon fa fa-crosshairs';
            $result[] = $node;
        }
        return $result;
    }

    public function listConstraintsCE($idConstructionElement)
    {
        $result = [];
        $ce = new App\Models\ConstructionElement($idConstructionElement);
        $constraints = $ce->listConstraints();
        mdump($constraints);
        foreach ($constraints as $constraint) {
            $node = [];
            $node['id'] = 'x' . $constraint['idConstraint'];
            $node['text'] = $constraint['name'];
            $node['state'] = 'closed';
            $node['iconCls'] = 'icon-blank fa-icon fa fa-crosshairs';
            $result[] = $node;
        }
        return json_encode($result);
    }

    public function listConstraintsCN($idConstraint)
    {
        $result = [];
        $constraint = new App\Models\ConstraintInstance($idConstraint);
        $constraints = $constraint->listConstraints();
        foreach ($constraints as $constraint) {
            $node = [];
            $node['id'] = 'x' . $constraint['idConstraint'];
            $node['text'] = $constraint['name'];
            $node['state'] = 'closed';
            $node['iconCls'] = 'icon-blank fa-icon fa fa-crosshairs';
            $result[] = $node;
        }
        return json_encode($result);
    }

    public function listConstraintsCNCN($idConstraint)
    {
        $result = [];
        $constraint = new App\Models\ConstraintInstance($idConstraint);
        $constraints = $constraint->listConstraintsCN();
        foreach ($constraints as $constraint) {
            $node = [];
            $node['id'] = 'z' . $constraint['idConstraint'];
            $node['text'] = $constraint['name'];
            $node['state'] = 'closed';
            $node['iconCls'] = 'icon-blank fa-icon fa fa-crosshairs';
            $result[] = $node;
        }
        return json_encode($result);
    }

    public function listConstraintsCX($idCxn)
    {
        $result = [];
        $cxn = new App\Models\Construction($idCxn);
        $constraints = $cxn->listConstraints();
        mdump($constraints);
        foreach ($constraints as $constraint) {
            $node = [];
            $node['id'] = 'n' . $constraint['idConstraint'];
            $node['text'] = $constraint['name'];
            $node['state'] = 'closed';
            $node['iconCls'] = 'icon-blank fa-icon fa fa-crosshairs';
            $result[] = $node;
        }
        return json_encode($result);
    }

    public function listEvokesCX($idCxn)
    {
        $result = [];
        $cxn = new App\Models\Construction($idCxn);
        $evokes = $cxn->listEvokesRelations();
        foreach($evokes as $evoke) {
            foreach ($evoke as $evk) {
                $node = [];
                $node['id'] = 'v' . $evk['idEntity'];
                $node['text'] = 'evk_' . $evk['name'];
                $node['state'] = 'closed';
                $node['iconCls'] = 'icon-blank fa-icon fa fa-crosshairs';
                $result[] = $node;
            }
        }
        return json_encode($result);
    }

    public function listEvokesCE($idCE)
    {
        $result = [];
        $ce = new App\Models\ConstructionElement($idCE);
        $evokes = $ce->listEvokesRelations();
        foreach($evokes as $evoke) {
            foreach ($evoke as $evk) {
                $node = [];
                $node['id'] = 'v' . $evk['idEntity'];
                $node['text'] = 'evk_' . $evk['name'];
                $node['state'] = 'closed';
                $node['iconCls'] = 'icon-blank fa-icon fa fa-crosshairs';
                $result[] = $node;
            }
        }
        return json_encode($result);
    }

    public function constraintHasChild($idConstraintInstance)
    {
        $constraint = new App\Models\ViewConstraint();
        return $constraint->hasChild($idConstraintInstance);
    }

}
