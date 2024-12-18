<?php

namespace App\Validators;

/**
 * @template T
 */
interface IValidator{
    /**
     * @param T $dto
     * @return void
     */
    public static function validate(object $dto): void;
}
