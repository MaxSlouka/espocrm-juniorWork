<?php
return [
  'database' => [
    'host' => 'localhost',
    'port' => '',
    'charset' => NULL,
    'dbname' => 'juniorworkespocrm',
    'user' => 'root',
    'password' => '123456',
    'platform' => 'Mysql'
  ],
  'smtpPassword' => '',
  'logger' => [
    'path' => 'data/logs/espo.log',
    'level' => 'WARNING',
    'rotation' => true,
    'maxFileNumber' => 30,
    'printTrace' => false
  ],
  'restrictedMode' => false,
  'webSocketMessager' => 'ZeroMQ',
  'clientSecurityHeadersDisabled' => false,
  'clientCspDisabled' => false,
  'clientCspScriptSourceList' => [
    0 => 'https://maps.googleapis.com'
  ],
  'adminUpgradeDisabled' => false,
  'isInstalled' => true,
  'microtimeInternal' => 1713282057.486565,
  'passwordSalt' => '53af9772911f1fcb',
  'cryptKey' => '1d70fc61a175742f68d14a443a1694e6',
  'hashSecretKey' => '771da9fcd39cadf3bfa75eea916b5adb',
  'actualDatabaseType' => 'mysql',
  'actualDatabaseVersion' => '8.0.33',
  'instanceId' => 'f5533588-5c62-4592-b910-16b00205f69b'
];
