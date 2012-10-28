<p>Hai effettuato il logout. Stai per essere reindirizzato alla home...</p>

<script type="text/javascript">
setTimeout("window.location = '<?=ROOT?>'", 3000);
</script>

<?php

include LIB . 'session/delete.php';

die('<p><small><a href="'.ROOT.'">Clicca qui se non vuoi attendere oltre.</a></small></p>');