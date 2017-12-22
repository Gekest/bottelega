
<?php 
session_start();
ob_start();
require '../style/head.php';
require '../classes/PDO.php';
require '../classes/My_Class.php';
if (!isset($_COOKIE['secretkey']) or $_COOKIE['secretkey'] != $secretkey) {
    header("Location: /admin/login.php");
    exit;
}
$My_Class->title(" Главная");

if (!isset($_COOKIE['secretkey']) or $_COOKIE['secretkey'] != $secretkey) {

if (isset($_GET['get_save']) and isset($_POST['submit'])) {

if(($_POST['captcha']) ==  $_SESSION['captcha'])
{	
if(($_POST['secretkey']) == $password) 
{
$time = time();
setcookie('secretkey', $secretkey, time()+86400, '/');
setcookie('time', md5($time), time()+86400, '/');
setcookie('password', base64_encode($time), time()+86400, '/');

    unset($_SESSION['login']);
    unset($_SESSION['courier']);
    $_SESSION['login'] = 'Admin';
header("Location: login.php"); 
}
else
{
echo '<div class="alert alert-danger">Неверный секретный ключ!</div>';
}
}
else
{
echo '<div class="alert alert-danger">Неверный код с картинки!</div>';
}	
}
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
}
else
{

?>

     <ol class="breadcrumb float-right">
                <li><a href="/admin"> Главная</a></li>
               
            </ol><div class="clearfix"></div></div></div></div>      

                           

                        <div class="row">
                            <div class="col-lg-8">

                                <div class="row">
 
                                    <div class="col-sm-4">
                                        <div class="card-box widget-box-four">
                                            <div id="dashboard-1" class="widget-box-four-chart"></div>
                                            <div class="wigdet-four-content pull-left">
                                                <h4 class="m-t-0 font-16 m-b-5 font-600 text-overflow" title="Total Revenue">Продано на</h4>
                                                <p class="font-secondary text-muted"></p>
                                                <?
            $query = DB::$the->query("SELECT * FROM `sel_set_qiwi` order by `id` ");
            while($res = $query->fetch()) {

                $act = DB::$the->query("SELECT active FROM `sel_set_qiwi` where `id` = '".$res['id']."' ");
                $act = $act->fetch(PDO::FETCH_ASSOC);

                $profit = DB::$the->query("SELECT * FROM sel_set_bot");
                $profit = $profit->fetch(PDO::FETCH_ASSOC);

                ?> <? } ?>
				<h3 class="m-b-0 m-t-20 font-600"><span data-plugin="counterup"><?=$profit['profit_qiwi']?> </span>.руб</h3> 
                                            </div>
											<div class="clearfix"></div>
                                        </div>
                                    </div><!-- end col -->
                                   

 <?  
$total = DB::$the->query("SELECT * FROM `sel_users` ");
$total = $total->fetchAll();
if(isset($_GET['super'])) {
?><? } ?>

                                    <div class="col-sm-4">
                                        <div class="card-box widget-box-four">
                                            <div id="dashboard-2" class="widget-box-four-chart"></div>
                                            <div class="wigdet-four-content pull-left">
                                                <h4 class="m-t-0 font-16 font-600 m-b-5 text-overflow" title="Total Unique Visitors">Покупателей</h4>
                                                <p class="font-secondary text-muted"></p>
                                                <h3 class="m-b-0 m-t-20 font-600"><span></span> <span data-plugin="counterup"><?=count($total)?></span></h3>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div><!-- end col -->

  <?  
$total = DB::$the->query("SELECT * FROM `sel_couriers` ");
$total = $total->fetchAll();
if(isset($_GET['super'])) {
?><? } ?>                                  <div class="col-sm-4">
                                        <div class="card-box widget-box-four">
                                            <div id="dashboard-3" class="widget-box-four-chart"></div>
                                            <div class="wigdet-four-content pull-left">
                                                <h4 class="m-t-0 font-16 font-600 m-b-5 text-overflow" title="Number of Transactions">Курьеров</h4>
                                                <p class="font-secondary text-muted"></p>
                                                <h3 class="m-b-0 m-t-20 font-600"><span></span> <span data-plugin="counterup"><?=count($total)?></span></h3>
                                          </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div><!-- end col -->
			
									
 
      
                               <div class="col-12">
                                        <div class="card-box">
                                            <h4 class="header-title m-t-0">Статистика</h4>
                                            <div class="text-center">
                                                <div class="row">
                                                   <?  
$total = DB::$the->query("SELECT * FROM `sel_orders` ");
$total = $total->fetchAll();
if(isset($_GET['super'])) {
?><? } ?>
												   <div class="col-4">
                                                        <div class="m-t-20 m-b-20">
                                                            <h4 class="m-b-10"><?=count($total)?></h4>
                                                            <p class="text-uppercase m-b-5 font-13 font-600">Общий объем продаж</p>
                                                        </div>
                                                    </div>
													
                                                    <div class="col-4">
                                                        <div class="m-t-20 m-b-20">
                                                            <h4 class="m-b-10"><?=$profit['profit_qiwi']?></h4>
                                                            <p class="text-uppercase m-b-5 font-13 font-600">СУММЫ ДОХОДА</p>
                                                        </div>
                                                    </div>
                                                    <?  
$total = DB::$the->query("SELECT * FROM `sel_users` ");
$total = $total->fetchAll();
if(isset($_GET['super'])) {
?><? } ?>
													<div class="col-4">
                                                        <div class="m-t-20 m-b-20">
                                                            <h4 class="m-b-10"><?=count($total)?></h4>
                                                            <p class="text-uppercase m-b-5 font-13 font-600">Покупателей</p>
                                                        </div>
                                                    </div>
													
                                                </div>
                                            </div>

                                            <div id="morris-bar-stacked" style="height: 310px;"></div>

                                      </div>

                                    </div><!-- end col -->

                                </div>
                                <!-- end row -->

                            </div><!-- end col -->

                              

                           


                 <div class="col-lg-4">
                       <div class="card-box">
                                    <h4 class="header-title m-t-0 m-b-15">Новости</h4>

                                    <div class="m-b-15">
                                        <p><span class="pull-right text-dark"></span> </p>
                                        <p class="font-13 m-b-5">Новостей нет</p>
                                        <p class="font-13"><i></i></p>
										</div>
                                 </div>
                            </div> <!-- end col -->

                        </div>
                        <!-- end row -->
<div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>Проданые товары</b></h4>
                                    <p class="text-muted font-14 m-b-20">
                                     
                                    </p>

                                  
                                        <table class="table m-0 table-colored table-primary table-hover">
                                            <thead>
        <tr>
            <th  style="text-align:center;">Комментарий</th>
            <th  style="text-align:center;">Товар</th>
            <th  style="text-align:center;">Добавил</th>
            <th  style="text-align:center;">Категория</th>
            <th  style="text-align:center;">Подкатегория</th>
            <th  style="text-align:center;">Покупатель</th>
        </tr>
    </thead>
<tbody>
<?

$total = DB::$the->query("SELECT * FROM `sel_keys` where `sale` = '1' ");
$total = $total->fetchAll();
$max = 5;
$pages = $My_Class->k_page(count($total),$max);
$page = $My_Class->page($pages);
$start=($max*$page)-$max;

$query = DB::$the->query("SELECT * FROM `sel_keys` where `sale` = '1' order by `id` DESC LIMIT $start, $max");
while($key = $query->fetch()) {
$cat = DB::$the->query("SELECT name FROM `sel_category` WHERE `id` = {$key['id_cat']} ");
$cat = $cat->fetch(PDO::FETCH_ASSOC);

$subcat = DB::$the->query("SELECT name FROM `sel_subcategory` WHERE `id` = {$key['id_subcat']} ");
$subcat = $subcat->fetch(PDO::FETCH_ASSOC);

$id_user = DB::$the->query("SELECT chat FROM `sel_orders` WHERE `id_key` = {$key['id']} ");
$id_user = $id_user->fetch(PDO::FETCH_ASSOC);		
?>
<tr>
            <td  align="center"><?=$key['id'];?></td>
            <td  align="center"><?=$key['code'];?></td>
             <td  align="center"><?=$key['role'];?></td>
            <td  align="center"><?=$cat['name'];?></td>
            <td  align="center"><?=$subcat['name'];?></td>
            <td  align="center"><a href="users.php?cmd=edit&chat=<?=$id_user['chat'];?>" class="on-default edit-row" data-toggle="tooltip" data-placement="top" title="" data-original-title="Редактировать"><i class="fa fa-pencil"></i></a></td>
</tr>
<?	


}

?>
</tbody>
</table>	
  </div>
                               
                            </div>
                        </div> <!-- end row -->
	<div class="row">
                            <div class="col-12">
                                <div class="card-box">
                                    <h4 class="m-t-0 header-title"><b>В наличии</b></h4>
                                    <p class="text-muted font-14 m-b-20">
                                     
                                    </p>

                                  
				
<table class="table m-0 table-colored table-success table-hover">
    <thead>
        <tr>
            <th  style="text-align:center;">Комментарий</th>
            <th  style="text-align:center;">Код</th>
            <th  style="text-align:center;">Добавил</th>
            <th  style="text-align:center;">Категория</th>
            <th  style="text-align:center;">Подкатегория</th>
        </tr>
    </thead>
<tbody>
<?

$total = DB::$the->query("SELECT * FROM `sel_keys` where `sale` = '0' ");
$total = $total->fetchAll();
$max = 10;
$pages = $My_Class->k_page(count($total),$max);
$page = $My_Class->page($pages);
$start=($max*$page)-$max;

$query = DB::$the->query("SELECT * FROM `sel_keys` where `sale` = '0' order by `id` DESC LIMIT $start, $max");
while($key = $query->fetch()) {
$cat = DB::$the->query("SELECT name FROM `sel_category` WHERE `id` = {$key['id_cat']} ");
$cat = $cat->fetch(PDO::FETCH_ASSOC);

$subcat = DB::$the->query("SELECT name FROM `sel_subcategory` WHERE `id` = {$key['id_subcat']} ");
$subcat = $subcat->fetch(PDO::FETCH_ASSOC);

$id_user = DB::$the->query("SELECT chat FROM `sel_orders` WHERE `id_key` = {$key['id']} ");
$id_user = $id_user->fetch(PDO::FETCH_ASSOC);		
?>
<tr>
            <td  align="center"><?=$key['id'];?></td>
            <td  align="center"><?=$key['code'];?></td>
            <td  align="center"><?=$key['role'];?></td>
            <td  align="center"><?=$cat['name'];?></td>
            <td  align="center"><?=$subcat['name'];?></td>
</tr>
<?	


}

?>
</tbody>
</table>
                                  
                                </div>
                            </div>
                        </div> <!-- end row -->


                    

<?

if(isset($_GET['exit'])) {	
setcookie('secretkey', $secretkey, time()-86400, '/');	
header("Location: login.php");
}	

}


?>
 
<?


$My_Class->foot();
?>