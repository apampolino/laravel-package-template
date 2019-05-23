<?php

namespace Vendor\Package;

class Package {

    public function construct()
    {
        return get_class($this);
    }
}