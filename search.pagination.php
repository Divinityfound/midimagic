<?php
	$pageList = "";
	for ($i = 0;$i < $pageCount;$i++)
	{
		if ($i == 0)
		{
			if ($currentPage == 1)
			{
				$pageList = '<li class="disabled"><a href="#"><</a></li>';
			}
			else
			{
				$pageList = '<li><a href="'.SEARCHURL.'&page='.($currentPage-1).'"><</a></li>';
			}
		}
		if ($currentPage == $i+1)
		{
			$pageList .= '<li class="active"><a href="'.SEARCHURL.'&page='.($i+1).'">'.($i+1).'</a></li>';
		}
		else
		{
			$pageList .= '<li><a href="'.SEARCHURL.'&page='.($i+1).'">'.($i+1).'</a>';
		}
		if ($i+1 >= $pageCount)
		{
			if ($currentPage >= $pageCount)
			{
				$pageList .= '<li class="disabled"><a href="#">></a></li>';
			}
			else
			{
				$pageList .= '<li><a href="'.SEARCHURL.'&page='.($currentPage+1).'">></a></li>';
			}
		}
	}
	$prevNext = sprintf($prevNext,$pageList);
?>