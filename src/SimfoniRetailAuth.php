<?php

namespace MBLSolutions\SimfoniRetailLaravel;

interface SimfoniRetailAuth
{

    /**
     * Get the currently Authenticated User
     *
     * @return mixed
     */
    public function get(): array;
}