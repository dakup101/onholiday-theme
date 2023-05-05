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
    $ido_lang = get_language_shortcode() == "pl" ? "pol" : "ger";
    $ido = new IdoBooking_API($ido_lang);
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
            <h3>Działasz w języku: <?php echo $ido->language; ?></h3>
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
            <input type="hidden" name="lang" id="idoLang" value="<?php echo get_language_shortcode() ?>">
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

            <input type="submit" value="Zapisz" class="ido-btn ido-btn-accent">
        </form>
        <div class="ido-inner">
            <h2>Pobierz i utwórz apartamenty z IdoBooking</h2>
            <p>Apartamenty z IdoBooking są przechowywane w systemie WP do wewnętrznego użytkowania strony. Istniejące
                apartamenty zostaną pominięte.</p>
            <button class="ido-make-posts ido-btn ido-btn-accent">Pobierz Apartamenty</button>
            <div class="ido-make-posts-output ido-output">
                <div class="ido-loading">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4335 4335" width="25" height="25">
                        <path fill="#FFA000" d="M3346 1077c41,0 75,34 75,75 0,41 -34,75 -75,75 -41,0 -75,-34 -75,-75 0,-41 34,-75 75,-75zm-1198 -824c193,0 349,156 349,349 0,193 -156,349 -349,349 -193,0 -349,-156 -349,-349 0,-193 156,-349 349,-349zm-1116 546c151,0 274,123 274,274 0,151 -123,274 -274,274 -151,0 -274,-123 -274,-274 0,-151 123,-274 274,-274zm-500 1189c134,0 243,109 243,243 0,134 -109,243 -243,243 -134,0 -243,-109 -243,-243 0,-134 109,-243 243,-243zm500 1223c121,0 218,98 218,218 0,121 -98,218 -218,218 -121,0 -218,-98 -218,-218 0,-121 98,-218 218,-218zm1116 434c110,0 200,89 200,200 0,110 -89,200 -200,200 -110,0 -200,-89 -200,-200 0,-110 89,-200 200,-200zm1145 -434c81,0 147,66 147,147 0,81 -66,147 -147,147 -81,0 -147,-66 -147,-147 0,-81 66,-147 147,-147zm459 -1098c65,0 119,53 119,119 0,65 -53,119 -119,119 -65,0 -119,-53 -119,-119 0,-65 53,-119 119,-119z" />
                    </svg>
                </div>
                <div class="ido-response">

                </div>
            </div>
        </div>
        <div class="ido-inner">
            <h2>Zaktualizuj apartamenty na stronie</h2>
            <p>Dopiero pobrałeś apartamenty na stronę? Zmiany? Nowe zdjęcia? Zaktualizuj swoje apartamenty, by wypełnić je w
                treści z IdoBooking</p>
            <button class="ido-update-posts ido-btn ido-btn-accent">Aktualizuj apartamenty</button>
            <div class="ido-update-posts-output ido-output">
                <div class="ido-loading">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 4335 4335" width="25" height="25">
                        <path fill="#FFA000" d="M3346 1077c41,0 75,34 75,75 0,41 -34,75 -75,75 -41,0 -75,-34 -75,-75 0,-41 34,-75 75,-75zm-1198 -824c193,0 349,156 349,349 0,193 -156,349 -349,349 -193,0 -349,-156 -349,-349 0,-193 156,-349 349,-349zm-1116 546c151,0 274,123 274,274 0,151 -123,274 -274,274 -151,0 -274,-123 -274,-274 0,-151 123,-274 274,-274zm-500 1189c134,0 243,109 243,243 0,134 -109,243 -243,243 -134,0 -243,-109 -243,-243 0,-134 109,-243 243,-243zm500 1223c121,0 218,98 218,218 0,121 -98,218 -218,218 -121,0 -218,-98 -218,-218 0,-121 98,-218 218,-218zm1116 434c110,0 200,89 200,200 0,110 -89,200 -200,200 -110,0 -200,-89 -200,-200 0,-110 89,-200 200,-200zm1145 -434c81,0 147,66 147,147 0,81 -66,147 -147,147 -81,0 -147,-66 -147,-147 0,-81 66,-147 147,-147zm459 -1098c65,0 119,53 119,119 0,65 -53,119 -119,119 -65,0 -119,-53 -119,-119 0,-65 53,-119 119,-119z" />
                    </svg>
                </div>
                <div class="ido-response">

                </div>
            </div>
        </div>
    </div>
    <style>
        <?php echo file_get_contents(THEME_DIR . "assets/compiled/ido-admin.css") ?>
    </style>
    <script src="<?php echo THEME_URI . "assets/js/ido-admin.js" ?>">
        <?php

    }
        ?>