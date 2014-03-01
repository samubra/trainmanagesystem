<?php

/**
 * This is the model class for table "operator_card".
 *
 * The followings are the available columns in table 'operator_card':
 * @property string $id
 * @property string $mid
 * @property string $operator_number
 * @property string $first_class_id
 * @property string $health_status
 * @property string $technical_title
 * @property string $post
 * @property integer $company_id
 * @property integer $opteration_category
 * @property integer $operation_type
 * @property string $first_create_date
 * @property string $issuance_data
 * @property integer $status
 * @property string $update_id
 * @property integer $update_time
 * @property integer $create_id
 * @property integer $create_taime
 * @property string $remark
 */
class OperatorCard extends BaseActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'operator_card';
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
			array('company_id, opteration_category, operation_type, status, update_time, create_id, create_taime', 'numerical', 'integerOnly'=>true),
			array('mid, first_class_id, update_id', 'length', 'max'=>11),
			array('operator_number', 'length', 'max'=>30),
			array('health_status, technical_title, post, remark', 'length', 'max'=>200),
			array('first_create_date, issuance_data', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, mid, operator_number, first_class_id, health_status, technical_title, post, company_id, opteration_category, operation_type, first_create_date, issuance_data, status, update_id, update_time, create_id, create_taime, remark', 'safe', 'on'=>'search'),
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
			'id' => '主键',
			'mid' => '学员ID',
			'operator_number' => '操作证证件号码（通常为：T+身份证）',
			'first_class_id' => '初领证班级ID',
			'health_status' => '健康状况',
			'technical_title' => '专业技术职称',
			'post' => '职位',
			'company_id' => '单位ID',
			'opteration_category' => '操作证类别',
			'operation_type' => '准操作项目',
			'first_create_date' => '初领证日期',
			'issuance_data' => '发证日期',
			'status' => '状态',
			'update_id' => '修改者ID',
			'update_time' => '最后更新时间',
			'create_id' => '创建者ID',
			'create_taime' => '创建时间',
			'remark' => '备注',
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
		$criteria->compare('mid',$this->mid,true);
		$criteria->compare('operator_number',$this->operator_number,true);
		$criteria->compare('first_class_id',$this->first_class_id,true);
		$criteria->compare('health_status',$this->health_status,true);
		$criteria->compare('technical_title',$this->technical_title,true);
		$criteria->compare('post',$this->post,true);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('opteration_category',$this->opteration_category);
		$criteria->compare('operation_type',$this->operation_type);
		$criteria->compare('first_create_date',$this->first_create_date,true);
		$criteria->compare('issuance_data',$this->issuance_data,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('update_id',$this->update_id,true);
		$criteria->compare('update_time',$this->update_time);
		$criteria->compare('create_id',$this->create_id);
		$criteria->compare('create_taime',$this->create_taime);
		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OperatorCard the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
}
