<?php
    //Call Once to Log all request done by a user
    $System->isLoggedIn();
?>
<div class="e_404-container">
    <h1>Error 404!</h1>
    <p>Your requested site doesn't exists!</p>
    <br>
    <a  class="btn btn-primary" href="<?=PROJECT_HTTP_ROOT?>">Go Back to our Mainpage <i class="fa fa-angle-right" aria-hidden="true"></i></a>
    <a  class="btn btn-primary" href="<?=PROJECT_HTTP_ROOT?>support">Contact our support <i class="fa fa-angle-right" aria-hidden="true"></i></a>
</div>