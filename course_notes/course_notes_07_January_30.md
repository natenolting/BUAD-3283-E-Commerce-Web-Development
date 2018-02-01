# Course Notes for January 30th

## Tables

### Represent tabular data

A comma separated value (CSV) can be represented as a table. The first row represents the head row with columns of the table and the rest of the data is represented as rows with columns.

```
Head1, Head2, Head3;
foo, bar, baz;
alpha, beta, capa;
```
| Head1     | Head2    | Head3     |
| :-------- | :------- | :-------- |
| foo       | bar      | baz       |
| alpha     | beta     | capa      |

```
<table>
  <thead>
    <tr>
      <th>Head1</th>
      <th>Head2</th>
      <th>Head3</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>foo</td>
      <td>bar</td>
      <td>baz</td>
    </tr>
    <tr>
      <td>alpha</td>
      <td>beta</td>
      <td>capa</td>
    </tr>
  </tbody>
</table>  
```
### Center block elements with `display: table;`

The CSS property `display` can be set to `table` to make a block element collapse so it can be 'auto' centered. Set `margin-left` and `margin-right` top `auto` to use this effect.

<div style="padding: 10px; background: #ccc;"><div style="display: table; margin: 0 auto; color: #000; font-weight: 700; border: 1px dotted #000;">Hi, I'm centered!</div></div>

```
<div style="padding: 10px; background: #ccc;">
  <div style="display: table; margin: 0 auto; color: #000; font-weight: 700; border: 1px dotted #000;">
    Hi, I'm centered!
    </div>
</div>
```

### Padding, margin and table cells.

Table cells and rows will ignore margin but padding is ok to use. Css is preferential to using the `cellpadding` and `cellspacing` attributes.

## Forms

### Forms are build with a combination of inputs

<style>
.my-form label {
  width: 75px;
  display: inline-block;
}

.my-form label.wide {
  width: 100%;
}
</style>
<form action="/path/to/endpoint" method="get" enctype="multipart/form-data" class="my-form">
  <fieldset>
    <legend>Contact Form</legend>
    <div>
      <label for="name">Name</label><input id="name" type="text" />
    </div>
    <div>
      <label for="email">Email</label><input id="email" type="email" />
    </div>
    <div>
      <label for="phone">Phone</label><input id="phone" type="tel" />
    </div>
    <div>
      <label for="file">File</label><input id="file" type="file" />
    </div>
    <div>
      <label for="comment">Comment</label><textarea name="comment" id="comment" cols="30" rows="10"></textarea>
    </div>
    <div>
      <label for="select">Select</label><select name="comment" id="select">
        <option value="foo">Foo</option>
        <option value="bar">Bar</option>
        <option value="baz">Baz</option>
      </select>
    </div>
    <div>
      <label for="checkbox" class="wide"><input type="checkbox" /> A Checkbox</label>
    </div>
    <div>
      <input type="submit" name="submit" value="Submit" />
    </div>
  </fieldset>
</form>

```
<form action="/path/to/endpoint" method="get" enctype="multipart/form-data" class="my-form">
  <fieldset>
    <legend>Contact Form</legend>
    <div>
      <label for="name">Name</label><input id="name" type="text" />
    </div>
    <div>
      <label for="email">Email</label><input id="email" type="email" />
    </div>
    <div>
      <label for="phone">Phone</label><input id="phone" type="tel" />
    </div>
    <div>
      <label for="file">File</label><input id="file" type="file" />
    </div>
    <div>
      <label for="comment">Comment</label><textarea name="comment" id="comment" cols="30" rows="10"></textarea>
    </div>
    <div>
      <label for="select">Select</label><select name="comment" id="select">
        <option value="foo">Foo</option>
        <option value="bar">Bar</option>
        <option value="baz">Baz</option>
      </select>
    </div>
    <div>
    <div>
      <label for="checkbox"><input type="checkbox" /> A Checkbox</label>
    </div>
    <div>
      <input type="submit" name="submit" value="Submit" />
    </div>
  </fieldset>
</form>

```

### Find all the forms (or any other tag) on a page

```
// https://developer.mozilla.org/en-US/docs/Web/API/Element/getElementsByTagName
var forms = document.getElementsByTagName("form");
console.log(forms.length)
for (var i = 0; i < forms.length; i++) {
    forms[i].style = "border: 3px solid magenta; display: block; visibility: visible"
}
```

## Other structural HTML elements

```
<header>Page header</header>
<navigation>Naviation</navigation>
<article>Article 1</article>
<article>Article 2</article>
<article>Article 3</article>
<footer>Page footer</footer>
```
