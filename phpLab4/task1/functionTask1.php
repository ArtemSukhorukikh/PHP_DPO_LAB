<?php
    function functionForSearched ($matches)
	{
        $newVal = $matches[1] * 2;
		return "'".(string)$newVal."'";
	}

	echo preg_replace_callback("#'(\d+)'#", 'functionForSearched', $_POST['string']);