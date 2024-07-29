<?php
/*
Plugin Name: Miha Medical Popup
Description: Displays a popup on the /miha-medical page
Version: 1.1
Author: Your Name
*/

// Enqueue scripts and styles
function miha_medical_popup_enqueue_scripts() {
    if (is_page('miha-medical')) {
        wp_enqueue_script('jquery');
        add_action('wp_footer', 'miha_medical_popup_styles_and_scripts');
    }
}
add_action('wp_enqueue_scripts', 'miha_medical_popup_enqueue_scripts');

// Add popup HTML, styles, and scripts to footer
function miha_medical_popup_styles_and_scripts() {
    ?>
    <style>
        .popup {
            display: flex;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }
        .popup-content {
            background-color: #fff;
            border-radius: 10px;
            padding: 2rem;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        }
        .popup h1 {
            text-align: center;
            color: #333;
            margin-bottom: 1.5rem;
        }
        .popup p {
            margin-bottom: 1rem;
            text-align: justify;
        }
        .popup .question {
            text-align: center;
            font-weight: bold;
            margin: 1.5rem 0;
        }
        .buttons-container {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }
        .btn-secondary:hover {
            background-color: #545b62;
        }
        .redirect-message {
            display: none;
            text-align: center;
            margin-top: 1rem;
            color: #dc3545;
            font-size: 0.9rem;
        }
    </style>

    <div class="popup" id="popup">
        <div class="popup-content">
            <h1>Witaj na stronie miha bodytec</h1>
            <p>
                Znajdujesz się na polskiej stronie internetowej miha bodytec. Niniejsza
                strona internetowa jest przeznaczona wyłącznie dla osób, które zawodowo
                korzystają z urządzeń medycznych, w tym pracowników służby zdrowia, osób
                pracujących dla dostawców usług opieki zdrowotnej lub sprzedawców
                urządzeń medycznych.
            </p>
            <p class="question">Czy spełniasz powyższe kryteria?</p>
            <div class="buttons-container">
                <button id="noBtn" class="btn btn-secondary">Nie, wracam na stronę główną</button>
                <button id="yesBtn" class="btn btn-primary">Tak, spełniam</button>
            </div>
            <div class="redirect-message" id="redirectMessage">
                Przekierowywanie na stronę główną...
            </div>
        </div>
    </div>

    <script>
    jQuery(document).ready(function($) {
        const popup = $('#popup');
        const yesBtn = $('#yesBtn');
        const noBtn = $('#noBtn');
        const redirectMessage = $('#redirectMessage');

        const closePopup = () => {
            popup.hide();
        };

        const redirectToHomepage = () => {
            redirectMessage.show();
            setTimeout(() => {
                window.location.href = '/';
            }, 2000);
        };

        yesBtn.on('click', closePopup);
        noBtn.on('click', redirectToHomepage);
    });
    </script>
    <?php
}
?>
