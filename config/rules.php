<?php

return [
    'color' => ['required', new \Azuriom\Rules\Color()],
    'footer_description' => ['nullable', 'string'],
    'news_description' => ['nullable', 'string'],
    'footer_links' => ['nullable', 'array'],
    'discord-id' => ['nullable', 'string'],
    'twitter' => ['nullable', 'string'],
    'sliders' => ['nullable', 'array'],
];