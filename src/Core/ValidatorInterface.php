<?php

interface ValidatorInterface
{
    public function validate(EntityInterface $entity): bool;
}