<?php
class Lookup extends CActiveRecord
{
	/**
	 * The followings are the available columns in table:
	 * @var integer $id
	 * @var integer $code
	 * @var string $value
	 * @var string $name
	 * @var string $type
	 * @var integer $position
	 */
	const INDUSTRY='industry';
	const BUSINESS='business';
	const OPERATION='operation';
	const CERTIFICATE='certificate';
	const CATEGORY='category';
	const PERSON_CATEGORY='person_category';
	const COMPANY_STATUS='company_status';
	const VENTURE_STATUS='venture_status';
	const PASSPORT_CARD_TYPE='passport_card_type';
	const OPERATOR_SATATUS='operator_status';
	const OPERATOR_EDU='operator_edu';
	const GENDER='gender';
	const CERTIFICATE_2='certificate_2';
	const CERTIFICATE_3='certificate_3';
	const CERTIFICATE_4='certificate_4';
	const CERTIFICATE_6='certificate_6';
	const CERTIFICATE_11='certificate_11';
	private static $_items=array();

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return isset(Yii::app()->getModule('lookup')->lookupTable)
			? Yii::app()->getModule('lookup')->lookupTable
			: Yii::app()->controller->module->lookupTable;
	}

	// METHODS TO BE USED FROM WITHIN APPLICATION:

	/**
	 * Returns the items for the specified type.
	 * @param string item type (e.g. 'PostStatus').
	 * @return array item names indexed by item code. The items are order by their position values.
	 * An empty array is returned if the item type does not exist.
	 */
	public static function items($type)
	{
		if(!isset(self::$_items[$type]))
			self::loadItems($type);
		return self::$_items[$type];
	}

	/**
	 * Returns the item name for the specified type and code.
	 * @param string the item type (e.g. 'PostStatus').
	 * @param integer the item code (corresponding to the 'code' column value)
	 * @return string the item name for the specified the code. False is returned if the item type or code does not exist.
	 */
	public static function item($type,$code)
	{
		if(!isset(self::$_items[$type]))
			self::loadItems($type);
		return isset(self::$_items[$type][$code]) ? self::$_items[$type][$code] : null;
	}

	/**
	 * @return array of 'add new' option for dropdown
	 */
	public static function add()
	{
		return array('-1'=>Yii::t('LookupModule.ui','-add-'));
	}

	/**
	 * Loads the lookup items for the specified type from the database.
	 * @param string the item type
	 */
	private static function loadItems($type)
	{
		self::$_items[$type]=array();
		$models=self::model()->findAll(array(
			'condition'=>'type=:type',
			'params'=>array(':type'=>$type),
			'order'=>'position',
		));
		//$name='name_'.Yii::app()->language;
		foreach($models as $model)
			self::$_items[$type][$model->code]=$model->name;
	}

	// METHODS USED WITHIN MODULE:

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, name', 'required'),
			array('code, position', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>256),
			array('type', 'length', 'max'=>64),
			array('code', 'length', 'max'=>16),
			array('value','length','max'=>10),
			array('type', 'match', 'pattern'=>'/^[A-Za-z0-9_]+$/u','message'=>Yii::t('LookupModule.ui', '{attribute} can only contain alphanumeric symbols.')),
			array('type', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('LookupModule.ui', 'Id'),
			'code' => Yii::t('LookupModule.ui', 'Code'),
			'name' => Yii::t('LookupModule.ui', 'Name'),
			'value'=>Yii::t('LookupModule.ui','Value'),
			'type' => Yii::t('LookupModule.ui', 'Type'),
			'position' => Yii::t('LookupModule.ui', 'Position'),
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider('Lookup', array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>10,
			),
			'sort'=>array(
				'defaultOrder'=>'type,position',
			),
		));
	}

	/**
	 * Get menu items
	 * @param integer maximum number of names to be returned
	 * @return array for CMenu widget
	 */
	public function getMenu()
	{
		$menu=array();
		$models=$this->findAll(array('select'=>'DISTINCT(type)','order'=>'type'));
		foreach($models as $model)
		{
			$menu[]=array(
				'label'=>$this->getTypeText($model->type),//Yii::t('ui',XHtml::labelize($model->type))
				'url'=>array('index','type'=>$model->type),
				'visible'=>$this->isTypeVisible($model->type),
				'itemOptions' => array ('class' => 'b-b'),
			);
		}
		return $menu;
	}
	
	/**
	 *获取类别名称
	 *
	 */
	public function getTypeText($name)
	{
		$types=array();
		$types[self::INDUSTRY]='行业名称';
		$types[self::BUSINESS]='企业类型';
		$types[self::OPERATION]='准操项目';
		$types[self::CERTIFICATE]='特种作业证书类别';
		$types[self::CATEGORY]='培训类别';
		$types[self::PERSON_CATEGORY]='微企人员类别';
		$types[self::COMPANY_STATUS]='企业状态';
		$types[self::VENTURE_STATUS]='微企学员状态';
		$types[self::PASSPORT_CARD_TYPE]='证件类型';
		$types[self::OPERATOR_SATATUS]='特种作业学员状态';
		$types[self::OPERATOR_EDU]='学员文化程度';
		$types[self::GENDER]='性别';
		$types[self::CERTIFICATE_2]='电工准操项目';
		$types[self::CERTIFICATE_3]='焊接准操项目';
		$types[self::CERTIFICATE_4]='高处准操项目';
		$types[self::CERTIFICATE_6]='金属非金属矿山安全作业准操项目';
		$types[self::CERTIFICATE_11]='场架准操项目';
		return isset($types[$name])?$types[$name]:false;
	}
	/**
	 * Move up.
	 */
	public function moveUp()
	{
		$this->position=$this->position-1;
		$this->update(array('position'));

		$model=$this->find("position=$this->position AND type='$this->type' AND id!=$this->id");
		$model->position=$model->position+1;
		$model->update(array('position'));
	}

	/**
	 * Move down.
	 */
	public function moveDown()
	{
		$this->position=$this->position+1;
		$this->update(array('position'));

		$model=$this->find("position=$this->position AND type='$this->type' AND id!=$this->id");
		$model->position=$model->position-1;
		$model->update(array('position'));
	}

	/**
	 * @param string the value of type attribute
	 * @return integer next available code
	 */
	public function queryNextCode($type)
	{
		$model=$this->find(array(
			'condition'=>"type='$type'",
			'order'=>'code DESC',
			'limit'=>1,
		));
		if($model===null)
			return 1;
		else
			return $model->code+1;
	}

	/**
	 * @param string the value of type attribute
	 * @return integer next available position
	 */
	public function queryNextPosition($type)
	{
		$model=$this->find(array(
			'condition'=>"type='$type'",
			'order'=>'position DESC',
			'limit'=>1,
		));
		if($model===null)
			return 1;
		else
			return $model->position+1;
	}

	/**
	 * @param string the value of type attribute
	 * @return boolean whether the type should be visible in LookupMenu.
	 */
	protected function isTypeVisible($type)
	{
		$safeTypes=Yii::app()->controller->module->safeTypes;
		if ($safeTypes!==array() && !in_array($type,$safeTypes) && Yii::app()->user->name!='admin')
			return false;
		else
			return true;
	}

	/**
	 * Prepares attributes before performing validation.
	 */
	protected function beforeValidate()
	{
		parent::beforeValidate();

		//if(!$this->name_en && $this->name_et)
		//	$this->name_en=$this->name_et;

		return true;
	}

	/**
	 * This is invoked before the record is saved.
	 * @return boolean whether the record should be saved.
	 */
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->code=$this->queryNextCode($this->type);
				$this->position=$this->queryNextPosition($this->type);
			}
			return true;
		}
		else
			return false;
	}

	/**
	 * This is invoked after the record is deleted.
	 */
	protected function afterDelete()
	{
		parent::afterDelete();

		$position=1;
		$models=$this->findAll(array(
			'condition'=>"type='$this->type'",
			'order'=>'position'
		));
		foreach($models as $model)
		{
			$model->position=$position;
			$model->update(array('position'));
			$position++;
		}
	}
}