<?php

error_reporting(0);

class QuizController extends Controller {

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
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'index', 'view'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'index', 'view', 'create'),
                'users' => array('admin'),
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
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionViewSoalQuiz($id) {

        $hasil = Quizsoal::model()->findAllByAttributes(array('id_quiz' => $id));

        $soalkuis = new Quizsoal('search');
        $soalkuis->id_quiz = $id;
        
        $kosong=0;
        if ($_POST['Submit_jawaban']) {
            if (count($_POST['jawaban']) < 1) {
                echo "Anda belum menjawab soal satupun ";
             }else {
                $Jawaban = "";
                $nomor = 1;
                //var_dump($_POST['NomorSoal']);
//                echo "*";
                for ($i = 1; $i <= $_POST['NomorSoal']; $i++) {
                    if ($_POST['jawaban']["$i"] == NULL) {
                        $Jawaban .= "#";
                        $kosong+=1;
                    } else {
                        $Jawaban .= $_POST['jawaban']["$i"];
                    }
                }
                //echo $Jawaban;

    $encode =Soal::model()->getJawaban($id);
    //echo "<br>"; 
    $count=0;
    $wrong=0;
    for ($i = 0; $i < $_POST['NomorSoal']; $i++) {
//        echo $_POST['jawaban'][$i];
          //echo $encode[$i]["jawaban"];
//          echo "*";
             if ($_POST['jawaban'][$i+1] == $encode[$i]["jawaban"]) {
                     //secho "<br>", $_POST['jawaban']["$i"]," dan ",$encode[$i]["jawaban"];
                     $count+=1;
                    }
             else{
                 $wrong+=1;
             }
           }
    //var_dump($encode);
        }}
       //echo "<br>Anda benar : ",$count," dari ",$_POST['NomorSoal'], " soal";
       
       $nilai=(100/$_POST['NomorSoal'])*$count;
      // echo "<br>",$nilai;
       $name = Yii::app()->user->name;
       $koneksi_server= mysqli_connect('localhost','root','','toefl');
       if (mysqli_connect_errno()) 
           {
               echo "Failed to connect to MySQL: " . mysqli_connect_error();
           }

      mysqli_query($koneksi_server,"INSERT INTO t_grade(username,jawaban,grade)
        VALUES ('$name', '$Jawaban','$nilai')");
      
      mysqli_close($koneksi_server);
  //}                       
      if(!isset ($_POST['Submit_jawaban'])){
        $this->render('ViewSoalQuiz', array(
                'model' => $soalkuis,
                'hasil' => $hasil,
            ));}
        else{
         $this->render('HasilQuiz',array('wew'=>$nilai,'wow'=>$kosong,'waw'=>$wrong,'wuw'=>$count));
        }      
        }
        
        
    

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = $this->loadModel($id);
        $nomorKuis = SoalController::loadModel($model->id_quiz);
        $model = new Quiz;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Quiz'])) {
            $model->attributes = $_POST['Quiz'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_quiz));
                //$this->redirect(array('index', 'idTopik' => $model->id_topik));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionCreateQuiz($idTopik) {
        $model = new Quiz;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Quiz'])) {
            $model->attributes = $_POST['Quiz'];
            $model->id_topik = $idTopik;
            if ($model->save())
                //$this->redirect(array('view', 'id' => $model->id_quiz));
                $this->redirect(array('index', 'idTopik' => $model->id_topik));
        }
        $this->render('create',array(
			'model'=>$model,
		));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Quiz'])) {
            $model->attributes = $_POST['Quiz'];
            if ($model->save())
                //$this->redirect(array('view', 'id' => $model->id_quiz));
                $this->redirect(array('index', 'idTopik' => $model->id_topik));
        }

        $this->render('update', array(
            'model' => $model,
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
    public function actionIndex($idTopik) {
        /*
          $dataProvider=new CActiveDataProvider('Quiz');
          $this->render('index',array(
          'dataProvider'=>$dataProvider,
          ));
         * 
         */

        $dataProvider = new Quiz('search');
        $dataProvider->unsetAttributes();
        $dataProvider->id_topik = $idTopik;

        $this->render('index', array('dataProvider' => $dataProvider));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin($idTopik) {
        $model = new Quiz('search');
        $model->unsetAttributes();  // clear any default values
        $model->id_topik = $idTopik;
        
        if (isset($_GET['Quiz']))
            $model->attributes = $_GET['Quiz'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Quiz the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Quiz::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Quiz $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'quiz-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
