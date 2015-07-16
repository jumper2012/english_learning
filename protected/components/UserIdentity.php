<?php

class UserIdentity extends CUserIdentity {
    
// to store the current account's id 
    private $_id;

// override the CBaseUserIdentity::getId() 
// why should the method be overridden? 
// in CBaseUserIdentity, this method returns username, 
// in our case it shouldn't so we need to override it. 
    public function getId() {
        return($this->_id);
    }

// override the CBaseUserIdentity::authenticate
    public function authenticate() {
// find the account by its username 
        $user = User::model()->findByAttributes(
                array(
                    'username' => $this->username,
                )
        );
// tests the given password against account's 
        if ($user && $user->comparePassword($this->password)) {
// when it is successful, set the id with account's 
            $this->_id = $user->username;
// as it is a successful test, no erroroccurs 
            $this->errorCode = self::ERROR_NONE;
// returns the validation summary as TRUE 
            return (TRUE);
        }
// this two codes will only be executed when above test fails 
// set the error as unknown membership 
// and returns a FALSE value indicating a failed authentication 
        $this->errorCode = self::ERROR_UNKNOWN_IDENTITY;
        return (FALSE);
    }

}