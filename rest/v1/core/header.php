<?php

// Show every mistake PHP finds — like turning on all warning lights in a car
error_reporting(E_ALL);

// Tell whoever is asking: "hey, my answer will be in JSON format"
header("Content-type: application/json; charset=UTF-8");

// Put a lock on the door — anyone who visits must enter a username and password first
// "Protected zone" is just the name shown on the login popup
header("WWW-AUTHENTICATE: BASIC realm='Protected zone'");

// Allow the visitor to bring their ID (login info/cookies) when coming from a different website
header("Access-Control-Allow-Credentials: true");

// Only accept these two types of info in a request — nothing else gets through
// Content-type = what kind of data they're sending (JSON)
// Authorization = their login token or password
header("Access-Control-Allow-Headers: Content-type, Authorization");

// Only allow these actions — like a bouncer only letting in certain people
// GET = just looking, POST = submitting something, PUT = updating, DELETE = removing
// OPTIONS = a quick check the browser does before the real request
header("Access-Control-Allow-Method: PUT,POST,GET,OPTIONS,DELETE");

// Set the clock to Manila time so all dates and times are correct for the Philippines
date_default_timezone_set("Asia/Manila");
