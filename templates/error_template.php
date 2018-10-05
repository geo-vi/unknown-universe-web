<?php
//Call Once to Log all request done by a user
$System->isLoggedIn();
?>
<div class="e_404-container">
    <h1><?=$System->error_handler->error_title?></h1>
    <p><?=$System->error_handler->error_msg?></p>
    <br>
    <a  class="btn btn-primary" href="<?=PROJECT_HTTP_ROOT?>">Go Back to our Mainpage <i class="fa fa-angle-right" aria-hidden="true"></i></a>
    <a  class="btn btn-primary" href="<?=PROJECT_HTTP_ROOT?>support">Contact our support <i class="fa fa-angle-right" aria-hidden="true"></i></a>
</div>