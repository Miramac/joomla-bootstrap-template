<?php  
/*------------------------------------------------------------------------
# copyright Copyright © 2012 Vocatus AG All rights reserved.
# @license  GPL v3 http://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
# Website   http://www.vocatus.de
-------------------------------------------------------------------------*/

defined( '_JEXEC' ) or die( 'Restricted access' );

//** Variables & global config
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$params = $app->getParams();

$this->setGenerator(null); // remove the generator tag

// unset scripts, to place them at the end of the document
/* Joomla JS-files has to be in the head tag
unset($doc->_scripts[$this->baseurl.'/media/system/js/mootools-core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/core.js']);
unset($doc->_scripts[$this->baseurl.'/media/system/js/caption.js']);
*/


?><!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" >
	<head>
		<jdoc:include type="head" />
		<!-- enabling bootstraps responsive features -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Le styles -->
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
		
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/ico/apple-touch-icon-57-precomposed.png">

	</head>

	<body>
		
		<div class="container-fluid" id="page-content">
			<div class="navbar navbar-inverse navbar-fixed-top" id="header-01">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					
					<a class="brand" href="#">Joomla</a>
					<div class="nav-collapse collapse">
						<jdoc:include type="modules" name="position-1" /> 
					</div>
				</div>
			</div>
			</div>			
			<div class="row-fluid">
				<div class="span3" id="nav-01"><!-- main menu -->
					<div class="sidebar-nav">
						<jdoc:include type="modules" name="position-7" />
					</div>
				</div>
				<div class="span9" id="site-content"> 
					<div class="row-fluid"><!-- breadcrumbs -->
						<jdoc:include type="modules" name="position-2" />
					</div>
					<div class="row-fluid"><!-- site content -->
						<div class="site-content">
							<jdoc:include type="component" />
						</div>
					</div>
				</div>
				
			</div>	
		</div>
		
		
	
	
	<!--
		<jdoc:include type="modules" name="header-01" /> 
		<jdoc:include type="modules" name="header-02" /> 
		<jdoc:include type="modules" name="header-03" /> 
		<jdoc:include type="modules" name="footer-01" /> 
		<jdoc:include type="modules" name="footer-02" /> 
		<jdoc:include type="modules" name="footer-03" /> 
		-->
	
		<!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
		<!-- jQuery -->
		<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/jquery-1.8.1.min.js"></script>
		<!-- Bootstrap -->
    <script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/bootstrap.min.js"></script>
		<!-- Joomla Core 
			<script type="text/javascript" src="<?php echo $this->baseurl ?>/media/system/js/mootools-core.js"></script>
			<script type="text/javascript" src="<?php echo $this->baseurl ?>/media/system/js/core.js"></script>
			<script type="text/javascript" src="<?php echo $this->baseurl ?>/media/system/js/caption.js"></script>
		-->
		<!-- Template JS -->
		<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/js/script.js"></script>
		
		<jdoc:include type="modules" name="debug" />
	</body>
</html>