<?php
$key = ftok(__FILE__, 'a');
$sem_id = sem_get($key, 1, 0666, 1);

if (!$sem_id) {
    die('Failed to get semaphore');
}

$file = 'counter.txt';

function update_counter($sem_id, $file) {
    if (!sem_acquire($sem_id)) {
        die('Failed to acquire semaphore');
    }

    $counter = (int)file_get_contents($file);
    echo "Current Counter: $counter\n";

    $counter++;
    file_put_contents($file, $counter);

    echo "Updated Counter: $counter\n";

    if (!sem_release($sem_id)) {
        die('Failed to release semaphore');
    }
}

update_counter($sem_id, $file);
?>
