<?php
ob_start();
require '../style/head.php';
require '../classes/My_Class.php';
require '../classes/PDO.php';


if($_SESSION['courier'] == 'ok'){

    $My_Class->curier("Категории");

    if(isset($_GET['category'])){
        $header = DB::$the->query("SELECT id FROM `sel_category` WHERE `id` = '".intval($_GET['category'])."' ");
        $header = $header->fetchAll();
        if(count($header) == 0){
            header("Location: /admin/login.php");
            exit;
        }}
   if(isset($_GET['exit'])) {	
   unset($_SESSION['courier']);
   header("Location: courier.php"); }
   
    ?>
    <script type="text/javascript">
        $(function() {
            $(".btn").click(function(){
                $(this).button('loading').delay(3000).queue(function() {
                    $(this).button('reset');
                    $(this).dequeue();
                });
            });
        });
    </script>
    <?

    if(isset($_GET['cmd'])){$cmd = htmlspecialchars($_GET['cmd']);}else{$cmd = '0';}
    if(isset($_GET['category'])){$category = abs(intval($_GET['category']));}else{$category = '0';}

    switch ($cmd){
        case 'create':
            ?>
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="/admin"> Главная</a></li>
                <li class="breadcrumb-item"><a href="category.php">Категории</a></li>
                <li class="breadcrumb-item">Создание категории</li>
            </ol><div class="clearfix"></div></div></div></div> 
			
            <?

            $row = DB::$the->query("SELECT * FROM `sel_category` WHERE `id` = {$category} ");
            $cat = $row->fetch(PDO::FETCH_ASSOC);

        case 'remove_sale':

            ?>

            <?

            if(isset($_GET['ok'])) {
                DB::$the->query("DELETE FROM `sel_keys` WHERE `sale` = '1' ");

                header("Location: category.php");
            }

            break;

        default:

            ?>
			
            
<div class="row">
                            <div class="col-12">
                                <div class="card-box">

            <?

            $total = DB::$the->query("SELECT * FROM `sel_category` ");
            $total = $total->fetchAll();
            $max = 5;
            $pages = $My_Class->k_page(count($total),$max);
            $page = $My_Class->page($pages);
            $start=($max*$page)-$max;

            if(count($total) == 0){
                echo '<div class="alert alert-danger">Нет категорий!</div>';
            }

            echo '<div class="list-group">';
            $query = DB::$the->query("SELECT * FROM `sel_category` order by `mesto` LIMIT $start, $max");
            while($cat = $query->fetch()) {

                $total = DB::$the->query("SELECT id_cat FROM `sel_subcategory` WHERE `id_cat` = '".$cat['id']."' ");
                $total = $total->fetchAll();

                echo '<span class="list-group-item"><font color="green">['.$cat['mesto'].']</font> 
<a href="subcategory.php?category='.$cat['id'].'"><b>'.$cat['name'].'</b></a> ('.count($total).')';
                echo '</span>';
            }
            echo '</div>';

            if ($pages>1) $My_Class->str('?',$pages,$page);

            ?>

            <?
    }

    $My_Class->foot();

    exit();
}

////////////////////////////////////////////////////////////////////////////////////

if (!isset($_COOKIE['secretkey']) or $_COOKIE['secretkey'] != $secretkey) {
header("Location: /admin");
exit;
}

$My_Class->title("Категории");

if(isset($_GET['category'])){
$header = DB::$the->query("SELECT id FROM `sel_category` WHERE `id` = '".intval($_GET['category'])."' ");
$header = $header->fetchAll();
if(count($header) == 0){
header("Location: /admin");		
exit;
}}	

?>
<script type="text/javascript">  
 $(function() { 
    $(".btn").click(function(){
        $(this).button('loading').delay(3000).queue(function() {
            $(this).button('reset');
            $(this).dequeue();
        });        
    });
});  
</script>
<?

if(isset($_GET['cmd'])){$cmd = htmlspecialchars($_GET['cmd']);}else{$cmd = '0';}
if(isset($_GET['category'])){$category = abs(intval($_GET['category']));}else{$category = '0';}

switch ($cmd){
case 'create':
?>

<ol class="breadcrumb float-right">
  <li class="breadcrumb-item"><a href="/admin"> Главная</a></li>
  <li class="breadcrumb-item"><a href="category.php">Категории</a></li>
  <li class="breadcrumb-item">Создание категории</li>
</ol><div class="clearfix"></div></div></div></div>
<div class="row">
                            <div class="col-12">
                                <div class="card-box">
<?
if(isset($_POST['create'])) {

if($_POST['cat'] != "") {
$cat=$_POST['cat'];

$params = array( 'name' => ''.$cat.'', 'time' => ''.time().'', 'mesto' => '0');  
 
$q= DB::$the->prepare("INSERT INTO `sel_category` (name, time, mesto) VALUES (:name, :time, :mesto)");  
$q->execute($params);

header("Location: category.php");
}
else
{
echo '<div class="alert alert-danger">Пустое название</div>';
}
}

echo '<form action="category.php?cmd=create" method="POST">
<div class="form-group col-sm-8">
<div class="input-group input-group">
    <span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
<input type="text" placeholder="Название категории" class="form-control" name="cat" value="">
</div>
<br />
<button type="submit" name="create" class="btn btn-primary waves-effect w-md waves-light" data-loading-text="Создаю">Создать</button>
</div></form></div></div></div>';

break;
 	
case 'edit':	
?>


<ol class="breadcrumb float-right">
  <li class="breadcrumb-item"><a href="/admin"> Главная</a></li>
  <li class="breadcrumb-item"><a href="category.php">Категории</a></li>
  <li class="breadcrumb-item">Редактирование категории</li>
</ol><div class="clearfix"></div></div></div></div>

<div class="row">
<div class="col-12">
 <div class="card-box">
<?

$row = DB::$the->query("SELECT * FROM `sel_category` WHERE `id` = {$category} ");
$cat = $row->fetch(PDO::FETCH_ASSOC);

// Редактирование категории
if(isset($_POST['edit'])) {

if($_POST['name'] != "") {
$name=$_POST['name'];
$mesto=intval($_POST['mesto']);

DB::$the->prepare("UPDATE sel_category SET name=? WHERE id=? ")->execute(array("$name", $category)); 
DB::$the->prepare("UPDATE sel_category SET mesto=? WHERE id=? ")->execute(array("$mesto", $category)); 

header("Location: category.php");
}
else
{
echo '<div class="alert alert-danger">Пустое название</div>';
}
}


echo '<form action="?cmd=edit&category='.$category.'" method="POST">
<div class="form-group col-sm-8">
<div class="input-group input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span> </span>
<input type="text" placeholder="'.$cat['name'].'" class="form-control" name="name" value="'.$cat['name'].'">
</div><br />
<div class="input-group input-group">
<span class="input-group-addon"><span class="glyphicon glyphicon-flag"></span> </span>
<input type="text" placeholder="'.$cat['mesto'].'" class="form-control" name="mesto" value="'.$cat['mesto'].'">
</div><br />
<button type="submit" name="edit" class="btn btn-primary waves-effect w-md waves-light" data-loading-text="Изменяю">Изменить</button>
</div></form></div></div></div>';

	
break;

case 'delete':	
$row = DB::$the->query("SELECT * FROM `sel_category` WHERE `id` = '".$category."'");
$cat = $row->fetch(PDO::FETCH_ASSOC);
?>

<ol class="breadcrumb float-right">
  <li class="breadcrumb-item"><a href="/admin"> Главная</a></li>
  <li class="breadcrumb-item"><a href="category.php">Категории</a></li>
  <li class="breadcrumb-item">Удаление категории: <b><?=$cat['name'];?></b></li>
</ol><div class="clearfix"></div></div></div></div>
<div class="row">
                            <div class="col-12">
                                <div class="card-box">
<div class="alert alert-danger">Будут удалены все подкатегории данной категории и товары из всех подкатегорий данной категории!</div>

<div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-loading-text="Думаем" data-toggle="dropdown">Вы уверены? <span class="caret"></span></button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="?cmd=delete&category=<?=$category;?>&ok">Да, удалить</a></li>
    <li class="divider"></li>
    <li><a href="category.php">Нет, отменить</a></li>
  </ul>
  
  
</div>
</div></div></div>
<?

if(isset($_GET['ok'])) {
DB::$the->query("DELETE FROM `sel_category` WHERE `id` = '".$category."' ");
DB::$the->query("DELETE FROM `sel_subcategory` WHERE `id_cat` = '".$category."' ");
DB::$the->query("DELETE FROM `sel_keys` WHERE `id_cat` = '".$category."' ");

header("Location: category.php");
}

break;

case 'remove_sale':	

?>

<ol class="breadcrumb float-right">
  <li class="breadcrumb-item"><a href="/admin"> Главная</a></li>
  <li class="breadcrumb-item"><a href="category.php">Категории</a></li>
  <li class="breadcrumb-item">Удаление всех проданных товаров</b></li>
</ol>
<div class="row">
                            <div class="col-12">
                                <div class="card-box">
<div class="alert alert-danger">Будут удалены все проданные товары из всех категорий!</div>

<div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-loading-text="Думаем" data-toggle="dropdown">Вы уверены? <span class="caret"></span></button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="?cmd=remove_sale&ok">Да, удалить все проданные товары</a></li>
    <li class="divider"></li>
    <li><a href="category.php">Нет, отменить</a></li>
  </ul>
</div>
</div></div></div>
<?

if(isset($_GET['ok'])) {
DB::$the->query("DELETE FROM `sel_keys` WHERE `sale` = '1' ");

header("Location: category.php");
}

break;
	
default:

?>

<ol class="breadcrumb float-right">
  <li class="breadcrumb-item"><a href="/admin"> Главная</a></li>
  <li class="breadcrumb-item">Категории</li>
</ol><div class="clearfix"></div></div></div></div>


<a class="list-group-item" href="?cmd=create">
Создать категорию
</a>

<?



$total = DB::$the->query("SELECT * FROM `sel_category` ");
$total = $total->fetchAll();
$max = 5;
$pages = $My_Class->k_page(count($total),$max);
$page = $My_Class->page($pages);
$start=($max*$page)-$max;

if(count($total) == 0){
echo '<div class="alert alert-danger">Нет категорий!</div>';
}	

echo '<div class="table table-striped add-edit-table dataTable no-footer">';
$query = DB::$the->query("SELECT * FROM `sel_category` order by `mesto` LIMIT $start, $max");
while($cat = $query->fetch()) {

$total = DB::$the->query("SELECT id_cat FROM `sel_subcategory` WHERE `id_cat` = '".$cat['id']."' ");
$total = $total->fetchAll();
	
echo '<span class="list-group-item"><font color="green">['.$cat['mesto'].']</font> 
<a href="subcategory.php?category='.$cat['id'].'"><b>'.$cat['name'].'</b></a> ('.count($total).')';
echo '<a class="on-default edit-row" href="?cmd=edit&category='.$cat['id'].'"> <i class="fa fa-pencil"></i></a>';
echo '<a class="on-default remove-row" href="?cmd=delete&category='.$cat['id'].'&hash='.md5($_cat['time']).'"> <i class="fa fa-trash-o"></i></a>';
echo '</span>';
}
echo '</div>';

if ($pages>1) $My_Class->str('?',$pages,$page); 

?>

<a class="btn btn-icon waves-effect waves-light btn-danger" href="?cmd=remove_sale">
 Удалить все проданные товары
</a>


<?
}

$My_Class->foot();
?>