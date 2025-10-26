<?php 
$this->layout('Layout', ['mainContent' => $this->fetch('Layout')]);
$this->start('mainContent');
$this->insert('Errors/Toasts');
?>

<!-- Add your content here to be displayed in the browser -->

<?php
$this->stop();



session_start();
session_destroy();
header("Location:/login");
?>
