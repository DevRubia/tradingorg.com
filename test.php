<?php
echo"made it to docker full G";
cmd="curl -s -v http://stackoverflow.com -H 'Test:1234' --stderr -";
result=`$cmd | grep "Test:"`;
echo $result

?>