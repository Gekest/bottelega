<?
class My_Class{



public function title($str) {
?>



        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.php" class="logo">
                                <span>
                                  <h4 class="page-title float-left">NETGURBOT</h4>      
                                </span>
                        <i>
                      <h4 class="page-title float-left">NETGURBOT</h4>      
                        </i>
                    </a>
                </div>

                <nav class="navbar-custom">

                    <ul class="list-inline float-right mb-0">
                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <i class="dripicons-bell noti-icon"></i>
                                <span class="badge badge-pink noti-icon-badge">0</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg" aria-labelledby="Preview">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5><span class="badge badge-danger float-right">0</span>Сообщений</h5>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-success"><i class="icon-bubble"></i></div>
                                    <p class="notify-details">Нет сообщений<small class="text-muted">0</small></p>
                                </a>

                                

                               
                               

                            </div>
                        </li>

                        <li class="list-inline-item dropdown notification-list">
                            <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                               aria-haspopup="false" aria-expanded="false">
                                <img src="/style/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
                                <!-- item-->
                                <div class="dropdown-item noti-title">
                                    <h5 class="text-overflow"><small>Привет Администратор</small> </h5>
                                </div>

                                

                                <!-- item-->
                                <a href="set_bot.php" class="dropdown-item notify-item">
                                    <i class="zmdi zmdi-settings"></i> <span>Настройки</span>
                                </a>

                               

                                <!-- item-->
                                <a href="/admin/?exit" class="dropdown-item notify-item">
                                    <i class="zmdi zmdi-power"></i> <span>Выход</span>
                                </a>

                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-light waves-effect">
                                <i class="dripicons-menu"></i>
                            </button>
                        </li>
                        
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                  <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                         
                            <li>
                                <a href="/admin">
                                    <i class="fi-air-play"></i><span> Главная</span>
                                </a>
                               
                            </li>
                            <li>
                                <a href="category.php"><i class="fi-target"></i> <span>Списки товаров</span></a>
                               
                            </li>
							<li>
                                <a href="keys.php"><i class="fi-briefcase"></i> <span>Продажи</span></a>
                              
                            </li>
							<li>
                                <a href="users.php"><i class="fi-briefcase"></i> <span>Покупатели</span></a>
                              
                            </li>
							 <li>
                                <a href="courier.php"><i class="fi-bar-graph-2"></i><span> Курьеры</span></a>
                               
                            </li>


<li>
                             <a href="rassylka.php"><i class="fi-bar-graph-2"></i><span>Рассылка сообщений</span></a>
                            </li>
                            
                            <li>
                                <a href="set_bot.php"><i class="fi-help"></i><span>Настройки бота</span></a>
                            </li>

                            <li>
                                <a href="set_qiwi.php"><i class="fi-box"></i>Настройки оплаты</a>
                               
                            </li>

                           
                           

                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
          
 
    <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left"><?=$str;?></h4>                   

<?
}

public function curier($str) {
?>
 	  <?
			  }


	
public function foot() {

?>
</div> <!-- container -->

                </div> <!-- content -->

               
 </div> <!-- content -->
          

        </div>
        <!-- END wrapper -->

  
 <!-- jQuery  -->
        <script src="/style/js/jquery.min.js"></script>
        <script src="/style/js/tether.min.js"></script><!-- Tether for Bootstrap -->
        <script src="/style/js/bootstrap.min.js"></script>
		 <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="/style/js/metisMenu.min.js"></script>
        <script src="/style/js/waves.js"></script>
        <script src="/style/js/jquery.slimscroll.js"></script>

        <!-- Counter js  -->
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="../plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="../plugins/jquery-knob/jquery.knob.js"></script>
 <!--Morris Chart-->
        <script src="../plugins/morris/morris.min.js"></script>
        <script src="../plugins/raphael/raphael-min.js"></script>
        
		<!-- Examples -->
        <script src="../plugins/magnific-popup/js/jquery.magnific-popup.min.js"></script>
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="../plugins/tiny-editable/mindmup-editabletable.js"></script>
        <script src="../plugins/tiny-editable/numeric-input-example.js"></script>

        <!-- Sparkline charts -->
        <script src="../plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- Dashboard init -->
        <script src="/style/pages/jquery.dashboard-2.js"></script>
<!-- Sweet-Alert  -->
        <script src="../plugins/sweet-alert2/sweetalert2.min.js"></script>
        <script src="/style/pages/jquery.sweet-alert.init.js"></script>

      <!-- App js -->
        <script src="/style/js/jquery.core.js"></script>
        <script src="/style/js/jquery.app.js"></script>

        <script src="/style/pages/jquery.datatables.editable.init.js"></script>

        <script>
            $('#mainTable').editableTableWidget().numericInputExample().find('td:first').focus();
        </script>

</body>
<?

}



public function page($k_page=1)
{ 
	$page = 1;

	if (isset($_GET['page']))
	{
		if ($_GET['page'] == 'end')
			$page = intval($k_page);
			
		elseif(is_numeric($_GET['page'])) 
		$page = intval($_GET['page']);
	}

	if ($page < 1)$page = 1;

	if ($page > $k_page)
		$page = $k_page;
		
	return $page;
}

public function k_page($k_post = 0, $k_p_str = 10)
{ 
	if ($k_post != 0) 
	{
		$v_pages = ceil($k_post / $k_p_str);
		return $v_pages;
	}

	else return 1;
}

public function str($link = '?', $k_page = 1,$page = 1)
{ 
	if ($page < 1)
		$page = 1;

	echo '<div class="btn-group btn-group-justified">';

	
	if ($page != 1){
echo '<div class="btn-group"><a href="'.$link.'page=1" title="Начало"><button type="button" class="btn btn-default">Начало</button></a></div>';		
echo '<div class="btn-group"><a href="'.$link.'page='.($page-1).'" title="Назад"><button type="button" class="btn btn-default">Назад</button></a></div>';
	}else {
echo '<div class="btn-group"><button type="button" class="btn btn-default" disabled>Начало</button></div>';	
echo '<div class="btn-group"><button type="button" class="btn btn-default" disabled>Назад</button></div>';		
	}
	
	if ($k_page > 1)
echo '<div class="btn-group"><button type="button" id="showHideContent" class="btn btn-default" > <b>'.$page.'</b> из <b>'.$k_page.'</b></button></div>';	
	
		
	if ($k_page > 1 and $page!= $k_page)
echo '<div class="btn-group"><a href="'.$link.'page='.($page+1).'" title="Вперёд"><button type="button" class="btn btn-default">Вперёд</button></a></div>';
else
echo '<div class="btn-group"><button type="button" class="btn btn-default" disabled>Вперёд</button></div>';	
	if ($page!= $k_page)
echo '<div class="btn-group"><a href="'.$link.'page='.$k_page.'" title="Конец"><button type="button" class="btn btn-default">Конец</button></a></div>';
else
echo '<div class="btn-group"><button type="button" class="btn btn-default" disabled>Конец</button></div>';		
	
	echo '</div><br />';
	
	
	
echo '<div id="content" style="display:none;">';

	echo '<div class="btn-group btn-group-justified">';

	
?>

 <form method="POST" action="<?=$link?>&get"><div class="form-group col-sm-8"> 
    <div class="input-group">
      <input type="text" name="get" class="form-control">
      <span class="input-group-btn">
        <button type="submit" name="submit" class="btn btn-default">Перейти на страницу</button>
      </span>
  </div>

<?
if(isset($_GET['get']))	 {
header("Location: ".$link."page=".$_POST['get']."");		
}
	
	echo '</div><br />';
	
echo '</div>';	

?>
<script>
  $(document).ready(function(){

	    $("#showHideContent").click(function () {
			if ($("#content").is(":hidden")) {

				$("#content").show("slow");

			} else {

				$("#content").hide("slow");

			}
  return false;
});
});
</script>
<?
}

}



$My_Class = new My_Class;

?>

