<?php
/**
 * Landing page view file
 *
 * @var FrontendSiteController $this
 */
?>
<h1>Hello <?php echo Yii::app()->user->name;?></h1>

<p>
    This is the public side ("frontend") of your application.
    Everything related to it is contained inside <code>/frontend</code> subdirectory.
    You can treat this directory as a <code>/protected</code> subdirectory equivalent.
    Frontend is crystal clear HTML5 Boilerplate.
    It's expected that you are going to write your own 100% custom design anyway.
</p>

<p>Points of interest:</p>

<ul>
    <li>
        <p>
            <code>/backend/components/FrontendController.php</code> is the base for all frontend controllers.
            It registers all required styles and scripts for common frontend UI.
        </p>
    </li>
    <li>
        <p>Layout is <code>/frontend/views/layouts/main.php</code>.</p>
    </li>
    <li>
        <p>
            Note that in this layout there is the Google Analytics code already inserted as a widget.
            Just provide your GA ID in the <code>['params']['google.analytics.id']</code> section of a config,
            by specifying it in the <code>/frontend/config/environments/prod.php</code>, for example.
        </p>
    </li>
</ul>

<?php 
$user = Yii::app()->getComponent('user');
$user->setFlash(
    'success',
    "<strong>Well done!</strong> You're successful in reading this."
);
$user->setFlash(
    'info',
    "<strong>Heads up!</strong> I'm a valuable information!."
);
$user->setFlash(
    'warning',
    "<strong>Warning!</strong> Check yourself, you're not looking too good."
);
$user->setFlash(
    'error',
    '<strong>Oh snap!</strong> Change something and try submitting again.'
);
 
// Render them all with single `TbAlert`
$this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'events' => array(),
    'htmlOptions' => array(),
    'userComponentId' => 'user',
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'),
        'info', // you don't need to specify full config
        'warning' => array('block' => false, 'closeText' => false),
        'error' => array('block' => false, 'closeText' => 'AAARGHH!!')
    ),
));
?>

