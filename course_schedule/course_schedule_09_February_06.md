### February 6th

#### Discussion

##### Review Request methods

##### Intro to PHP Sessions

* [What is a PHP Session?](http://php.net/manual/en/session.examples.basic.php)
  * Sessions are a simple way to store data for individual users against a unique session ID. <sup>[ref](http://php.net/manual/en/session.examples.basic.php)</sup>
  * Started up with the `session_start()` function.
    * A cookie is written to users browser cookies with the session id tied to the user session.
    * No output headers can be sent before `session_start()` or the `Warning: session_start(): Cannot send xyz - headers already sent` will be thrown.
  * Unlike requests like `GET` and `POST` Sessions give a mechanism to have access to user variables over multiple pages.  
  * Gives access to variables set to the `$_SESSION` global on next request
  * Sessions normally shutdown automatically when PHP is finished executing a script, but can be manually shutdown using the `session_write_close()` function. <sup>[ref](http://php.net/manual/en/session.examples.basic.php)</sup>
* Why would we need session for E-Commerce Web Development?
  * Adding items to a customers shopping carts
  * Saving a customer login to store account
  * Personalizing a customer's experience on a site (logged in customer vs guest)
* Special security concerns with sessions
  * [Cross-Site Request Forgery (CSRF)](https://www.owasp.org/index.php/Cross-Site_Request_Forgery_(CSRF))
  * [Session hijacking](https://en.wikipedia.org/wiki/Session_hijacking)
* Example / "How to" Links
  * https://stackoverflow.com/questions/5926677/session-handling-for-an-e-commerce-website
  * https://www.tutorialrepublic.com/php-tutorial/php-sessions.php
  * https://www.eduonix.com/blog/web-programming-tutorials/learn-working-with-sessions-in-php/


#### Notes:


See [course_notes/course_notes_09_February_06.md](https://github.com/natenolting/BUAD-3283-E-Commerce-Web-Development/blob/spring2018/course_notes/course_notes_09_February_06.md)


#### Assignment:


See [course_assignment/course_assignment_09_February_06.md](https://github.com/natenolting/BUAD-3283-E-Commerce-Web-Development/blob/spring2018/course_assignment/course_assignment_09_February_06.md)
