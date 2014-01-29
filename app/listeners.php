<?php
use App\Events\InsertServiceMasterEvent;

Event::listen('masterservice.create', 'App\Events\InsertServiceMasterEvent');