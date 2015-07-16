/**
 * Adobe's Strobe Media Playback.A Media Player Extension for Yii Framework.
 *
 * @author Spiros Kabasakalis <kabasakalis@gmail.com>
 * @link http://www.myspace.com/spiroskabasakalis
 * @copyright Copyright &copy; 2010 Spiros Kabasakalis Drumaddiction Inc,
 * @license The MIT License
 
 
 Adobe's  Strobe Media Playback player provides the following features:

•A standard appearance (the player’s “skin” or “chrome”) that is easy to customize.
•Playback for a wide variety of content types, including files of type FLV, SWF, F4V, MOV, MP4, JPG, and MP3; M3U playlists; and F4M metadata manifests.
•Support for both standard and advanced delivery methods, including progressive download, RTMP streaming, RTMP dynamic streaming, HTTP streaming, HTTP dynamic streaming, and live streaming. Flash Media Playback 1.5 and Strobe Media Playback 1.5 also provide support for RTMFP multicast content delivery.
•Automatic management of secure (DRM) content with Flash® Access™.
•Advanced playback, with digital video recorder (DVR) functionality, next/previous track seeking, and playlist navigation.
•Control of capabilities such as autoplay, autohide controls, poster frame definition, control bar positioning, and more, without the use of Flash authoring tools.
•Easy configuration with HTML.
•Simple integration of third-party plug-in services such as CDNs, advertising, and analytics. The flexible architecture gives you the option of compiling plug-ins statically or loading them dynamically, so plug-in providers can perform immediate upgrades and versioning.
•Quality of service (QoS) enhancements, including optimized buffering and dynamic (multi-bitrate) streaming.
•useHTML5,favorFlashOverHtml5Video options available.

See Strobe Media Playback Documentation PDF for more information.


INSTALLATION

Extract the zip file and place the smp folder in extensions folder of your Yii application.


USAGE IN VIEW FILE

Default values are set for the required variables,so a minimal configuration of the widget
 is required.Actually,all someone needs to display the player in a view is this code:
 
    <?php  $this->widget('application.extensions.smp.StrobeMediaPlayback') ?>
	
In this simple case,the default test video file URL that comes with SMP distribution will be loaded in the player.

 Basic  configuration example:
 
 <?php $this->widget('application.extensions.smp.StrobeMediaPlayback',array(
                              'srcRelative'=>'/[assets subfolder]/[filename].flv',    //OR
                              'src'=>'http://[domain]/[path]/[filename].flv', //OR
							  'src'=>'http://www.youtube.com/watch?v=yQGAedJcdlI',//Embed a video from youtube  with youtube 
							                                                                                                                               //plugin,included by default.
							  'src_title'=>'[Title for the media file,will show up above the player.]',
                              'playlistLinks'=>array(   'Title1'=>'URL1',                             //optional playlist
                                                                                  'Title2'=>'URL2',
                                                                                  'Title3'=>'URL3',
                                                                              ),
                              'width'=>'320',
                              'height'=>'240',
                              'allowFullScreen'=>'false'    //default is true
							 
));?>

   srcRelative is the path of the media file relative to the assets folder of your Yii application. It is converted into an absolute URL behind the scenes.
   src is the absolute URL path of the file to be loaded in the player,the default value is the test video that comes with SMP distribution.
   The choice between srcRelative and src is provided for convenience.If both are set,srcRelative will override src,see setSourceURL method.
   playlistLinks is an array of "title"=>'URL' pairs.It will generate a list of  media file links below the player. You still need to set src or srcRelative if you use a playlist for the default player content that you want loaded on initialization.
   You can set additional variables for more advanced configuration,check swfoject  and StrobeMediaPlayback
   documentation for details.If you choose to do so,you should first make sure that a public variable is declared in StrobeMediaPlayback.php class file and that the variable is echoed in swfobject.embedSWF call in strobeMediaPlayback.php view file.For example to set the loop variable ,(attribute of the params object  argument,see below), you should include  loop : "<?php echo $this->loop?>" in the params argument.
   The player can be used as an mp3 player,in that case  the screen area is not needed so it can be hidden  if  appropriate dimensions are set,like width 340 and height 30,for example.
   
   
   
   References
   
   Open Source Media Framework (OSMF).Download the  latest SMP  source files,including demos. 
   http://www.opensourcemediaframework.com/
   
   swfobject Documentation
   http://code.google.com/p/swfobject/wiki/documentation
   
   Video On the Web by Mark Pilgrim
   http://diveintohtml5.org/video.html
   
   HTML5VIDEO.ORG
   http://www.html5video.org/
   
   
   
 






