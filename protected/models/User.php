<?php

/**
 * This is the model class for table "t_user".
 *
 * The followings are the available columns in table 't_user':
 * @property string $username
 * @property string $password
 * @property integer $no_induk
 * @property string $nama
 * @property string $email
 * @property string $t_lahir
 * @property string $foto
 * @property string $gender
 * @property string $alamat
 *
 * The followings are the available model relations:
 * @property Grade[] $grades
 */
class User extends CActiveRecord {

    //digunakan untuk memproses data setelah di validasi
    protected function afterValidate() {
        parent::afterValidate();

        //lakukan enkripsi pada password yang di input
    }

    //membuat function untuk mengkripsi data
    //public function encrypt($value) {
    //    return md5($value);
    //}

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, password, no_induk, nama, email, t_lahir, gender, alamat', 'required'),
            array('no_induk', 'numerical', 'integerOnly' => true),
            array('username,password, email, foto', 'length', 'max' => 33),
            array('nama, alamat', 'length', 'max' => 50),
            array('foto', 'file', 'types' => 'jpg,JPG, gif, png', 'allowEmpty' => true, 'on' => 'update'),
            array('gender', 'length', 'max' => 1),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('username, password, no_induk, nama, email, t_lahir, foto, gender, alamat', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'grades' => array(self::HAS_MANY, 'Grade', 'username'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'username' => 'Username',
            'password' => 'Password',
            'no_induk' => 'ID Number',
            'nama' => 'Name',
            'email' => 'Email',
            't_lahir' => 'Date of Birth',
            'foto'=>'Image',
            'gender' => 'Gender',
            'alamat' => 'Address',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('no_induk', $this->no_induk);
        $criteria->compare('nama', $this->nama, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('t_lahir', $this->t_lahir, true);
        $criteria->compare('foto', $this->foto, true);
        $criteria->compare('gender', $this->gender, true);
        $criteria->compare('alamat', $this->alamat, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }
    
    public function searchOnlyData(){
        $criteria->compare('no_induk', $this->no_induk);
        $criteria->compare('nama', $this->nama, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('t_lahir', $this->t_lahir, true);
        $criteria->compare('foto', $this->foto, true);
        $criteria->compare('gender', $this->gender, true);
        $criteria->compare('alamat', $this->alamat, true);
        
        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));        
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public static function gender() {
        return array(
            'L' => 'Laki-Laki',
            'P' => 'Perempuan',
        );
    }

    // overrides the CModel::beforeSave() 
    /*public function beforeSave() {
        if(!$status)
        {    
            $this->password = self::hashPassword($this->password);
            return (parent::beforeSave());
        }
    }
     * 
     */

public function retUser(){
return User::model()->nama;
}    
    
// a password hashing method 
    public static function hashPassword($_password) {
        return (MD5($_password));
    }

// to compare this model's password wirh a given password 
    public function comparePassword($_password) {
        return($this->password === $this->hashPassword($_password));
    }
    
    public static function validateChangePassword($pwd,$repwd){
            if($pwd===$repwd)
                return true;
            else
                return false;
        }
    
}

