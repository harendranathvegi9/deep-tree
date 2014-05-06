<?php

// http://www.brandonheyer.com/2013/03/27/convert-hsl-to-rgb-and-rgb-to-hsl-via-php/

//--------------------------------------------------------------------------------------------------
function rgbToHsl( $r, $g, $b ) {
	$oldR = $r;
	$oldG = $g;
	$oldB = $b;

	$r /= 255;
	$g /= 255;
	$b /= 255;

    $max = max( $r, $g, $b );
	$min = min( $r, $g, $b );

	$h;
	$s;
	$l = ( $max + $min ) / 2;
	$d = $max - $min;

    	if( $d == 0 ){
        	$h = $s = 0; // achromatic
    	} else {
        	$s = $d / ( 1 - abs( 2 * $l - 1 ) );

		switch( $max ){
	            case $r:
	            	$h = 60 * fmod( ( ( $g - $b ) / $d ), 6 ); 
                        if ($b > $g) {
	                    $h += 360;
	                }
	                break;

	            case $g: 
	            	$h = 60 * ( ( $b - $r ) / $d + 2 ); 
	            	break;

	            case $b: 
	            	$h = 60 * ( ( $r - $g ) / $d + 4 ); 
	            	break;
	        }			        	        
	}

	return array( round( $h, 2 ), round( $s, 2 ), round( $l, 2 ) );
}

//--------------------------------------------------------------------------------------------------
function hslToRgb( $h, $s, $l ){
    $r; 
    $g; 
    $b;

	$c = ( 1 - abs( 2 * $l - 1 ) ) * $s;
	$x = $c * ( 1 - abs( fmod( ( $h / 60 ), 2 ) - 1 ) );
	$m = $l - ( $c / 2 );

	if ( $h < 60 ) {
		$r = $c;
		$g = $x;
		$b = 0;
	} else if ( $h < 120 ) {
		$r = $x;
		$g = $c;
		$b = 0;			
	} else if ( $h < 180 ) {
		$r = 0;
		$g = $c;
		$b = $x;					
	} else if ( $h < 240 ) {
		$r = 0;
		$g = $x;
		$b = $c;
	} else if ( $h < 300 ) {
		$r = $x;
		$g = 0;
		$b = $c;
	} else {
		$r = $c;
		$g = 0;
		$b = $x;
	}

	$r = ( $r + $m ) * 255;
	$g = ( $g + $m ) * 255;
	$b = ( $b + $m  ) * 255;

    return array( floor( $r ), floor( $g ), floor( $b ) );
}


if (0)
{
	echo '<html>';
	
	$hsl = array(0, 1, 0.5);
	print_r($hsl);
	
	echo '<div style="width:32px;height:32px;background-color:rgb(' . join(',', hslToRgb($hsl[0], $hsl[1], $hsl[2])) . ');"></div>';
	
	$hsl = array(45, 1, 0.5);
	print_r($hsl);
	
	echo '<div style="width:32px;height:32px;background-color:rgb(' . join(',', hslToRgb($hsl[0], $hsl[1], $hsl[2])) . ');"></div>';
	
	$hsl = array(60, 1, 0.5);
	print_r($hsl);
	
	echo '<div style="width:32px;height:32px;background-color:rgb(' . join(',', hslToRgb($hsl[0], $hsl[1], $hsl[2])) . ');"></div>';
	
	
	$hsl = array(90, 1, 0.5);
	print_r($hsl);
	
	echo '<div style="width:32px;height:32px;background-color:rgb(' . join(',', hslToRgb($hsl[0], $hsl[1], $hsl[2])) . ');"></div>';
	
	
	$hsl = array(180, 1, 0.5);
	print_r($hsl);
	
	echo '<div style="width:32px;height:32px;background-color:rgb(' . join(',', hslToRgb($hsl[0], $hsl[1], $hsl[2])) . ');"></div>';
	
	$hsl = array(225, 1, 0.5);
	print_r($hsl);
	
	echo '<div style="width:32px;height:32px;background-color:rgb(' . join(',', hslToRgb($hsl[0], $hsl[1], $hsl[2])) . ');"></div>';
	
	$hsl = array(270, 1, 0.5);
	print_r($hsl);
	
	echo '<div style="width:32px;height:32px;background-color:rgb(' . join(',', hslToRgb($hsl[0], $hsl[1], $hsl[2])) . ');"></div>';
	
	$hsl = array(315, 1, 0.5);
	print_r($hsl);
	
	echo '<div style="width:32px;height:32px;background-color:rgb(' . join(',', hslToRgb($hsl[0], $hsl[1], $hsl[2])) . ');"></div>';
	
	echo '</html>';
	
}	

?>