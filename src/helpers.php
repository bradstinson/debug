<?php 

function debug($data = NULL, $benchmark = FALSE) {

    list($call) = debug_backtrace();
    echo '<style>body, div {padding:0;margin:0;background:#fff;direction:ltr;}</style><div style="border-bottom:solid 1px #D8D8D8;background:#f1f1f1;color:#111;position:fixed;top:0px;left:0px;width:100%;padding:10px 20px;font-size:11px;font-family:arial,monospace;font-weight:normal;line-height:18px;">';
    
	echo ' ' . $call['file'] . ' @ line:' . $call['line'] . '</div><div style="background:#fff;padding:10px;padding-top:50px;"><pre>';
	if ((is_object($data) || is_array($data)) && ! function_exists('xdebug_call_function') )
	{
		// in default print_r is more clear for array/object
		print_r($data);
	}
	else
	{
		// if not array/object var_dump is better and is more detailed (for example in when data is boolean !)
		// or when xdebug installed it can style var_dump in output automatically
        @ini_set('html_errors', 1);
		var_dump($data);
	}
	echo '</pre>';
	echo '</div>';
	if ( ! empty($benchmark))
	{
		echo '</div>';
	}
	
	exit;	
}
