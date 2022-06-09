<?php

namespace core;

/**
 * class Application
 *
 * @author Celio Natti <Celionatti@gmail.com>
 * @package LaratonCore
 * @version 1.0.0
 * @copyright 2022 Laraton
 */

class Application
{
    const EVENT_BEFORE_REQUEST = 'beforeRequest';
    const EVENT_AFTER_REQUEST = 'afterRequest';

    protected array $eventListeners = [];

    public function __construct()
    {

    }
}