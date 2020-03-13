<?php


class StructureConstraintsService extends MService
{

    public function listConstraints($filter, $idLanguage)
    {
        $result = [];
        $cn = new App\Models\ConstraintType();
        $constraints = $cn->listByFilter($filter)->asQuery()->getResult(\FETCH_ASSOC);
        foreach ($constraints as $constraint) {
            $node = [];
            $node['id'] = 'c' . $constraint['idEntity'];
            $node['text'] = $constraint['name'];
            $node['state'] = 'closed';
            $node['iconCls'] = 'icon-blank fa-icon fa fa-crosshairs';
            $result[] = $node;
        }
        return $result;
    }

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
        $constraint = new App\Models\ConstraintType($idConstraint);
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
        $constraint = new App\Models\ConstraintType($idConstraint);
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

    public function constraintHasChild($idConstraint)
    {
        $constraint = new App\Models\ViewConstraint();
        return $constraint->hasChild($idConstraint);
    }

}
