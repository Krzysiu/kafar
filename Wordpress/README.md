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

### Donations
Donation button | Note about author | :)
------------ | ------------- | -----------
[![](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=RVJ35VQGHAH6J) | Hello! My name is **Krzysztof "Krzysiu" Blachnicki** and I'm Polish developer, amateur photographer and **open source software/content creator** since about 15 years.<br>I'll be **truly honored with your donation**! But don't worry, I won't say "*if you won't donate, I won't code for free anymore*". I will code no matter what, because **I enjoy it**! | ![The author's face](http://krzysiu.net/wp-content/uploads/krzysiu.photo.png)




