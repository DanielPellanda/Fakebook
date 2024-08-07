<?php

// Connect config helper
require_once '../../init.php';
require_once $cfg->GetAbsolutePath('dashboardhelp');

$cfg->ValidateSession();
InitSessionVars();

// Initialize the editor
require_once $cfg->GetAbsolutePath('posteditorhelp');

$show_preview = false;

$ids = array (
  'main' => 'divMainContainer',
	'filter' => 'selFilter',
);

$strings = array(
	'header' => ' Home ',
	'all_posts' => ' Tutti i Post ',
	'priv_posts' => ' Post dei Seguiti ',
	'placeholder_filter' => 'Filtra'
);

?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<?php $cfg->PrintHeadTitle($_SESSION['context']) ?> 
	<?php $cfg->IncludeStylesheets() ?>
	<script>
        let userId = "<?php echo $_SESSION['userid'] ?>";
		let idList = {
		<?php
			foreach ($ids as $key => $id) {
				echo $key.': "'.$id.'", 
				';
			}
		?>
		};

		let allPostKey = "<?php echo $strings['all_posts'] ?>";
		let privPostKey = "<?php echo $strings['priv_posts'] ?>";
	</script>
  </head>
  <body class="hold-transition layout-top-nav">
    <div class="wrapper">
      <?php include $cfg->GetAbsolutePath('navbar') ?>
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container">
            <div class="row mb-2">
              <div class="col-7 col-md-9">
                <h3 class="m-0"><?php echo ' '.$_SESSION['context'].' ' ?></h3>
              </div>
			  <div class="col-5 col-md-3">
				<label for="<?php echo $ids['filter'] ?>" hidden><?php echo $strings['placeholder_filter'] ?></label>
			  	<select class="form-control" id="<?php echo $ids['filter'] ?>">
                  <option><?php echo $strings['all_posts'] ?></option>
                  <option><?php echo $strings['priv_posts'] ?></option>
                </select>
			  </div>
            </div>
          </div>
        </div>
        <!-- Main content -->
        <div class="content">
          <div class="container">
            <div class="row">
              <div class="col-lg-12" id="<?php echo $ids['main'] ?>">
				        <!-- Add new post card -->
                <?php require $cfg->GetAbsolutePath('posteditor') ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="<?php echo $cfg->GetURL('dashboardscript') ?>"></script>
    <script src="<?php echo $cfg->GetURL('postscript') ?>"></script>
    <script src="<?php echo $cfg->GetURL('postcommentscript') ?>"></script>
  </body>
</html>