<?php include("include.php"); ?>
<html>
<?php
$people = User::order_by_desc('note')->find_many();
                foreach ($people as $one) {
                  echo $one->cheval;
                }
                ?>
                </html>