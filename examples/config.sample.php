<?php
// The shape of config/config.php in the installed
// server, copied from the lab's real file with the
// secrets redacted. occ writes most of this for you;
// the lines a human actually edits are trusted_domains,
// datadirectory, and (once) overwrite.cli.url.
$CONFIG = array (
  'passwordsalt' => '<redacted>',
  'secret' => '<redacted>',
  'trusted_domains' =>
  array (
    0 => 'localhost',
    1 => '127.0.0.1',        // occ install adds localhost;
                             // you add the name people type
  ),
  'datadirectory' => '/path/to/your/data',
  'dbtype' => 'mysql',
  'version' => '35.0.2.2',
  'overwrite.cli.url' => 'http://localhost',
  'instanceid' => '<redacted>',
  'dbname' => 'nextcloud',
  'dbhost' => '127.0.0.1',
  'dbtableprefix' => 'oc_',
  'mysql.utf8mb4' => true,
  'dbuser' => 'nextcloud',
  'dbpassword' => '<redacted>',
  'installed' => true,
);
