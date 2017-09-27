<!--<link href="--><?//= LOCAL . "public/css/chat-list/index.css"; ?><!--" rel="stylesheet" type="text/css">-->
<link href="<?= LOCAL . "public/css/chat-list/read.css"; ?>" rel="stylesheet" type="text/css">

<?php  require_once(PUBLIC_PATH . "view/chat-list/read.php"); ?>
<?php // require_once(PUBLIC_PATH . "/__view/chat-list/delete.php"); ?>



<!--Scripts-->
<?php if ($session->is_logged_in()) { ?>
    <!--<script src="--><?php //echo LOCAL . "public/js/chat-list/instance_vars.js"; ?><!--"></script>-->
    <!--<script src="--><?php //echo LOCAL . "public/js/chat-list/general_functions.js"; ?><!--"></script>-->
    <!--<script src="--><?php //echo LOCAL . "public/js/chat-list/ChatList.js"; ?><!--"></script>-->
<!--    <script src="--><?php //echo LOCAL . "public/js/chat-list/read.js"; ?><!--"></script>-->
    <!--<script src="--><?php //echo LOCAL . "public/js/chat-list/event_handlers.js"; ?><!--"></script>-->
    <script src="<?php echo LOCAL . "public/js/chat-list/event_listeners.js"; ?>"></script>
<!--    <script src="--><?php //echo LOCAL . "public/js/chat-list/tasks.js"; ?><!--"></script>-->
<?php } ?>




<!--Extra scripts-->
<!--<script src="--><?php //echo LOCAL . "public/js/chat-list/_manage_thread.js"; ?><!--"></script>-->
