<?php
function ido_admin()
{
    add_menu_page(
        'Integracja IdoBooking',
        'Ido Booking',
        'manage_options',
        'idobooking',
        'ido_admin_content',
        'dashicons-admin-generic',
    );
}

add_action('admin_menu', 'ido_admin');


function ido_admin_content()
{
    $ido = new IdoBooking;
    $client_upd = false;


    if (isset($_POST["action"])) {
        switch ($_POST["action"]) {
            case "update_db": {
                    if (
                        isset($_POST["clientID"]) && !empty($_POST["clientID"])
                        && isset($_POST["clientLogin"]) && !empty($_POST["clientLogin"])
                        && isset($_POST["clientPWD"]) && !empty($_POST["clientPWD"])
                    ) {
                        $client_upd = $ido->update_db($_POST["clientID"], $_POST["clientLogin"], $_POST["clientPWD"]);
                    }
                    break;
                }
            default: {
                    break;
                }
        }
    }

    $client = (object) $ido->get_client();

?>
    <div class="ido-container">
        <div class="ido-inner">
            <h1>Integracja IdoBooking</h1>
            <h3>v.2.0</h3>
        </div>
        <form class="ido-inner" method="POST" action="/wp-admin/admin.php?page=idobooking">
            <h2>Podaj dane do konta z dostępem do API</h2>
            <?php if ($client_upd) : ?>
                <div class="ido-msg">
                    Zaktualizowano dostęp do API
                </div>
            <?php endif; ?>
            <input type="hidden" name="action" value="update_db">
            <input type="hidden" name="page" value="idobooking">
            <div class="ido-input-group">
                <label for="clientID">ID klienta:</label>
                <input type="text" id="clientID" name="clientID" value="<?php if (!empty($client)) echo $client->systemClient ?>">
            </div>
            <div class="ido-input-group">
                <label for="clientLogin">Login klient (e-mail):</label>
                <input type="email" id="clientLogin" name="clientLogin" value="<?php if (!empty($client)) echo $client->systemLogin ?>">
            </div>
            <div class="ido-input-group">
                <label for="clientPwd">Hasło:</label>
                <input type="password" id="clientPWD" name="clientPWD" value="<?php if (!empty($client)) echo $client->systemPwd ?>">
            </div>

            <input type="submit" value="Zapisz" class="ido-btn btn-accent">
        </form>
    </div>
    <style>
        <?php echo file_get_contents(THEME_DIR . "assets/compiled/ido-admin.css") ?>
    </style>
<?php

    $ido->print_client();
}
?>