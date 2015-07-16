<?php

class UserController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'create','update','update2'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('update', 'view','update2'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete','update','update2'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new User;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $rnd = rand(0, 9999);  // generate random number between 0-9999
            $model->attributes = $_POST['User'];

            $uploadedFile = CUploadedFile::getInstance($model, 'foto');
            $fileName = "{$rnd}-{$uploadedFile}";  // random number + file name
            $model->foto = $fileName;
            $model->password = MD5($model->password);
            if ($model->save()) {
                if(!empty($uploadedFile))
                $uploadedFile->saveAs(Yii::app()->basePath . '/../images/test/' . $fileName);
                $this->redirect(array('site/Login'));
                //$this->redirect(array('view', 'username' => $model->username));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    /*public function actionUpdateCredential($id) {

        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $temp = new User;
        if (isset($_POST['User'])) {
            $temp->attributes = $_POST['User'];
            $model->username= $temp->username;
            $model->password= "";
            if ($model->save())
                $this->redirect(array('index'));
        }
        
         $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
        //$this->render('update', array(
          //  'model' => $model,
        //));
    }
    */
    public function actionUpdate($id) {

        $model = $this->loadModel($id);
        
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
/*            $model->no_induk = $_POST['User']->no_induk;
            $model->nama = $_POST['User']->nama;
            $model->email = $_POST['User']->email;
            $model->t_lahir = $_POST['User']->t_lahir;
            $model->foto = $_POST['User']->foto;
            $model->gender = $_POST['User']->gender;
  */         
            if ($model->save())
                $this->redirect(array('/user/view', 'id' => $id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }
    
    public function actionUpdate2($id) {

        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
       
        //if($model->password== md5($_POST['User']->oldpassword)){
            if(isset($_POST['User']))
		{
                    if($model->comparePassword($_POST['oldpw'])){
                        if(User::validateChangePassword($_POST['password'],$_POST['repassword'])){
                            $model->attributes=$_POST['User'];
                            $model->password=MD5($_POST['password']);
                            if($model->save())
                                    $this->redirect(array('/site/index'));    
                        }
                        else
                            Yii::app()->user->setFlash('errorPassword', "Type correctly the new password");
                    }
                    else
                    {
                        Yii::app()->user->setFlash('errorPassword', "Re-check your current password");
                    }
                   
		}
       /* }
        else{
           $this->render('update2', array(
            'model' => $model,
        )); 
        }*/

        $this->render('update2', array(
            'model' => $model,
        ));
    }
    
    public function actionSearchOnlyData() {
        $model = new User();
        if (isset($_POST)) {
            $model->attributes = $_POST['User'];
            $dataProvider = $model->searchOnlyData();
            $this->render('update', array('dataProvider' => $dataProvider));
        }
    }
    
    public function actionChangePassword()
	{
                $id=Yii::app()->user->getId();
		$model=$this->loadModel($id);
                //$model->password='';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Account']))
		{
                    if($model->comparePassword($_POST['oldpw'])){
                        if(Account::validateChangePassword($_POST['password'],$_POST['repassword'])){
                            $model->attributes=$_POST['Account'];
                            $model->password=$_POST['password'];
                            if($model->save())
                                    $this->redirect(array('/site/index'));    
                        }
                        else
                            Yii::app()->user->setFlash('errorPassword', "Type correctly the new password");
                    }
                    else
                    {
                        Yii::app()->user->setFlash('errorPassword', "Re-check your current password");
                    }
                   
		}

		$this->render('changePassword',array(
			'model'=>$model,
		));
	}

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('User');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return User the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actions() {
        return array(
            'saveImageAttachment' => 'ext.imageAttachment.ImageAttachmentAction',
        );
    }

    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
