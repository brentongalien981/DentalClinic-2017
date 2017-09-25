<div id="chat-widget" class="widgets">

    <div id="chat-widget-header-bar">

        <div id="chat-widget-action-bar">
            <?php if ($session->is_logged_in()) { ?>
                <i id="chat-list-icon" class="fa fa-list chat-widget-header-bar-icons"></i>
            <?php } else { ?>
                <button id="chat-with-us-button">Chat with us</button>
            <?php } ?>
        </div>

        <div id="chat-widget-status-bar"></div>

        <div id="chat-widget-window-action-bar">
            <i id="expand-chat-pod-icon" class="chat-widget-header-bar-icons fa fa-expand"></i>
            <i id="collapse-chat-pod-icon" class="chat-widget-header-bar-icons fa fa-window-minimize"></i>
        </div>

    </div>



    <div id="chat-list-section"></div>



    <div id="chat-pod-section"></div>

</div>