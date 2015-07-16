<?php

error_reporting(0);

class ModultestController extends Controller {

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
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
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

    public function actionViewModul($idToefl) {
        $dataProvider = new ModulTest('search');
        $dataProvider->unsetAttributes();
        $dataProvider->id_toefl = $idToefl;

        $this->render('index', array('dataProvider' => $dataProvider));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($idToefl) {
        $model = new Modultest;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Modultest'])) {
            $model->attributes = $_POST['Modultest'];
            $model->id_toefl = $idToefl;
            if ($model->save())
                $this->redirect(array('viewModul', 'idToefl' => $model->id_toefl
                ));
        }

        $this->render('create', array(
            'model' => $model,
            'idToefl' => $idToefl,
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

        if (isset($_POST['Modultest'])) {
            $model->attributes = $_POST['Modultest'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_modulTest));
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
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Modultest');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin($idToefl) {
        $model = new Modultest('search');
        $model->unsetAttributes();  // clear any default values
        $model->id_toefl = $idToefl;

        if (isset($_GET['Modultest']))
            $model->attributes = $_GET['Modultest'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Modultest the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Modultest::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Modultest $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'modultest-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    
    public function actionViewSoalToeflTest($id)
    {   
        //Koneksi ke Database
        $con = mysqli_connect('localhost', 'root', '', 'toefl');
        
        // Check connection
        if (mysqli_connect_errno()) 
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
        $result = mysqli_query($con, "SELECT * FROM t_modultest where id_toefl = " . $id . " LIMIT 1");
        
        while ($row = mysqli_fetch_array($result)) 
        {
            $idModulTest = $row['id_modulTest']; //idModulTest = 15
        }
        
        $hasil = Modultestsoal::model()->findAllByAttributes(array('id_modultest' => $idModulTest));

        $soalToefl = new Modultestsoal('search');
        $soalToefl->id_modultest = $idModulTest;
        
        //Hitung Score
        $kosong = 0;
        if ($_POST['Submit_jawaban_sementara']) 
        {
            if (count($_POST['jawaban']) < 1) 
            {
                echo "Anda belum menjawab soal satupun ";
            } 
            else 
            {
                $Jawaban = "";
                $nomor = 1;
                //var_dump($_POST['NomorSoal']);
                //echo "*";
                for ($i = 1; $i <= $_POST['NomorSoal']; $i++) 
                {
                    if ($_POST['jawaban']["$i"] == NULL) 
                    {
                        $Jawaban .= "#";
                        $kosong+=1;
                    } 
                    else 
                    {
                        $Jawaban .= $_POST['jawaban']["$i"];
                    }
                }

                // echo $Jawaban ."<BR>";
                // echo $id."<BR>";

                $encode = Soal::model()->getJawabanToefl($idModulTest);
                //echo "<br>"; 
                //           var_dump($encode);
                $count = 0;
                $wrong = 0;

                for ($i = 0; $i < $_POST['NomorSoal']; $i++) 
                {
                    //echo $_POST['jawaban'][$i];
                    //echo $encode[$i]["jawaban"];
                    //echo "*";
                    if ($_POST['jawaban'][$i + 1] == $encode[$i]["jawaban"]) 
                    {
                        //echo "<br>", $_POST['jawaban']["$i"]," dan ",$encode[$i]["jawaban"];
                        $count+=1;
                    } 
                    else 
                    {
                        $wrong+=1;
                    }
                }

                //var_dump($encode);
            }
        }
        //$nilai = (100 / $_POST['NomorSoal']) * $count;
        // echo "<br>",$nilai;
        //$name = Yii::app()->user->name;
        //$koneksi_server = mysqli_connect('localhost', 'root', '', 'toefl');

        //if (mysqli_connect_errno()) {
        //    echo "Failed to connect to MySQL: " . mysqli_connect_error();
        //}

        //mysqli_query($koneksi_server, "INSERT INTO t_grade(username,jawaban,grade)
        //        VALUES ('$name', '$Jawaban','$nilai')");

        //mysqli_close($koneksi_server);
        //}     
        //Table Nilai
        $ScoreSesi1 = array(24, 25, 26, 27, 28, 29, 30, 31, 32, 32, 33, 35, 37, 38, 39, 41, 41, 42, 43, 44, 45, 45, 46, 47, 47, 48, 48, 49, 49, 50, 51, 51, 52, 52, 53, 54, 54, 55, 56, 57, 57, 58, 59, 60, 61, 62, 63, 65, 66, 67, 68);
        $ScoreSesi2 = array(20, 20, 21, 22, 23, 25, 26, 27, 29, 31, 33, 35, 36, 37, 38, 40, 40, 41, 43, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 60, 61, 63, 65, 67, 68);
        $ScoreSesi3 = array(21, 22, 23, 23, 24, 25, 26, 27, 28, 28, 29, 30, 31, 32, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 43, 44, 45, 46, 46, 47, 48, 48, 49, 50, 51, 52, 52, 53, 54, 54, 55, 56, 57, 58, 59, 60, 61, 63, 65, 66, 67);

        $Score = Yii::app()->user->getState('Score');
        
        if (!isset($_POST['Submit_jawaban_sementara'])) 
        {
            $result = mysqli_query($con, "SELECT * FROM t_modultest where id_toefl = " . $id);
        
            $UrutanTemp = 0;
            $UrutanModul = 0;
            $NextModul = 0;
        
            while ($row = mysqli_fetch_array($result)) 
            {
                $UrutanTemp++;

                if ($UrutanModul != 0) 
                {
                    $NextModul = $row['id_modulTest'];
                    break;
                }
            
                if ($row['id_modulTest'] == $idModulTest) 
                {
                    $UrutanModul = $UrutanTemp;
                }
            }
            
            $this->render('ViewSoalToeflSementara', array(
                'model' => $soalToefl,
                'hasil' => $hasil,
                'NextModul' => $NextModul,
                'UrutanModul' => $UrutanModul));
        }
        else if(isset($_POST['Submit_jawaban_sementara']))
        {
            
            
            $NextModul = $_POST['NextModul'];
            $UrutanModul = $_POST['UrutanModul'];
            
            if($UrutanModul == 2)
            {
                $Score += $ScoreSesi1[$count];
                
                Yii::app()->user->setState('Score', $Score);
                
                $hasil = Modultestsoal::model()->findAllByAttributes(array('id_modultest' => $NextModul));

                $soalToefl = new Modultestsoal('search');
                $soalToefl->id_modultest = $NextModul;
                
                $result = mysqli_query($con, "SELECT * FROM t_modultest where id_modulTest = " . $NextModul);
        
                while ($row = mysqli_fetch_array($result)) 
                {
                    $idToefl = $row['id_toefl'];
                }
        
                $result = mysqli_query($con, "SELECT * FROM t_modultest where id_toefl = " . $idToefl);
        
                $UrutanTemp2 = 0;
                $UrutanModul2 = 0;
                $NextModul2 = 0;

                while ($row = mysqli_fetch_array($result)) 
                {
                    $UrutanTemp2++;

                    if ($UrutanModul2 != 0) 
                    {
                        $NextModul2 = $row['id_modulTest'];
                        break;
                    }
            
                    if ($row['id_modulTest'] == $NextModul) 
                    {
                        $UrutanModul2 = $UrutanTemp2;
                    }
                }
            
                $this->render('ViewSoalToeflSementara', array(
                    'model' => $soalToefl,
                    'hasil' => $hasil,
                    'NextModul' => $NextModul2,
                    'UrutanModul' => $UrutanModul2));
            }
            else if($UrutanModul == 3)
            {
                $Score += $ScoreSesi2[$count];
                
                Yii::app()->user->setState('Score', $Score);
                
                $hasil = Modultestsoal::model()->findAllByAttributes(array('id_modultest' => $NextModul));

                $soalToefl = new Modultestsoal('search');
                $soalToefl->id_modultest = $NextModul;
                
                $result = mysqli_query($con, "SELECT * FROM t_modultest where id_modulTest = " . $NextModul);
        
                while ($row = mysqli_fetch_array($result)) 
                {
                    $idToefl = $row['id_toefl'];
                }
        
                $result = mysqli_query($con, "SELECT * FROM t_modultest where id_toefl = " . $idToefl);
        
                $UrutanTemp2 = 0;
                $UrutanModul2 = 0;
                $NextModul2 = 0;

                while ($row = mysqli_fetch_array($result)) 
                {
                    $UrutanTemp2++;

                    if ($UrutanModul2 != 0) 
                    {
                        $NextModul2 = $row['id_modulTest'];
                        break;
                    }
            
                    if ($row['id_modulTest'] == $NextModul) 
                    {
                        $UrutanModul2 = $UrutanTemp2;
                    }
                }
            
                $this->render('ViewSoalToeflSementara', array(
                    'model' => $soalToefl,
                    'hasil' => $hasil,
                    'NextModul' => $NextModul2,
                    'UrutanModul' => $UrutanModul2));
            }
            else
            {
                $Score += $ScoreSesi3[$count];
                $SS = $Score;
                $Score /= 3;
                $Score *= 10;

                Yii::app()->user->setState('Score', $Score);
                
                $name = Yii::app()->user->name;

                mysqli_query($con, "INSERT INTO t_grade(username,jawaban,grade)
                    VALUES ('$name', '$Jawaban','$Score')");
                
                $result = mysqli_query($con, "SELECT * FROM t_grade WHERE username = '".$name."'");
        
                while ($row = mysqli_fetch_array($result)) 
                {
                    $idGrade = $row['id_grade'];
                }
                
                mysqli_query($con, "INSERT INTO t_toeflgrade(id_toefl, id_grade)
                    VALUES ($id, $idGrade)");

                $this->render('HasilToefl', array('wew' => $Score, 'wow' => $idGrade, 'waw' => $id, 'wuw' => $count, 'dat' => $result));
            }
        }
        
        mysqli_close($con);
    }    
}
