<?php

    // Get the form fields, removes html tags and whitespaces.
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r", "\n"), array(" ", " "), $name);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $find_us = trim($_POST["find-us"]);
    $news = $_POST["news"]
    $message = trim($_POST["content"]);

    // Check the data
    if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: https://raj217.github.io/Omnifood/index.php?success=-1#form");
        exit;
    }

    // Set the recipent email address. Update this to your desired email address.
    $recipient = "rajdristant007@gmail.com";

    // Set the email subject.
    $subject = "New contact from $name";

    // Build the email content.
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Found-us: $find_us\n";
    $email_content .= "Newsletter value: $news\n";
    $email_content .= "Message: $content\n";

    // Build the email header.
    $email_header = "From: $name <$email>";

    // Send the email.
    mail($recipient, $subject, $email_content, $email_header) {

    // Redirect to the index.html page with sucess code
    header("Loocation: https://raj217.github.io/Omnifood/index.php?success=1#form");
    }