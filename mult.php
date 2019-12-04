<?php

if(isset($_POST['submit']))
{
	if(isset($_POST['items']))
	{
		foreach($_POST['items'] as $item)
		{
			print "$item ";
		}
	}
	else
	{
		echo "Select an option first!";
	}
}

?>