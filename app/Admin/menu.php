<?php

Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard');
//user roles/permissions
Admin::menu()->label('Users')->icon('fa-book')->items(function () {
    Admin::menu('Crimibook\User')->icon('fa-check')->label('Users');
    Admin::menu('Crimibook\Models\Follow')->icon('fa-check')->label('Follows');
});

Admin::menu('Crimibook\Models\Album')->icon('fa-check')->label('Albums');
Admin::menu('Crimibook\Models\Status')->icon('fa-check')->label('Status');