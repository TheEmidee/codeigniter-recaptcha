This is a Recaptcha integration as a library inside CodeIgniter

To use it, you just need to setup your private and public keys in config/recaptcha.php, and then use the library functions get_html() to display the recaptcha html, and is_valid() to check the result of what the user entered.

Please note that this library will load the input library automatically.