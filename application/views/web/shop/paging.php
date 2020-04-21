<div class="paginations text-center mt-20">
	<ul>
<?php
$showPage = 0;
if ($noPage > 1) echo  "<li><a href='javascript:void(0)' onClick=\"tampil_data('".($noPage-1)."')\" ><i class='fa fa-angle-left'></i></a></li>";

for($page=1; $page<=$jumPage; $page++)
{
	if ((($page >= $noPage - 2) && ($page <= $noPage + 2)) || ($page == 1) || ($page == $jumPage))
	{
		if (($showPage == 1) && ($page != 2))  echo "<li><a href='#'>...</a></li>";
	  	if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "<li><a href='#'>...</a></li>";
	  	if ($page == $noPage) echo "<li class='active'><a href='#'>".$page."</a></li>";
	  	else echo "<li><a href='javascript:void(0)' onClick=\"tampil_data('".$page."')\">".$page."</a></li>";
	  	$showPage = $page;
	}
}

if ($noPage < $jumPage) echo "<li><a href='javascript:void(0)' onClick=\"tampil_data('".($noPage+1)."')\"><i class='fa fa-angle-right'></i></a></li>";
?>
</ul>
</div>