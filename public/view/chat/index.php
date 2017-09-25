<!--css-->
<!--<link href="--><?//= LOCAL . "public/css/chat/index.css"; ?><!--" rel="stylesheet" type="text/css">-->
<link href="<?= LOCAL . "public/css/chat/read.css"; ?>" rel="stylesheet" type="text/css">



<!--CRUD-->
<?php  require_once(PUBLIC_PATH . "view/chat/read.php"); ?>
<?php // require_once(PUBLIC_PATH . "/__view/chat-list/delete.php"); ?>



<!--Templates-->
<?php // require_once(PUBLIC_PATH . "/__view/admin_tools/user_management/templates/users_container.php");   ?>



<!--Scripts-->
<!--<script src="--><?php //echo LOCAL . "/public/_scripts/chat/instance_vars.js"; ?><!--"></script>-->
<!--<script src="--><?php //echo LOCAL . "/public/_scripts/chat/general_functions.js"; ?><!--"></script>-->
<!--    <script src="--><?php //echo LOCAL . "/public/_scripts/chat/general_functions2.js"; ?><!--"></script>-->
<!--    <script src="--><?php //echo LOCAL . "/public/_scripts/chat/general_functions3.js"; ?><!--"></script>-->
<!--<script src="--><?php //echo LOCAL . "/public/_scripts/chat/create.js"; ?><!--"></script>-->
<!--<script src="--><?php //echo LOCAL . "/public/_scripts/chat/read.js"; ?><!--"></script>-->
<!--    <script src="--><?php //echo LOCAL . "/public/_scripts/chat/update.js"; ?><!--"></script>-->
<!--    <script src="--><?php //echo LOCAL . "/public/_scripts/chat/delete.js"; ?><!--"></script>-->
<!--<script src="--><?php //echo LOCAL . "/public/_scripts/chat/fetch.js"; ?><!--"></script>-->
<!--<script src="--><?php //echo LOCAL . "/public/_scripts/chat/ChatMessage.js"; ?><!--"></script>-->
<!--<script src="--><?php //echo LOCAL . "/public/_scripts/chat/event_listeners.js"; ?><!--"></script>-->
<!--    <script src="--><?php //echo LOCAL . "/public/_scripts/chat/event_listeners2.js"; ?><!--"></script>-->
<!--<script src="--><?php //echo LOCAL . "/public/_scripts/chat/event_handlers.js"; ?><!--"></script>-->
<!--<script src="--><?php //echo LOCAL . "/public/_scripts/chat/tasks.js"; ?><!--"></script>-->




<!--Supporting Scripts-->




<!--Sub-contents-->
<?php require_once(PUBLIC_PATH . "view/chat-list/index.php"); ?>
<?php require_once(PUBLIC_PATH . "view/chat-thread/index.php"); ?>
<?php require_once(PUBLIC_PATH . "view/chat-messages/index.php"); ?>




<!--Chat-menu-late-bind-scripts-->





<!--Late-bind-scripts-->
<?php // TODO:SECTION: Script for page title and main content late bind ?>
<!--    <script>document.getElementById("title").innerHTML = "Chat / FatBoy";</script>-->
<!--    <script>document.getElementById("middle").appendChild(document.getElementById("middle_content"));</script>-->




<!--Footer-->
<?php //include(PUBLIC_PATH . "/_layouts/footer.php"); ?>