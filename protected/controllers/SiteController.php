<?php

class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
       $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;
        Yii::app()->user->setState('Score', 0);

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    // an action designed to handle the registration process 
    public function actionRegister() {
        $registration = new RegistrationForm;
// collect user input data 
        $model=new User;
        if (isset($_POST['RegistrationForm'])) {
            $registration->attributes = $_POST['RegistrationForm'];
            //$registration->attributes = $_POST['RegistrationForm'];
            
            $rnd = rand(0,9999);  // generate random number between 0-9999
	  $model->attributes=$_POST['User'];
			            
// validate user input and redirect to the previous page if valid 
            if ($registration->validate()) {
// create an account model
                $user = new User();
                
                $user->username = $registration->username;
                $user->password = MD5($registration->password);
                $user->no_induk=$registration->NoInduk;
                $user->nama=$registration->first_name;
                $user->email = $registration->email;
                $user->t_lahir=$registration->date_of_birth;
                $uploadedFile=CUploadedFile::getInstance($user,'foto');
                $fileName = "{$rnd}-{$uploadedFile}";
                $user->foto=$fileName;
                $user->foto=$registration->foto;
                $user->gender = $registration->sex;
                $user->alamat = $registration->address;
                
                if ($user->save()) {                    
// redirects to index page 
                        $uploadedFile->saveAs(Yii::app()->basePath . '/foto/' . $fileName);
                        $this->redirect(array('view', 'username' => $model->username));
                        $this->redirect(array('index'));
                    }
                 else {
// what's wrong? get the error message 
                    $registration->addErrors($user->getErrors());
                 }}
        }
// display the registration form 
        $this->render('register', array('model' => $registration));
    }
    
        public function actionSoal($id)
        {
            $rnd = rand(0,9999);
            $inputSoal=new InputSoal;
            if(isset($_POST['InputSoal']))
            {
                $inputSoal->attributes=$_POST['InputSoal'];
                
                if($inputSoal->validate())
                {
                    //create a file model
                    $file=new File();
                    $uploadedFile=CUploadedFile::getInstance($inputSoal,'file');
                    $fileName = "{$rnd}-{$uploadedFile}";
                     $file->file=$fileName;
                    $file->jenis=$inputSoal->jenis;
                    
                    if($file->save())
                    {
                         //if(!empty($uploadedFile))
                         //$uploadedFile=CUploadedFile::getInstance($file,'file');
                         if (isset($uploadedFile)){
                             if($inputSoal->jenis=='L')
                             {    
                                $uploadedFile->saveAs(Yii::app()->basePath.'/../music/test/'.$fileName);                              
                             }
                             else if($inputSoal->jenis=='R')
                             {
                                $uploadedFile->saveAs(Yii::app()->basePath.'/../document/test/'.$fileName);
                             }
                         }
                        $soal = new Soal();
                        $soal->attributes = $inputSoal->attributes; 
                        $soal->id_file = $file->id_file;
                        
                        if($soal->save())
                        {
                            $kuissoal=new Quizsoal();
                            $kuissoal->id_quiz = $id;
                            $kuissoal->id_soal = $soal->id_soal;
                            if($kuissoal->save())
                            {
                                //redirect to index page
                                $this->redirect(array('quiz/viewSoalQuiz', 'id' => $id));
                            }
                            else
                            {
                                //get the error message
                                $inputSoal->addErrors($soal->getErrors());
                            }
                        }
                        else
                        {
                            //get the error message
                            $inputSoal->addErrors($soal->getErrors());
                        }
                    }
                    else
                    {
                        //get the error message
                        $inputSoal->addErrors($soal->getErrors());
                    }
                }
                else
                {
                    //get the error message
                    $inputSoal->addErrors($file->getErrors());
                }
            }
            //display input soal-form
            $this->render('Soal',array('model'=>$inputSoal));
        }

        
        public function actionSoalToefl($id)
        {
            $rnd = rand(0,9999);
            $inputSoal=new InputSoal;
            if(isset($_POST['InputSoal']))
            {
                $inputSoal->attributes=$_POST['InputSoal'];
                
                if($inputSoal->validate())
                {
                    //create a file model
                    $file=new File();
                    $uploadedFile=CUploadedFile::getInstance($inputSoal,'file');
                    $fileName = "{$rnd}-{$uploadedFile}";
                     $file->file=$fileName;
                    $file->jenis=$inputSoal->jenis;
                    
                    if($file->save())
                    {
                         //if(!empty($uploadedFile))
                         //$uploadedFile=CUploadedFile::getInstance($file,'file');
                         if (isset($uploadedFile)){
                             if($inputSoal->jenis=='L')
                             {    
                                $uploadedFile->saveAs(Yii::app()->basePath.'/../music/test/'.$fileName);                              
                             }
                             else if($inputSoal->jenis=='R')
                             {
                                 $uploadedFile->saveAs(Yii::app()->basePath.'/../document/test/'.$fileName);
                             }
                         }
                        $soal=new Soal();
                        $soal->attributes = $inputSoal->attributes; 
                        $soal->id_file = $file->id_file;
                        
                        if($soal->save())
                        {
                            $kuissoal=new Modultestsoal();
                            $kuissoal->id_modultest = $id;
                            $kuissoal->id_soal = $soal->id_soal;
                            if($kuissoal->save())
                            {
                                //redirect to index page
                                //Koneksi ke Database
                                $con = mysqli_connect('localhost', 'root', '', 'toefl');
        
                                // Check connection
                                if (mysqli_connect_errno()) 
                                {
                                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                }
        
                                $result = mysqli_query($con, "SELECT * FROM t_modultest where id_modulTest = " . $id);

                                while ($row = mysqli_fetch_array($result)) 
                                {
                                    $idToefl = $row['id_toefl']; //idModulTest = 15
                                }
                                
                                
                                $this->redirect(array('modulTest/viewSoalToeflTest', 'id' => $idToefl));
                            }
                            else
                            {
                                //get the error message
                                $inputSoal->addErrors($soal->getErrors());
                            }
                        }
                        else
                        {
                            //get the error message
                            $inputSoal->addErrors($soal->getErrors());
                        }
                    }
                    else
                    {
                        //get the error message
                        $inputSoal->addErrors($soal->getErrors());
                    }
                }
                else
                {
                    //get the error message
                    $inputSoal->addErrors($file->getErrors());
                }
            }
            //display input soal-form
            $this->render('Soal',array('model'=>$inputSoal));
        }
}