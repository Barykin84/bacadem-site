<?php include('includes/header.php'); ?>
<div class="content-block">
<?php 
$page = $_GET['page'] ?? '0';

   switch($page){
    case 1:
        include('math_'.$_SESSION['lang'].'.php');
        break;
   
   case 2:
        include('phys_'.$_SESSION['lang'].'.php');
        break;
   
   case 3 :
        include('contact.php');
        break;

   case 4 :
        include('process_contact.php');
        break;

   case 5 :
        include('literature.php');
        break;

   default:
        include 'accueil_'.$_SESSION['lang'].'.php'; // page par défaut
        break;
   }

?>
</div>
<?php include('includes/footer.php'); ?>

