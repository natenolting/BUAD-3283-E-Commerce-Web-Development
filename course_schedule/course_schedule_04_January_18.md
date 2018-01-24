### January 18th

#### Discussion
  * Files for a web site
  * Structural / Semantic tags

#### Assignment

See [course_assignment/course_assignment_04_January_18.md](https://github.com/natenolting/BUAD-3283-E-Commerce-Web-Development/blob/spring2018/course_assignment/course_assignment_04_January_18.md)


#### Files for a web site

##### Index

* `index.html`, `index.php`, others depending on server language
* Entry point of web site

##### Cascading Style Sheet (CSS)

* `.css` file extension
* Holds styling for the site
* Linked in the head typically with `<link rel="stylesheet" href="/link/to/css/file.css">`

##### Javascript

* `.js` file extension    
* Might be library file or a custom script
* Linked in the head or at the end of the body tags in the HTML with `<script src="/link/to/script.js"></script>`

##### Other Files

* `.htaccess` for Apache server instructions
* `robots.txt` for instructions given to search engines http://www.robotstxt.org/
* Verification files for 3rd party tools, ie. Google Analytics

#### Structural / Semantic tags

##### Structural Tags

* Meant for layout of a web page
* Typically are block elements
* Give structure to pages
* Used for header, footer, navigation, articles, etc.
* Include `div`, `p`, `ul`, `ol`, `h1` &#8594; `h6`, `br`, `hr`, `table`, etc.

##### Semantic Tags

* Meant to describe elements
* Used inside structural elements to give content more meaning
* Typically bad practice to include structural elements inside a semantic tag: `<p><strong>I'm strong</strong></p>` rather than `<strong><p>I'm strong but invalid</p></strong>`
* Include `em`, `strong`, `code`, `blockquote`, `span`, and many more  
* Just pick the tag that seems the most appropriate

##### Tables

* Typically only of tabular data
* Starts with `table` with rows `tr` that wrap a list of columns `td`
* Head row has `th` column tags

**Table example**

```html
<table>
  <tr>
    <th>Foo</th>
    <th>Bar</th>
    <th>Baz</th>
  </tr>
  <tr>
    <td>Foo</td>
    <td>Bar</td>
    <td>Baz</td>
  </tr>
</table>

```
Makes:

| Foo | Bar | Baz |
|-----|-----|-----|
| Foo | Bar | Baz |


##### Lists

* Unordered `ul` creates a bulleted list by default
* Ordered `ol` create a numbered list by default
* List items wrapped with `li` tags

**Link example**

```
<ul>
  <li>Foo</li>
  <li>Bar</li>
  <li>Bazz</li>
</ul>

<ol>
  <li>Foo</li>
  <li>Bar</li>
  <li>Bazz</li>
</ul>

```

Makes:

* Foo
* Bar
* Bazz


1. Foo
2. Bar
3. Bazz


##### Links

* Links can act as semantic or structural
* Links can link to different pages and target specific place on a page
* Links can target an app, open an email message, prompt a phone call, etc.

**Link Examples**

```html

<!-- link to another page -->
<a href-"/link/to/another/page.html">Link to another page</a>

<!-- link to an external page -->
<a href="https://google.com">Link to Google</a>

<!-- link to a specific point on a page... -->
<a href="#anchor">Link to an anchor</a>
<!-- ...then at the point that the above should link to -->
<a name="anchor" id="anchor"></a>

<!-- link that opens an email -->
<a href="mailto:somone@example.com">Link to Email</a>

<!-- link to call a number -->
<a href="tel:1234567890">Call a number</a>

```
