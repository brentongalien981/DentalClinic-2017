<div id="chat-widget" class="widgets">

    <div id="chat-widget-header-bar">

        <div id="chat-widget-action-bar">

            <?php if ($session->is_logged_in()) { ?>
                <i id="chat-list-icon" class="fa fa-list chat-widget-header-bar-icons"></i>
            <?php } else { ?>
                <button id="chat-with-us-button" class="btn btn-sm btn-info btn-round">Chat with us</button>
            <?php } ?>

        </div>


        <?php if ($session->is_logged_in()) { ?>
            <div>
                <h5 id="current-customer-name">Chatting with: </h5>
            </div>
        <?php } ?>


        <div id="chat-widget-status-bar">
            <h5 id="new-chat-msgs-counter" class="label label-danger"></h5>
        </div>

        <div id="chat-widget-window-action-bar">
            <i id="expand-chat-pod-icon" class="chat-widget-header-bar-icons fa fa-angle-double-up"></i>
            <i id="collapse-chat-pod-icon" class="chat-widget-header-bar-icons fa fa-angle-double-down"></i>
        </div>

    </div>


    <ul id="chat-list">
        <p id="empty-chat-list-msg">Sorry but you don't have customers to chat with yet.</p>
    </ul>
    <div id="chat-pod-section">
        <div id="chat-wall">
            <div id="chat-wall-default-msg">
                <p id="welcome-chat-message">Hi! We're very happy to serve you :)</p>
            </div>
        </div>

        <div id="chat-textarea-container">
            <textarea id="chat-textarea"></textarea>
        </div>

        <button id="send-chat-button" class="btn btn-md btn-success">send</button>
    </div>

</div>