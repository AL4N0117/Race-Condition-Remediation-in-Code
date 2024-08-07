<?php
$key = ftok(__FILE__, 'a');
$sem_id = sem_get($key, 1, 0666, 1);

if (!$sem_id) {
    die('Failed to create semaphore');
}

echo "Semaphore created with ID: $sem_id\n";
?>
