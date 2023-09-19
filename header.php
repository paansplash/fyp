<?php
error_reporting(0);
include("dbconnection.php");
$dt = date("Y-m-d");
$tim = date("H:i:s");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>E Clinic</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="application/javascript">
        (function(document) {
            'use strict';

            var LightTableFilter = (function(Arr) {

                var _input;

                function _onInputEvent(e) {
                    _input = e.target;
                    var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
                    Arr.forEach.call(tables, function(table) {
                        Arr.forEach.call(table.tBodies, function(tbody) {
                            Arr.forEach.call(tbody.rows, _filter);
                        });
                    });
                }

                function _filter(row) {
                    var text = row.textContent.toLowerCase(),
                        val = _input.value.toLowerCase();
                    row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
                }

                return {
                    init: function() {
                        var inputs = document.getElementsByClassName('light-table-filter');
                        Arr.forEach.call(inputs, function(input) {
                            input.oninput = _onInputEvent;
                        });
                    }
                };
            })(Array.prototype);

            document.addEventListener('readystatechange', function() {
                if (document.readyState === 'complete') {
                    LightTableFilter.init();
                }
            });

        })(document);
    </script>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-sm bg-info navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php" <?php if (basename($_SERVER['PHP_SELF']) == "index.php") {
                                                                echo ' class="active"';
                                                            } ?>>Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="aboutus.php" <?php if (basename($_SERVER['PHP_SELF']) == "aboutus.php") {
                                                                echo ' class="active"';
                                                            } ?>>About Us</a>
                </li>
                <?php
                if (!isset($_SESSION['patientid'])) {
                ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="patientappointment.php" <?php if (basename($_SERVER['PHP_SELF']) == "patientappointment.php") {
                                                                                echo ' class="active"';
                                                                            } ?>>Online Appointment</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="patientlogin.php" <?php if (basename($_SERVER['PHP_SELF']) == "patientlogin.php") {
                                                                        echo ' class="active"';
                                                                    } ?>>Login</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="patient.php" <?php if (basename($_SERVER['PHP_SELF']) == "patient.php") {
                                                                    echo ' class="active"';
                                                                } ?>>Registration</a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="patientappointment.php" <?php if (basename($_SERVER['PHP_SELF']) == "patientappointment.php") {
                                                                                echo ' class="active"';
                                                                            } ?>>Online Appointment</a>
                    </li>
                <?php
                }
                ?>
                <li class="nav-item active">
                    <a class="nav-link" href="contactus.php" <?php if (basename($_SERVER['PHP_SELF']) == "contactus.php") {
                                                                    echo ' class="active"';
                                                                } ?>>Contact Us</a>
                </li>
            </ul>
    </div>