<?php

namespace Hager\TransformationBundle\Service;

use Hager\TransformationBundle\Entity\ActionPlanItem;

class ActionPlanService
{
	public function newAction($data)
	{
		$actionPlanItem = new ActionPlanItem;
		$actionPlanItem->label = $label;
		return $actionPlanItem;
	}
}
