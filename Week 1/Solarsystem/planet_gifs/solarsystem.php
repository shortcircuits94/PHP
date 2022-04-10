<!DOCTYPE html>
<html>
<head>
	<title>Solar System Distance Chart</title>
</head>
	<body style="background-image: url(stars.gif); color:white">
	<?php
		$sun_km = 14000000;
		$mer_km = 58000000;
		$ven_km = 108000000;
		$ear_km = 150000000;
		$mars_km = 227000000;
		$jup_km = 779000000;
		$sat_km = 1428000000;
		$ura_km = 2974000000;
		$nep_km = 4506000000;
		$plu_km = 5913000000;
		
	?>
	
	<h2>Solar System Distance Chart by Rebecca Scott</h2>
	
	<table>
	<tr>
	<td><img src="sun.gif" alt="sun" width="56" height="56" /></td>
	<td> Sun (Diameter of the Sun is <?php echo "$sun_km";?> km)</td>
	</tr>
	<tr>
	<td><img src="mercury.gif" alt="mercury" width="56" height="56" /></td>
	<td> Mercury (<?php echo "$mer_km";?> km away from the sun) </td>
	</tr>
	<tr>
	<td> <img src="venus.gif" alt="venus" width="56" height="56" /></td>
	<td> Venus (<?php echo "$ven_km";?> km away from the sun) </td>
	</tr>
	<tr>
	<td><img src="earth.gif" alt="earth" width="56" height="56" /></td>
	<td> Earth (<?php echo "$ear_km";?> km away from the sun) </td>
	</tr>
	<tr>
	<td><img src="mars.gif" alt="mars" width="56" height="56" /></td>
	<td> Mars (<?php echo "$mars_km";?> km away from the sun)</td>
	</tr>
	<tr>
	<td><img src="jupiter.gif" alt="jupiter" width="56" height="56" /></td>
	<td> Jupiter (<?php echo "$jup_km";?> km away from the sun)</td>
	</tr>
	<tr>
	<td><img src="saturn.gif" alt="saturn" width="56" height="56" /></td>
	<td> Saturn (<?php echo "$sat_km";?> km away from the sun)</td>
	</tr>
	<tr>
	<td><img src="uranus.gif" alt="uranus" width="56" height="56" /></td>
	<td> Uranus (<?php echo "$ura_km";?> km away from the sun)</td>
	</tr>
	<tr>
	<td><img src="neptune.gif" alt="neptune" width="56" height="56" /></td>
	<td> Neptune (<?php echo "$nep_km";?> km away from the sun)</td>
	</tr>
	<tr>
	<td><img src="pluto.gif" alt="pluto" width="56" height="56" /></td>
	<td> Pluto (<?php echo "$plu_km";?> km away from the sun)</td>
	</tr>
	</table>
	
	<?php echo "\"<p>Space: the final frontier. These are the voyages of the starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before.\"<br> <em> - Captain James T. Kirk</p></em><br />"; 
	?>
	<?php echo "<br />Programmed by:\"Rebecca Scott\""; ?>
</body>
</html>
	
	