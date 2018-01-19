<?php

namespace Helpers\Generate;

interface GenerateFilesInterface
{
    /**
     * @param array $args
     */
    public function init(array $args = []);

    /**
     * Generate files
     */
    public function generate();
}