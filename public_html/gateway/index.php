<?php
require_once dirname(dirname(__DIR__)) . '/src/bootstrap.php';
$title = substr(__FILE__, strlen(__DIR__ . DIRECTORY_SEPARATOR), strlen(__FILE__));
$body = '
<h2>Submit a payment</h2>
<form action="endpoint.php" method="post">
    <div class="form-row">
        <div class="col-auto">
            <div class="form-group">
                <label for="payment_amount"></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                       <i class="fas fa-dollar-sign"></i>
                    </span>
                    </div>
                    <input id="payment_amount"
                           name="payment_amount"
                           type="text"
                           class="form-control"
                           placeholder="Payment Amount">
                </div>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-auto">
            <div class="form-group">
                <label for="cc_name"></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-user"></i>
                    </span>
                    </div>
                    <input id="cc_name"
                           name="cc_name"
                           type="text"
                           class="form-control"
                           placeholder="Name on Card">
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="form-group">
                <label for="cc_number"></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-credit-card"></i>
                    </span>
                    </div>
                    <input id="cc_number"
                           name="cc_number"
                           type="text"
                           class="form-control"
                           placeholder="Card Number">
                </div>
            </div>
        </div>
        <div class="col-auto">
            <div class="form-group">
                <label for="cc_expire"></label>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                    </span>
                    </div>
                    <input id="cc_expire"
                           name="cc_expire"
                           type="text"
                           class="form-control"
                           placeholder="Expire MM/YY">
                </div>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col-auto">
            <div class="form-group">
                <label for="submit"></label>
                <div class="input-group">
                    <input id="submit"
                           name="submit"
                           value="Submit Payment"
                           type="text"
                           class="btn btn-primary">
                </div>
            </div>
        </div>
    </div>
</form>
';
include __DIR__ . '/view.php';