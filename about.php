<?php 
session_start();
include 'connection.php'; 

// Rest of your code goes here

// Sample team data (you can replace this with your actual team data)
$team = array(
    array(
        'name' => 'Allia Chyanda Putri',
        'NIM ' => '2207411057',
        'bio' =>  'Saya hanya ingin lulus mata kuliah ini dengan nilai minimal B',
    ),
    array(
        'name' =>     'Nurul Hasanah',
        'position' => '2207411036',
        'bio' =>      'Bismillah Cumlaude',
    ),
    array(
        'name' => 'Fariz Haidar',
        'NIM ' => '2207411060',
        'bio' =>  'sama',
    ),
    array(
        'name' => 'Deva Alvyn Budinugraha',
        'NIM ' => '2207411050',
        'bio' =>  'Tahan Lama',
    ),
    array(
        'name' => 'Muhammad Rizky Ramadhani',
        'NIM ' => '2207411044',
        'bio' =>  'Buzank Terbaik',
    ),
    // Add more team members as needed
);

// Display team members
foreach ($team as $member) {
    ?>
    <div class="team-member">
        <h2><?php echo $member['name']; ?></h2>
        <h3><?php echo $member['position']; ?></h3>
        <p><?php echo $member['bio']; ?></p>
    </div>
    <?php
}