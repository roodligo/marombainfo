<?php
if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}
unset($_SESSION['email']);
unset($_SESSION['senha']);

?>
<script type="text/javascript">
    window.location.href = "../index.html";
</script>