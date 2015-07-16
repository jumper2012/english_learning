<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><b><?php echo "English Learning "; ?></b></i>DEL Institute of Technology</h1>

        <div>
      <?php $this->widget('application.extensions.s3slider.S3Slider',
        array(
             'images' => array(
                    array('images/banner/a.jpg', ''),
                    array('images/banner/b.jpg', ''),
                    array('images/banner/c.jpg', ''),
                    array('images/banner/e.jpg', ''),
              ),
              'width' => '910',
              'height' => '498',
        )
  );
       ?> 
            </div>
