<?php

class InputSoal extends CFormModel
{

    
    // for soal
    public $id_soal;
    public $soal; 
    public $jawaban; 
    public $a; 
    public $b; 
    public $c; 
    public $d;
    public $e;
    public $order;
    // for file 
    public $file; 
    public $jenis;
    
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
                        'id_soal'=> 'ID Soal',
			'soal' => 'Soal',
			'file' => 'File',
                        'jenis'=> 'Jenis',
			'jawaban' => 'Jawaban',
			'a' => 'A',
			'b' => 'B',
			'c' => 'C',
			'd' => 'D',
			'e' => 'E',
			'order' => 'Order',
		);
	}
        
        public function rules() { 
            return array( 
            // safe attributes are assigned-able inall scenario types 
            array('soal, jenis,  jawaban,  a,  b, c, d, e, order', 'safe'), 
            //array('file','file', 'types'=>'mp3', 'maxSize'=>1000000, 'tooLarge'=>'File has to be smaller than 20MB')  
                ); 
        }         
}