<?php $title = "VVA - Animations" ?>

<?php ob_start(); ?>

<?php echo "All Animations" ?>

<?php
echo "<br>";
foreach ($animations as $animation) {
  echo "<br>";
  echo $animation->CODEANIM;
}

?>

<?php $content = ob_get_clean(); ?>
<?php require("view/template.php"); ?>
