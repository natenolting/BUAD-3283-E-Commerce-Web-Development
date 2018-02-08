### February 8th

#### Cascading Style Sheets (CSS)

##### [What is CSS](https://developer.mozilla.org/en-US/docs/Web/CSS)

* Instructions to a browser on how to "paint" the output HTML to the screen
* Can be included in three ways: linked to a `.css` file defined in the `head` tag inside a `style` tag, or inlined on a element with a `style` attribute.
  * Styles in the `head` override styles in a linked `.css` file, styles inlined in a `style` attribute will override styles in the head and linked styles.
  * Linked or `head` styles are accessed through the `class` attribute on any html element.
* A css file can be a `.php` file if the header `header("Content-type: text/css; charset: UTF-8");`  is added to the `,php` file. <sup>[ref](https://css-tricks.com/css-variables-with-php/)</sup>

##### Basic CSS Style Declarations

###### Declaring for an element:

```css
p {
  font-size: 12px;
  font-family: sans-serif;
  font-weight: normal;
}
```

###### Declaring as a class:

```css
.paragraph {
  font-size: 12px;
  font-family: sans-serif;
  font-weight: normal;
  color: #000;
}
```

###### Declaring as an id:

```css
#paragraph {
  font-size: 12px;
  font-family: sans-serif;
  font-weight: normal;
}
```
**Note:** [Declaring css on an id is very difficult to override.](https://www.freecodecamp.org/challenges/override-class-declarations-by-styling-id-attributes) It's generally bad practice to apply css to an id unless absolutely necessary.

###### Declaring as a pseudo class:

```css
.paragraph:hover {
  /** Hovering over this element will change its color  **/
  color: #ccc;
}
```

##### CSS Stylesheet Hierarchy

| Type           | Example               | Usage                                                                           |
| :------------- | :-------------------- | :-------------------------------------------------------------------------------|
| element        | `p {}`                | `<p>Lorem ipsom...</p>`                                                         |
| generic        | `.paragraph {}`       | `<p class="paragraph">Lorem ipsom...</p>`                                       |
| chained        | `.paragraph.bold {}`  | `<p class="paragraph bold">Lorem ipsom...</p>`                                  |
| child          | `.paragraph .img {}`  | `<p class="paragraph">Lorem ipsom <img class="img" src="img.png" /></p>`        |
| pseudo         | `.paragraph:hover {}` | `<p class="paragraph">Lorem ipsom</p>`        |




#### Notes:


See [course_notes/course_notes_10_February_08.md](https://github.com/natenolting/BUAD-3283-E-Commerce-Web-Development/blob/spring2018/course_notes/course_notes_10_February_08.md)


#### Assignment:


See [course_assignment/course_assignment_10_February_08.md](https://github.com/natenolting/BUAD-3283-E-Commerce-Web-Development/blob/spring2018/course_assignment/course_assignment_10_February_08.md)
