<?php

declare(strict_types=1);


namespace VasilDakov\MySupply\Application\Service;

/**
 * Enum Format
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
enum Format: string {
    case XML  = 'xml';
    case JSON = 'json';
    case YAML = 'yaml';
}
