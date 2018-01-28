### January 25th

#### Discussion

##### Types of Web images

There are 4 main types of web images: `gif`, `jpeg`, `png` and `SVG`. Each has advantages and disadvantages over the others. The image type used depends on the situation. All file formats use the `img` tag with the `src` attribute being the path to the file. The `alt` attribute should be used incase the image file did not load.

```
<img src="/path/to/your/image.jpg" alt="alternative text incase the image does not load" />
```

##### [GIF](https://en.wikipedia.org/wiki/GIF)

* Gifs (Graphics Interchange Format) use the file extension `.gif`
* They are typically used for small graphics or for images that only utilize a few colors.
* They can be animated.
* Gifs can contain anywhere from 2 - 256 colors. The greater the color count the larger the file size can be.
* Can have an alpha channel with aliased transition between background and image without using a matte.
  * When using a matte the selected color should match the background the image will be placed on.

###### Example: 5 colors with no matte transparency:

<div style="background: #000; margin: 10px; text-align: center; padding:10px;">
![](http://www.natenolting.com/wp-content/uploads/2018/01/BAUD-3283-5-color-no-matte.gif)</div>

###### Example: 5 colors with white matte transparency:

<div style="background: #000; margin: 10px; text-align: center; padding:10px;">
![](http://www.natenolting.com/wp-content/uploads/2018/01/BAUD-3283-5-color-white-matte.gif)</div>

###### Example: 5 colors with black matte transparency:

<div style="background: #ccc; margin: 10px; text-align: center; padding:10px;">
![](http://www.natenolting.com/wp-content/uploads/2018/01/BAUD-3283-5-color-black-matte.gif)</div>

##### [JPEG](https://en.wikipedia.org/wiki/JPEG)

* JPEGs (Joint Photographic Experts Group) are typically use for photo graphic images.
* Can use either the `.jpg` pr `.jpeg` file extension.
* Has no option for transparency
* uses "lossy" compression when saving for web.
* Image quality vs. file size should be kept in mind when saving jpeg files for web.

###### Example: photographic image:

<div style="background: #000; margin: 10px; text-align: center; padding:10px;">
![](http://www.natenolting.com/wp-content/uploads/2018/01/paulandbabe.jpg)</div>

##### [PNG](https://en.wikipedia.org/wiki/Portable_Network_Graphics)

* PNGs (Portable Network Graphics) are typically used for graphics, logos and icons.
* PNGs have the file extension `.png`
* 24 bit PNG (png-24) files are similar to JPEGS but are "lossless".
* 8 bit PNG (png-8) are like GIF images where the file can have colors from 2 to 256 colors.
* Both can use an alpha channel and have smooth, antialiased edges.

###### Example: 5 color png-8 with transparency:

<div style="background: #ccc; margin: 10px; text-align: center; padding:10px;">
![](http://www.natenolting.com/wp-content/uploads/2018/01/BAUD-3283-5-color-transparent.png)</div>

###### Example: png-24 with transparency:

<div style="background: #ccc; margin: 10px; text-align: center; padding:10px;">
![](http://www.natenolting.com/wp-content/uploads/2018/01/BAUD-3283-24-bit-transparent.png)</div>

##### [SVG](https://en.wikipedia.org/wiki/Scalable_Vector_Graphics)

* SVG (Scalable Vector Graphics) are text files made up of points and lines to create shapes.
* Can be created in any vector art application or programmatically.
* Useful if a graphic needs to be represented in many different sizes.
* Will not loose quality when scaled.


###### Example, same image scaled

<div style="background: #ccc; margin: 10px; text-align: center; padding:10px;"><img src="http://www.natenolting.com/wp-content/uploads/2018/01/Bemidji_State_Beavers_logo.svg" alt="Drawing" style="width: 50px;"/>
</div>
<div style="background: #ccc; margin: 10px; text-align: center; padding:10px;"><img src="http://www.natenolting.com/wp-content/uploads/2018/01/Bemidji_State_Beavers_logo.svg" alt="Drawing" style="width: 200px;"/>
</div>
<div style="background: #ccc; margin: 10px; text-align: center; padding:10px;"><img src="http://www.natenolting.com/wp-content/uploads/2018/01/Bemidji_State_Beavers_logo.svg" alt="Drawing" style="width: 450px;"/>
</div>

#### Assignment

See [course_assignment/course_assignment_06_January_25.md](https://github.com/natenolting/BUAD-3283-E-Commerce-Web-Development/blob/spring2018/course_assignment/course_assignment_06_January_25.md)
