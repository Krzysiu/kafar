# KAFAR
## Krzysiu Advanced FontAwesome Renderer

This is the manual for setting up Wordpress version. You may want to read [main page of the plugin](https://github.com/Krzysiu/kafar/blob/master/README.md), where you'll find general manual and other versions.

## Wordpress version

### Installation
    
1) Upload this file to main directory of your theme. Remember about good practice - create child theme!
2) Add these lines to the bottom of the file "functions.php", which should be present in same directory: `require "shortcode.wordpress.php"; add_shortcode('ico', 'krzysiu_fa_shortcode');`
3) Optionally customize first parameter of the `add_shortocde()` function (`'ico'`) if you want to use different name for shortcode
		
### Usage

First parameter is the array of parameters.

    {fa ico="heart" color="red"}
		
This shortcode would show red heart icon.
