<?php
function generateFixture()
{
    $faker = \Faker\Factory::create();
    $products = array_map(function ($e) use ($faker) {
        $name = implode(' ', $faker->unique()->words(3));
        $title = \Pbc\Bandolier\Type\Strings::formatForTitle($name);
        return [
            'id' => $faker->unique()->sha1,
            'name' => $name,
            'cost' => $faker->randomFloat(2, 10, 100),
            'title' => $title,
            'description' => $faker->unique()->paragraph,
            'image' => "https://via.placeholder.com/300x400/" .
                $faker->randomElement([
                    'F27C32',
                    '2A84EB',
                    '273456'
                ]) .
                "/FFFFFF?text=" .
                str_replace(' ', '+', $title),
            'category' => $faker->randomElement([
                'cat1',
                'cat2',
                'cat3'
            ])
        ];


    }, array_fill(0, 9, 'fixture'));
    $fh = fopen(__DIR__ . '/products.json', 'w');
    fwrite($fh, json_encode($products));
    fclose($fh);
    return $products;
}