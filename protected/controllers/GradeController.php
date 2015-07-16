<?php

class GradeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
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
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			//array('deny',  // deny all users
			//	'users'=>array('*'),
			//),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Grade;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Grade']))
		{
			$model->attributes=$_POST['Grade'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_grade));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
        
        public function actionViewGrade($id)
        {
            $this->render('view', array(
            'model' => $this->loadModel($id),
        ));                        
        }

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Grade']))
		{
			$model->attributes=$_POST['Grade'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_grade));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Grade');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin2()
	{
		$model=new Grade('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Grade']))
			$model->attributes=$_GET['Grade'];

		$this->render('admin',array(
			'model'=>$model,
		));
                
                $model = new Modultest('search');
                $model->unsetAttributes();  // clear any default values
                $model->id_toefl = $idToefl;

                if (isset($_GET['Modultest']))
                    $model->attributes = $_GET['Modultest'];

                $this->render('admin', array(
                    'model' => $model,
                ));
	}
        
        public function actionAdmin()
        {
            $con = mysqli_connect('localhost', 'root', '', 'toefl');
        
            // Check connection
            if (mysqli_connect_errno()) 
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            
            //$result = mysqli_query($con, "SELECT * FROM t_toeflgrade ORDER BY id_grade DESC LIMIT 50");
            $result = mysqli_query($con, "SELECT DISTINCT username, grade
                                            FROM t_grade inner join t_toeflgrade 
                                            WHERE t_grade.id_grade = t_toeflgrade.id_grade 
                                            ORDER BY t_grade.grade DESC");
            
            $Hasil = "";
            $Hasil .= "<TABLE>";
            $Hasil .= "<TH>Rank</TH>";
            $Hasil .= "<TH>Username</TH>";
            $Hasil .= "<TH>Grade</TH>";
            
            $No = 1;
            while ($row = mysqli_fetch_array($result)) 
            {
                $Hasil .= "<TR>";
                //$result2 = mysqli_query($con, "SELECT * FROM t_grade WHERE id_grade = ". $row['id_grade']);
                
                //while ($row2 = mysqli_fetch_array($result2))
                //{
                    $Hasil .= "<TD>";
                    $Hasil .= $No;
                    $Hasil .= "</TD>";
                    
                    $Hasil .= "<TD>";
                    $Hasil .= $row['username'];
                    $Hasil .= "</TD>";
                    
                    $Hasil .= "<TD>";
                    $Hasil .= $row['grade'];
                    $Hasil .= "</TD>";
                //}
                $Hasil .= "</TR>";
                $No++;
            }
            $Hasil .= "</TABLE>";
            
            $this->render('admin2', array(
                    'model' => $Hasil,
                ));
        }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Grade the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Grade::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Grade $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='grade-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
