<?php

/**
 * This is the model class for table "operator_member".
 *
 * The followings are the available columns in table 'operator_member':
 * @property string $id
 * @property string $name
 * @property string $ctype
 * @property string $cnum
 * @property integer $mphome
 * @property integer $fphone
 * @property string $gender
 * @property string $edu
 * @property string $birthday
 * @property string $address
 * @property integer $create_id
 * @property integer $create_time
 * @property integer $update_id
 * @property integer $update_time
 * @property string $remark
 */
class OperatorMember extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'operator_member';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, ctype, cnum', 'required'),
			array('mphome, fphone, create_id, create_time, update_id, update_time', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>20),
			array('ctype', 'length', 'max'=>11),
			array('cnum', 'length', 'max'=>30),
			array('gender', 'length', 'max'=>1),
			array('edu', 'length', 'max'=>10),
			array('address', 'length', 'max'=>250),
			array('remark', 'length', 'max'=>200),
			array('birthday', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, ctype, cnum, mphome, fphone, gender, edu, birthday, address, create_id, create_time, update_id, update_time, remark', 'safe', 'on'=>'search'),
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
			'id' => '学员ID',
			'name' => '学员姓名',
			'ctype' => '证件类型',
			'cnum' => '证件号码',
			'mphome' => '移动电话',
			'fphone' => '固定电话',
			'gender' => '性别',
			'edu' => '文化程度',
			'birthday' => '出生日期',
			'address' => '家庭住址',
			'create_id' => '学员创建者ID',
			'create_time' => '学员创建时间',
			'update_id' => '学员资料最后更新者ID',
			'update_time' => '学员资料最后更新时间',
			'remark' => '学员资料备注信息',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('ctype',$this->ctype,true);
		$criteria->compare('cnum',$this->cnum,true);
		$criteria->compare('mphome',$this->mphome);
		$criteria->compare('fphone',$this->fphone);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('edu',$this->edu,true);
		$criteria->compare('birthday',$this->birthday,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('create_id',$this->create_id);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_id',$this->update_id);
		$criteria->compare('update_time',$this->update_time);
		$criteria->compare('remark',$this->remark,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OperatorMember the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
