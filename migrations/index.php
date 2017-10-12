<?php
include("../resources/library.php");

// as we all know, the index.php is the default page opened when you do not supply an actual page
// so opening /migrations in the browser, will run index.php automatically, meaning we can run all the database migrations we want
// nice and easy!

// this will: list all files which match the filename pattern starting with m and ending with .php
$migrations = glob(__DIR__."/m*.php");

/**
$migrations = [
    "/migrations/m_01_migrations.php"
    "/migrations/m_02_customers.php"
];
 */

// glob = function that will give you a list of filenames, that match your required pattern
// __DIR__ = the current directory, its the one where you find this file (migrations directory in this case)
// m*.php = every filename which begins with m and ends in .php, the * means "anything in the middle, whatever"
// __DIR__/m*.php = the / is a directory separator, it means in the __DIR__ directory, EVERY file that matches the pattern m*.php
// the return will be an array, either 0 or more elements, like ["m_file1.php","m_file2.php"....etc]

function check_migration($m)
{
    $db = connect();
    $result = $db->query("select filename from migrations where filename = '$m'");

    if($result === false) return false;
    
    if($result->num_rows == 0) return false;
    
    return true;
}

function log_migration($m)
{
    $db = connect();
    
    $db->query("insert into migrations set filename='$m'");
}

// now, lets go through each file, one by one, executing each against the database
// we do this cause maybe we want to do one action per script, so its understandable
// what each script is doing, because it only does one action
// maybe in the future, we add more scripts which operate in different ways
// this gives us the flexibility to do that
foreach($migrations as $m){
    if(check_migration($m) === false){
        print("Running Migration: $m<br/>");
        include($m);
        
        print("Logging Migration: $m<br/>");
        log_migration($m);
    }else{
        print("Skipping Migration $m<br/>");
    }
}

print("<b>Finished migrating everything</b><br/>");
print("<a href='/index.php'>Go back to home page</a>");