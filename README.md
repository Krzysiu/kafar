# KAFAR
## Krzysiu Advanced FontAwesome Renderer
Awesome **Smarty and Wordpress plugin** that adds advanced support of FontAwesome. Yet another? No! This plugin, in contrast to others, does much more that simple inserting icon. Why it's better?


1) **It can do (almost) everything that raw FontAwesome can do** - rotating, scaling, animating etc. Yeah, why not? Probably only thing that's missing is stacking. 

2) **It can do more! KAFAR uses HTML and CSS to make it even better** - the most wanted thing would be **coloring icons** or adding **fixed width spaces** (6 kinds, from 1/1 em 1/6 em!)

3) **Go! Go! Go** - be faster than anyone else by using unique "go" function - **ready to use schemes** (icon + attributes) like blue info icon or these big quote sign which are placed outside text block

4) **Do it your way!** - KAFAR is fully customizable - you can add your *own "go" schemes*, HTML ID and classes, **own CSS** and even data-... attributes!

5) **It's ok that you use Xazufor CMS from planet Zorxoz** - it's easy to adapt it for other CMS-es or even use it as raw PHP function


## Name
The acronym - KAFAR - means in Polish "pile driver" - a kind of big, big hammer. It's also a colloquial word for very strong person.

## Versions

* [Smarty plugin/shortcode](https://github.com/Krzysiu/kafar/blob/master/Smarty/README.md)
* [Wordpress shortcode](https://github.com/Krzysiu/kafar/blob/master/Wordpress/README.md)
* [Raw PHP function](https://github.com/Krzysiu/kafar/blob/master/Raw%20PHP/README.md)


## Installation
Please choose subdirectory of this repository to get informations about installation in specific environment. **Remember to include FontAwesome CSS in your HTML file!**

## Usage

### TL;DR - example source codes

* **Wordpress**: `[fa ico="heart" color="red"]`
* **Smarty**: `{fa ico="heart" color="red"}`
* **Raw PHP**: `echo kafar(['ico' => 'heart', 'color' => 'red']);`

### Available parameters

* (*str*) **ico** - icon name
* (*int*) **scale** - scaling icon, where 0 is no scale
* (*bool*) **fixed** - fixed width (`fa-fw` class)
* (*bool*) **list** - list bullet  (`fa-list` class)
* (*bool*) **border** - bordered icon
* (*str/chr*) **pull** - "l" or "left" for left pull, "r" or "right" for right pull
* (*int/bool*) **spin** - spin icon (**1=spin, 2=pulse**); if boolean true is provided, then value is 1 (spin)
* (*int/str*) **rotate** - either integer (90, 180, 270) or **">" for 90°**, **"<" for 270°** and **'u' for 180°**
* (*str*) **flip** - "v" or **"|" for vertical**, "h" or **"-" for horizontal**
* (*str*) **class** - additional class (or classed separated by space)
* (*str*) **title** - HTML title attribute
* (*str*) **id** - HTML id attribute
* (*mixed*) **data-...** - **HTML-style data attributes** (so `data-title="foo"` adds same piece to HTML)
* (*str*) **css** - HTML style attribute - inline CSS
* (*str*) **color** - color CSS style shorthand, higher priority than `css` parameter
* (*int*) **lspace** - **fixed width space on the left**. The width is **1/x em from range 1-6**, where x is given value. 0 is null space - 0 px width.
* (*int*) **rspace** - as above, but on the right side
* (*str*) **go** - **ready to use combinations**, partially overriding FontAwesome classes

Boolean type can be:

* for true: "1", "true", "on" and "yes" or "0"
* for false: "false", "off", "no", "", NULL or not set

### Usage examples

All examples are shown for Smarty version. E.g. if you would want to use Wordpress version you would have to change `{}` to `[]`.

* `<div style="width:500px">{fa go="outer-quote-start"}Very nice quote!{fa go="outer-quote-end"}</div>` - div container with outter quotation marks. So easy? Yeah!
* `{fa rspace="2" go="yt"}{fa rspace="2" go="fb"}{fa go="twitter"}` - coloured icons of YT, FB and Twitter with 1/2 em space between it
* `{fa ico="meh-o" fixed="on" spin="1" pull="r"}` - spinning `meh-o` icon with fixed width, pulled to the right
* `{fa fixed="1" border="true" ico="gears" color="red" class="toolbarBtn" data-tooltip="Show settings"}` - red bordered `gears` icon with fixed width, class toolbarBtn and HTML data-tooltip parameter `Show settings` - that could be used to easily create toolbar with e.g. JQueryUI tooltips
* `{fa ico="check" flip="|" rotate="<"}` - `check` icon flipped vert... horiz... vertically and rotated... left... right... left... Screw it, you can use directions - `-` or `|` and for rotation: `<`, `>`, `u` (like u-turn - 180°).

# Creating own Go presets

In `switch ($params['go'])` part add new line, e.g. `case 'FlipRed': $go = ['flip' => '|', color => 'red']; break;` - array or parameters, like in Smarty plugin use. In this case you could use `{fa ico="heart" go="FlipRed"} {fa ico="info" go="FlipRed"}` to don't set `flip="|" color="red"` everytime. 

Another idea: `case 'toolbar': $go = ['fixed' => true, border => true, class => 'tbBtn', scale => 2]; break;` to create nice preset for toolbar buttons. All you need is to make a nice `.tbBtn` in CSS and choose icons. Then Smarty code would look like `{fa go="toolbar" ico="star" title="Mark object"}{fa go="toolbar" ico="meh-o" title="About author"}{fa go="toolbar" ico="clock-o" title="Set time"}`.

