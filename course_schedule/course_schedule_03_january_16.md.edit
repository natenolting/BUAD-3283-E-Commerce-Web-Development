### January 16th

#### Discussion
* **Review syllabus, go over any issues with the setup from last week.**
* **How the web works**
    * Domain Name System (DNS) https://en.wikipedia.org/wiki/Domain_Name_System
    * Transport Layer Security (TLS) https://en.wikipedia.org/wiki/Transport_Layer_Security
* **Elements of an E-Commerce web application.**
    * Payment Gateway for handling transactions https://en.wikipedia.org/wiki/Payment_gateway
    * TLS for transferring data
    * Handling sensitive data
        * Sanitize in, encode out https://security.stackexchange.com/a/95330
* **How a web page is created**
  * HTML https://en.wikipedia.org/wiki/HTML
  * Body for page structure and display
  * Head for page instructions
  * CSS for styling
  * Javascript for interactions and DOM manipulations
  * Includes such as images and other media

#### How a web page is created

##### HTML page structure

```HTML
<!DOCTYPE html> <!-- Document Type -->
<html lang="en">
<!-- Start instructions for page -->
<head>
    <!-- Page Encoding -->
    <meta charset="UTF-8">
    <!-- Title of page -->
    <title>Title</title>
    <!-- Link to a external stylesheet -->
    <link rel="stylesheet" href="/link/to/a/style/sheet.css">
    <!-- Link to a external JavaScript file -->
    <script type="application/javascript" src="/link/to/a/page/blocking/js/file.js"></script>
    <!-- Embedded JavaScript -->
    <script type="application/javascript">
      console.log('Hello World');
    </script>
</head>
<!-- End instructions for page -->
<!-- Start visual part of page -->
<body>
  <img src="/path/to/an/image.png" alt="This is the alt text for this image if it is missing." />
  <p>Hello World</p>
  <script type="application/javascript" src="/link/to/a/non/page/blocking/js/file.js"></script>
</body>
<!-- End visual part of page -->
</html>

```

##### Parts

###### Tags
* They include paragraph, lists, tables, etc.
* They either require open and close tags or are self closing
    * Open and close: `<p>Hello World</p>`
    * Self closing: `<img src="/path/to/an/image.png" alt="This is the alt text for this image if it is missing." />`
* They have attributes: `<img src="image.png" alt="Alt text" />`, `src` and `alt` are attributes.

###### DOCTYPE
* Many different HTML DOCTYPE Declaration depending on the type of document https://www.w3.org/QA/2002/04/valid-dtd-list.html
* **The standard now is the HTML5 DOCTYPE** `<!DOCTYPE html>`

###### HTML
  * Body and head are wrapped with `<html></html>`
  * Sets the language of page with the `lang` attribute https://w3c.github.io/html/dom.html#the-lang-and-xmllang-attributes

###### Head
* Contained within `<head></head>`
* Includes instructions for the page
  * Example: `<meta charset="UTF-8">` Tells the browser to use `UTF-8` character encoding for the HTML page.
* Include external CSS and JS
* Meta tags used by browser, search spiders, screen readers, etc.  

###### Body
* Contains the visual output of the page
* Contained within `<body></body>`

#### Assignment

* Read chapters 1-9 in _HTML and CSS: Design and Build Websites 1st Edition_
* Setup Hosting Account and Git repository on GitHub, **due before class on 1-18**
