# [Miha Medical Popup Plugin](https://github.com/WowkDigital/wordpress-plugins/blob/main/miha_medical_popup.php)

## Description
The Miha Medical Popup Plugin displays a popup on the `/miha-medical` page. This popup is intended to verify that the visitor is a professional user of medical devices.

## Features
- Displays a popup on the `/miha-medical` page.
- Includes custom styles for the popup.
- Provides buttons for visitors to confirm their status or redirect to the homepage.

## Installation
1. Download the plugin files.
2. Upload the plugin folder to the `/wp-content/plugins/` directory.
3. Activate the plugin through the 'Plugins' menu in WordPress.

## Usage
Once activated, the plugin will automatically display the popup on the `/miha-medical` page.

## Code Overview

### Enqueue Scripts and Styles
The plugin first checks if the current page is `/miha-medical`. If so, it enqueues jQuery and hooks the popup styles and scripts to the footer.

```php
// Enqueue scripts and styles
function miha_medical_popup_enqueue_scripts() {
    if (is_page('miha-medical')) {
        wp_enqueue_script('jquery');
        add_action('wp_footer', 'miha_medical_popup_styles_and_scripts');
    }
}
add_action('wp_enqueue_scripts', 'miha_medical_popup_enqueue_scripts');
