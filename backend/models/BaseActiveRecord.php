<?php
class BaseActiveRecord extends CActiveRecord {
	public function behaviors() {
		return array (
				'CTimestampBehavior' => array (
						'class' => 'zii.behaviors.CTimestampBehavior',
						'createAttribute' => 'create_time',
						'updateAttribute' => 'update_time',
						'setUpdateOnCreate' => true ,
						'timestampExpression'=>"new CDbExpression('NOW()')"
				),
				'BlameableBehavior' => array (
						'class' => 'common.extensions.behaviors.BlameableBehavior',
						'createdByColumn' => 'create_id', // optional
						'updatedByColumn' => 'update_id'  // optional
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