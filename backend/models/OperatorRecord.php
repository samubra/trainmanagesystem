<?php

/**
 * This is the model class for table "operator_record".
 *
 * The followings are the available columns in table 'operator_record':
 * @property string $id
 * @property string $cid
 * @property string $mid
 * @property string $classid
 * @property string $review_time
 * @property string $next_time
 * @property string $ischange
 * @property string $isnew
 * @property integer $charge
 * @property string $remark
 * @property integer $create_id
 * @property integer $create_time
 * @property integer $update_id
 * @property integer $update_time
 */
class OperatorRecord extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'operator_record';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mid', 'required'),
			array('charge, create_id, create_time, update_id, update_time', 'numerical', 'integerOnly'=>true),
			array('cid, mid, classid', 'length', 'max'=>11),
			array('ischange, isnew', 'length', 'max'=>1),
			array('remark', 'length', 'max'=>200),
			array('review_time, next_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cid, mid, classid, review_time, next_time, ischange, isnew, charge, remark, create_id, create_time, update_id, update_time', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cid' => '所属操作证ID',
			'mid' => '所属学员ID',
			'classid' => '所属班级ID',
			'review_time' => '本次复审时间',
			'next_time' => '下次复审时间',
			'ischange' => '是否换证',
			'isnew' => '是否是新训',
			'charge' => '收费',
			'remark' => '标注',
			'create_id' => '创建者ID',
			'create_time' => '创建时间',
			'update_id' => '最后更新ID',
			'update_time' => '最后更新时间',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('cid',$this->cid,true);
		$criteria->compare('mid',$this->mid,true);
		$criteria->compare('classid',$this->classid,true);
		$criteria->compare('review_time',$this->review_time,true);
		$criteria->compare('next_time',$this->next_time,true);
		$criteria->compare('ischange',$this->ischange,true);
		$criteria->compare('isnew',$this->isnew,true);
		$criteria->compare('charge',$this->charge);
		$criteria->compare('remark',$this->remark,true);
		$criteria->compare('create_id',$this->create_id);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_id',$this->update_id);
		$criteria->compare('update_time',$this->update_time);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OperatorRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
