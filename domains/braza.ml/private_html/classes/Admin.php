<?
class Admin{



public function title($str) {
?>


   

<?
}

public function curier($str) {
?>
 </div>
			  <?
			  }


	
public function foot() {

?>

  
 <!-- jQuery  -->
        <script src="/style/js/jquery.min.js"></script>
        <script src="/style/js/tether.min.js"></script><!-- Tether for Bootstrap -->
        <script src="/style/js/bootstrap.min.js"></script>
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

        <!-- Sparkline charts -->
        <script src="../plugins/jquery-sparkline/jquery.sparkline.min.js"></script>

        <!-- Dashboard init -->
        <script src="/style/pages/jquery.dashboard-2.js"></script>

        <!-- App js -->
        <script src="/style/js/jquery.core.js"></script>
        <script src="/style/js/jquery.app.js"></script>

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



$Admin = new Admin;

?>

