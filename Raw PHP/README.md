# KAFAR
## Krzysiu Advanced FontAwesome Renderer

This is the manual for setting up raw PHP version. You may want to read [main page of the plugin](https://github.com/Krzysiu/kafar/blob/master/README.md), where you'll find general manual and other versions.

## Raw PHP version

### Installation

Add this to your file:

    require 'kafar.php'
		
### Usage

First parameter is the array of parameters.

    echo kafar(['ico' => 'heart', 'color' => 'red']);
		
This function would show red heart icon.