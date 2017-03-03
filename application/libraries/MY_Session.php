<?php
class MY_Session extends CI_Session
{
	function sess_update()
	{
		//listen to HTTP_X_REQUESTED_WITH
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest')
		{
			parent::sess_update();
		}
	}
}
