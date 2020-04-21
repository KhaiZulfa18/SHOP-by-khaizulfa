<div class="col-sm-6">
	Total Data : <?php echo $jumData; ?>
</div>

<div class="col-sm-6">
	<ul class="pagination pagination-sm m-0 float-right">
<?php
$showPage = 0;
if ($noPage > 1) echo  "<li class='page-item'><a class='page-link' href='javascript:void(0)' onClick=\"tampil_data('".($noPage-1)."')\" ><< Prev</a></li>";

for($page=1; $page<=$jumPage; $page++)
{
	if ((($page >= $noPage - 2) && ($page <= $noPage + 2)) || ($page == 1) || ($page == $jumPage))
	{
		if (($showPage == 1) && ($page != 2))  echo "<li class='page-item'><a class='page-link' href='#'>...</a></li>";
	  	if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "<li class='page-item'><a class='page-link' href='#'>...</a></li>";
	  	if ($page == $noPage) echo "<li class='page-item'><a class='page-link' href='#'>".$page."</a></li>";
	  	else echo "<li class='page-item'><a class='page-link' href='javascript:void(0)' onClick=\"tampil_data('".$page."')\">".$page."</a></li>";
	  	$showPage = $page;
	}
}

if ($noPage < $jumPage) echo "<li class='page-item'><a class='page-link' href='javascript:void(0)' onClick=\"tampil_data('".($noPage+1)."')\">Next >></a></li>";
?>
</ul>
</div>