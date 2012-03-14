<?php

abstract class stk_toolbox_toolBase implements stk_toolbox_toolInterface
{
	protected $toolName;

	public function getName()
	{
		return $this->toolName;
	}
}
