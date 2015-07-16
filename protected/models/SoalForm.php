<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class SoalForm extends CFormModel {
    //attributes
    public $id_kuis;
    
    public $id_soal;
    public $soal;
    public $id_file;
    public $jawaban;
    public $a;
    public $b;
    public $c;
    public $d;
    public $e;
    public $order;
    
    public function rules() {
        return array(
// safe attributes are assigned-able inall scenario types 
            array('id_kuis,id_soal,soal,id_file,jawaban,a, b,c , d,e,order,', 'safe'),
        );
    }
    
    
    public function attributeLabels() {
        return array(
            
            'id_kuis' => 'ID Kuis',
            'id_soal' => 'ID Soal',
            'soal' => 'Soal',
            'id_file'   =>'ID File',
            'jawaban' => 'Jawaban',
            'a' => 'A',
            'b'=>'B',
            'c' => 'C',
            'd' => 'D',
            'e' => 'E',
            'order' => 'Order',
        );
    }

}
?>
