<?php
/**
 * User: Cardenas
 * Date: 1/06/2019
 * Time: 00:08
 */

session_start();
session_destroy();

header("location:login");