<?php

$message = Tache::order_by_desc('id')->find_many();
foreach ($message as $one) {

?>
<article class="col-xs-12">
          Auteur : <?php echo $one->auteur ?> <br />Texte : <?php echo $one->texte ?> <br /><br />
</article>
<?php
}
