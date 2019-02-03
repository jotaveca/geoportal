<?php
// Sample configuration for the logging library
$config = array(
    'simple' => array(
        'level' => 'INFO',
        'type' => 'file',
        'format' => "{date} - {level}: {message}",
        'file_path' => 'logs_apl'
    ),
    'email_criticals' => array(
        'level' => 'CRITICAL',
        'type' => 'email',
        'format' => "{date} - {level}: {message}",
        'to' => 'cisnerose@pdvsa.com',
        'from' => 'noreply@pdvsa.com',
        'subject' => 'New critical logging message'
    )
);