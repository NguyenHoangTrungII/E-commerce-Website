<?php
 $now = time(); // or your date as well
 $your_date = strtotime("2022-12-14");
 $datediff = $now - $your_date;
echo round($now / (60 * 60 * 24));
