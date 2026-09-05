<?php

namespace Src\Domain;

class DecorManager
{
    public function getWelcomeData(): array
    {
        return [
            'decor_title'   => 'Decor Framework | Welcome', /* */
            'decor_message' => 'Crafting native PHP applications has never been this seamless. Designed for speed, fortified for security, and tailored for elegance.', /*[cite: 1] */
            'decor_version' => 'v1.0.0' /*[cite: 1] */
        ];
    }
}