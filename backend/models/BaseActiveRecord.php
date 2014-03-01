<?php
class BaseActiveRecord extends CActiveRecord {
	public function behaviors() {
		return array (
				'CTimestampBehavior' => array (
						'class' => 'zii.behaviors.CTimestampBehavior',
						'createAttribute' => 'created_time',
						'updateAttribute' => 'updated_time',
						'setUpdateOnCreate' => true 
				),
				'BlameableBehavior' => array (
						'class' => 'common.extensions.behaviors.BlameableBehavior',
						'createdByColumn' => 'created_id', // optional
						'updatedByColumn' => 'modified_id'  // optional
								) 
		);
	}
	/**
	 * 检查字段的值是否在Lookup的特定列表中
	 *
	 */
	public function checkLookupValue($attribute,$params)
	{
		$item=Lookup::items($params['type']);
		if(!isset($item[$this->$attribute]))
			$this->addError($attribute,$params['errorText']);
	}
}