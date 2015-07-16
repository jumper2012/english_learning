<?php

class RegistrationForm extends CFormModel {

// attributes 
// for bio 
    public $first_name;
    public $foto;
    public $address;
    public $email;
    public $date_of_birth;
    public $sex;
// for credential 
    public $username;
    public $NoInduk;
    public $password;
    public $repassword;

// applied rules for validation 
    public function rules() {
        return array(
// safe attributes are assigned-able inall scenario types 
            array('username,password,repassword,NoInduk,first_name, email,date_of_birth , sex,address', 'safe'),
        );
    }

// sets attribute labels for view labeling 
    public function attributeLabels() {
        return array(
            
            'username' => 'Username',
            'password' => 'Password',
            'first_name' => 'First name',
            'NoInduk'   =>'No Induk',
            'last_name' => 'Last name',
            'address' => 'Address',
            'foto'=>'Foto',
            'email' => 'Email',
            'date_of_birth' => 'Date of birth (yyyy-mm-dd)',
            'sex' => 'Sex (m/f)',
            'repassword' => 'Retype password',
        );
    }

}

?>