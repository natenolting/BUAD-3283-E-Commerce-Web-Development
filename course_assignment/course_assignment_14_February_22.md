# Course Assignment for February 22nd

## Begin working with a payment gateway.
**Due March 1st. If you run into snags ask for help before this date.**

1. Setup a sandbox developer account on https://developer.authorize.net/hello_world/sandbox/. <br>**&#8250;** Make note of the `API LOGIN ID`, `TRANSACTION KEY`, and `SECRET KEY` that is generated for you after creating your account.
2. Create a `.env` file **ABOVE** your web root (above `public_html`) and store the credentials that you receive when you created your Authorize.net sandbox account in this file. <br>**&#8250;** See the example `.env` in [course_notes/course_notes_14_February_22.md](https://github.com/natenolting/BUAD-3283-E-Commerce-Web-Development/blob/spring2018/course_notes/course_notes_14_February_22.md)
3. Create two new files, `assignments/February_22/index.php` and `assignments/February_22/endpoint.php`
4. In `assignments/February_22/index.php` create a form that will take payment details. <br>**&#8250;** See https://developer.authorize.net/hello_world/testing_guide/ for test payment data that will work with the sandbox.
5. In `assignments/February_22/endpoint.php` capture the payment request variables and pass them to the Authorize.net sandbox gateway. <br>**&#8250;** See https://developer.authorize.net/hello_world/ for example usage.
