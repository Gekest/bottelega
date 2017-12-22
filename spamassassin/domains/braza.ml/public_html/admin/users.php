<?php 
ob_start();
require '../style/head.php';
require '../classes/PDO.php';
require '../classes/My_Class.php';

$My_Class->title("Пользователи");

if (!isset($_COOKIE['secretkey']) or $_COOKIE['secretkey'] != $secretkey) {
header("Location: /admin");		
exit;
}

if(isset($_GET['cmd'])){$cmd = htmlspecialchars($_GET['cmd']);}else{$cmd = '0';}
if(isset($_GET['user'])){$user = abs(intval($_GET['user']));}else{$user = '0';}

?>

<?
 
switch ($cmd){
case 'edit':

?>
<ol class="breadcrumb float-right">
  <li class="breadcrumb-item"><a href="/admin"> Главная</a></li>
  <li class="breadcrumb-item"><a href="users.php">Пользователи</a></li>
  <li class="breadcrumb-item">Редактирование</li>
</ol><div class="clearfix"></div>
</div></div></div>

<?
if(isset($_POST['submit'])) {

if(isset($_GET['ok'])) {
	
if($_POST['ban']=='on') { $ban = '1'; }
else { $ban = '0'; }


DB::$the->prepare("UPDATE sel_users SET ban=? WHERE chat=? ")->execute(array($ban, intval($_GET['chat']))); 

}
else
{
?>
<div class="alert alert-danger"> Пустые данные!</div>
<?
}	
}
?>

	<div class="row">

                            <div class="col-sm-12">

                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            
                                        </div>
                                    </div>

                                    <table class="table table-striped add-edit-table" id="datatable-editable">
	
    <thead>
      <tr>
            <th  style="text-align:center;">№</th>
            <th  style="text-align:center;">Никнейм</th>
			<th  style="text-align:center;">Имя и Фамилия</th>
            <th  style="text-align:center;">Бан</th>
            <th  style="text-align:center;">Chat_id</th>
        </tr>
    </thead>
<tbody>
<?

$row = DB::$the->query("SELECT * FROM `sel_users` WHERE `chat` = '".intval($_GET['chat'])."'");
$user = $row->fetch(PDO::FETCH_ASSOC);

if($user['ban']==0) { $ban = 'Нет';	}
else { $ban = 'Да'; }
?>
<tr class="gradeX">
            <td><?=$user['id'];?></td>
            <td><?=$user['username'];?></td>
            <td><?=$user['first_name'];?> <?=$user['last_name'];?></td>
            <td><?=$ban;?></td>
            <td><?=$user['chat'];?></td>
</tr>

</tbody>
</table>


<form method="POST" action="?cmd=edit&chat=<?=intval($_GET['chat']);?>&ok">
<div class="form-group col-sm-8">

<hr>
<label><span class="glyphicon glyphicon-lock"></span>
<input name="ban" type="checkbox" <?if($user['ban']=='1')echo'checked';?>> 
Бан
</label>
<hr>

    <button type="submit" name="submit" class="btn btn-primary waves-effect w-md waves-light" data-loading-text="Изменяю">Изменить</button></form>
</div>
</div> 
</div> 
</div> 
<?
break;
	
default:

?>
<ol class="breadcrumb float-right">
  <li class="breadcrumb-item"><a href="/admin"> Главная</a></li>
  <li class="breadcrumb-item">Пользователи</li>
</ol><div class="clearfix"></div></div></div></div>
    <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
           

                      

                      
<div class="row">

                            <div class="col-sm-12">



                                <div class="card-box">
                                    

                                    <table class="table table-striped add-edit-table" id="datatable-editable">
                                        <thead>
                                        <tr>
                                           <th>№</th>
            <th>Никнейм</th>
			<th>Имя и Фамилия</th>
           
            <th>Изменить</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        
                                        
                                       


     


                                   
                                       
                                      
                                    
                                  
<?

$total = DB::$the->query("SELECT * FROM `sel_users` ");
$total = $total->fetchAll();
$max = 500;
$pages = $My_Class->k_page(count($total),$max);
$page = $My_Class->page($pages);
$start=($max*$page)-$max;

$query = DB::$the->query("SELECT * FROM `sel_users` order by `id` ASC LIMIT $start, $max");
while($user = $query->fetch()) {
if($user['ban']==0) { $ban = '<i class="mdi mdi-account"></i>';	}
else { $ban = '<i class="mdi mdi-account-off"></i>'; }
?><tr class="gradeX">
                                             <td><?=$user['id'];?></td>
            <td><?=$user['username'];?></td>
            <td><?=$user['first_name'];?> <?=$user['last_name'];?></td>
          
            <td class="actions">
			
			<? echo '<a data-toggle="tooltip" data-placement="top" title="" data-original-title="редактировать" href="?cmd=edit&chat='.$user['chat'].'"><i class="fa fa-pencil"></i></a>';?>
									<a href="#"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Статус покупателя"><?=$ban;?>	</a></td>
                                        </tr>

                               
<?	


}

?>

    </tbody>
                              </table>
                               
                            <!-- end: page -->

                        </div> <!-- end Panel -->
  </div> 
  </div> 
       



        
<?
}

$My_Class->foot();
?>
<script>
            $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
        </script>