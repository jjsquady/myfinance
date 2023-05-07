<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'git@github.com:jjsquady/myfinance.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('64.227.18.14')
    ->set('remote_user', 'jjsquady')
    ->set('deploy_path', '~/webapps/myfinance');

// Hooks

after('deploy:failed', 'deploy:unlock');
