<?php
class MemberController extends BackendController {
	/**
	 *
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 *      using two-column layout. See 'protected/views/layouts/column2.php'.
	 *     
	 */
	public $layout = '//layouts/column2';
	/**
	 *
	 * @return array action filters
	 *        
	 *         public function filters()
	 *         {
	 *         return array(
	 *         'accessControl', // perform access control for CRUD operations
	 *         );
	 *         }
	 *        
	 *         /**
	 *         Specifies the access control rules.
	 *         This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 *        
	 */
	public function accessRules() {
		return array_merge ( [ 
				[ 
						'allow',
						'actions' => [ 
								'index',
								'view' 
						],
						'users' => [ 
								'@' 
						] 
				],
				[ 
						'allow',
						'actions' => [ 
								'create',
								'update' ,
									'checkNew'
						],
						'users' => [ 
								'@' 
						] 
				],
				[ 
						'allow',
						'actions' => [ 
								'admin',
								'delete' 
						],
						'users' => [ 
								'admin' 
						] 
				],
				[ 
						'deny',
						'users' => [ 
								'*' 
						] 
				] 
		], parent::accessRules () );
	}
	
	/**
	 * Displays a particular model.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be displayed
	 *        	
	 */
	public function actionView($id) {
		$this->render ( 'view', array (
				'model' => $this->loadModel ( $id ) 
		) );
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		
		$data['model'] = new OperatorMember ();
		
		$data['step']=1;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['OperatorMember'] ) && isset ( $_POST ['step'] )) {
			if($_POST['step']=='1'){
				$model=OperatorMember::model()->find('cnum=:num AND ctype=:type',
						array(
								':num'=>$_POST ['OperatorMember']['cnum'],
								':type'=>$_POST ['OperatorMember']['ctype'],
						)
					);
				$data['step']=2;
			}else{
				$model=OperatorMember::model()->findByPk($_POST['OperatorMember']['id']);
			}
				if($model){
					$data['model']=$model;
					$data['model']->attributes = $_POST ['OperatorMember'];
					$_POST['step']=='1'?Yii::app()->user->setFlash('info', '该学员已存在，请核对信息并修改！'):null;
				}else {
					$data['model']->attributes = $_POST ['OperatorMember'];
					$data['model']->gender=(substr($data['model']->cnum,-2,1)%2)+1;
				}
				
				if (!$data['model']->save ()){
						Yii::app()->user->setFlash('warning', '新学员保存失败，请确认后再提交！');
					}elseif($_POST['step']=='2'){
							Yii::app()->user->setFlash('success', '新学员保存成功！');
							$this->redirect ( array (
									'view',
									'id' => $data['model']->id
							));
		}
		}
		
		$this->render ( 'create', $data );
	}
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be updated
	 *        	
	 */
	public function actionUpdate($id) {
		$model = $this->loadModel ( $id );
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if (isset ( $_POST ['OperatorMember'] )) {
			$model->attributes = $_POST ['OperatorMember'];
			if ($model->save ())
				$this->redirect ( array (
						'view',
						'id' => $model->id 
				) );
		}
		
		$this->render ( 'update', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * 
	 * @param integer $id
	 *        	the ID of the model to be deleted
	 *        	
	 */
	public function actionDelete($id) {
		if (Yii::app ()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel ( $id )->delete ();
			
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (! isset ( $_GET ['ajax'] ))
				$this->redirect ( isset ( $_POST ['returnUrl'] ) ? $_POST ['returnUrl'] : array (
						'admin' 
				) );
		} else
			throw new CHttpException ( 400, 'Invalid request. Please do not repeat this request again.' );
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex() {
		//var_dump ( Lookup::items ( Lookup::GENDER ) );
		$dataProvider = new CActiveDataProvider ( 'OperatorMember' );
		$this->render ( 'index', array (
				'dataProvider' => $dataProvider 
		) );
	}
	
	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model = new OperatorMember ( 'search' );
		$model->unsetAttributes (); // clear any default values
		if (isset ( $_GET ['OperatorMember'] ))
			$model->attributes = $_GET ['OperatorMember'];
		
		$this->render ( 'admin', array (
				'model' => $model 
		) );
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * 
	 * @param
	 *        	integer the ID of the model to be loaded
	 *        	
	 */
	public function loadModel($id) {
		$model = OperatorMember::model ()->findByPk ( $id );
		if ($model === null)
			throw new CHttpException ( 404, 'The requested page does not exist.' );
		return $model;
	}
	
	/**
	 * Performs the AJAX validation.
	 * 
	 * @param
	 *        	CModel the model to be validated
	 *        	
	 */
	protected function performAjaxValidation($model) {
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'operator-member-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
	}
}
