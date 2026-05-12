<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            'cat-food' => [
                [
                    'slug' => 'whiskas-premium',
                    'name' => 'Whiskas',
                    'price' => 1450,
                    'image' => 'images/shop/cat-food/whiskas-premium.png',
                    'description' => 'Complete and balanced nutrition for adult cats, featuring delicious Tuna flavor that provides essential nutrients for a healthy lifestyle.'
                ],
                [
                    'slug' => 'royal-canin-kitten',
                    'name' => 'Royal Canin',
                    'price' => 3100,
                    'image' => 'images/shop/cat-food/royal-canin-digestive-final.png',
                    'description' => 'Tailored nutrition for kittens during their first growth stage, supporting their natural defenses and healthy brain development.'
                ],
                [
                    'slug' => 'meow-mix-original',
                    'name' => 'Meow Mix',
                    'price' => 1250,
                    'image' => 'images/shop/cat-food/meow-mix-premium.png',
                    'description' => 'The only one cats ask for by name. Irresistible flavors of tasty poultry and seafood that cats simply love.'
                ],
                [
                    'slug' => 'purina-fancy-feast',
                    'name' => 'Purina Fancy Feast',
                    'price' => 2850,
                    'image' => 'images/shop/cat-food/fancy-feast.png',
                    'description' => 'Gourmet wet cat food featuring high-quality ingredients and a variety of delicious flavors that provide a truly elegant dining experience.'
                ],
                [
                    'slug' => 'blue-buffalo-natural',
                    'name' => 'Blue Buffalo',
                    'price' => 2400,
                    'image' => 'images/shop/cat-food/blue-buffalo.png',
                    'description' => 'Natural cat food made with the finest ingredients, featuring real meat as the first ingredient to support healthy muscle development.'
                ],
                [
                    'slug' => 'friskies-seafood',
                    'name' => 'Friskies',
                    'price' => 1950,
                    'image' => 'images/shop/cat-food/friskies-seafood.png',
                    'description' => 'A tasty and complete variety of cat food that offers a world of flavor and adventure for your feline friend.'
                ],
            ],
            'dog-food' => [
                [
                    'slug' => 'pedigree-adult',
                    'name' => 'Pedigree Adult Dog',
                    'price' => 2450,
                    'image' => 'images/shop/dog-food/pedigree.png',
                    'description' => 'High-quality nutrition for adult dogs, featuring beef and vegetables flavor for healthy growth and vitality.'
                ],
                [
                    'slug' => 'royal-canin-puppy',
                    'name' => 'Royal Canin Puppy',
                    'price' => 3200,
                    'image' => 'images/shop/dog-food/royal-canin.png',
                    'description' => 'Precision nutrition for puppies, supporting their natural defenses and healthy development during growth.'
                ],
                [
                    'slug' => 'drools-adult',
                    'name' => 'Drools Adult Dog',
                    'price' => 1850,
                    'image' => 'images/shop/dog-food/drools.png',
                    'description' => 'Real chicken and liver in gravy, providing a balanced diet with essential nutrients for adult dogs.'
                ],
                [
                    'slug' => 'purina-one-salmon',
                    'name' => 'Purina ONE SmartBlend',
                    'price' => 4100,
                    'image' => 'images/shop/dog-food/purina.png',
                    'description' => 'Salmon and rice formula for healthy skin and coat, with high-quality protein for strong muscles.'
                ],
                [
                    'slug' => 'iams-proactive',
                    'name' => 'IAMS Proactive Health',
                    'price' => 2950,
                    'image' => 'images/shop/dog-food/iams.png',
                    'description' => 'Chicken flavor adult nutrition formulated to support strong muscles and a healthy heart.'
                ],
                [
                    'slug' => 'maxime-premium',
                    'name' => 'Maxime Premium Beef',
                    'price' => 1750,
                    'image' => 'images/shop/dog-food/maxime.png',
                    'description' => 'Premium beef flavor providing complete and balanced nutrition for healthy digestion and strong bones.'
                ],
            ],
            'pet-essentials' => [
                [
                    'slug' => 'collar-leash',
                    'name' => 'Collar and leash',
                    'price' => 1500,
                    'description' => 'High-quality nylon collar with a matching durable leash for safe and comfortable daily walks.',
                    'image' => 'images/shop/pet-essentials/collar-leash.png'
                ],
                [
                    'slug' => 'pet-bed',
                    'name' => 'Pet bed',
                    'price' => 5500,
                    'description' => 'Premium orthopedic foam bed designed to provide ultimate comfort and joint support for your pet.',
                    'image' => 'images/shop/pet-essentials/pet-bed-final.png'
                ],
                [
                    'slug' => 'grooming-brush',
                    'name' => 'Grooming brush',
                    'price' => 1400,
                    'description' => 'Gentle deshedding tool that keeps your pet\'s coat healthy, shiny, and free of tangles.',
                    'image' => 'images/shop/pet-essentials/grooming-brush.png'
                ],
                [
                    'slug' => 'food-bowls',
                    'name' => 'Food and water bowls',
                    'price' => 2500,
                    'description' => 'Durable and easy-to-clean stainless steel bowl set for both food and fresh water.',
                    'image' => 'images/shop/pet-essentials/food-bowls.png'
                ],
                [
                    'slug' => 'toys-pack',
                    'name' => 'Toys',
                    'price' => 1800,
                    'description' => 'A fun assortment of safe and engaging toys to keep your pet active, happy, and entertained.',
                    'image' => 'images/shop/pet-essentials/toys.png'
                ],
                [
                    'slug' => 'first-aid-kit',
                    'name' => 'First aid kit',
                    'price' => 3200,
                    'description' => 'Essential medical supplies tailored for pet emergencies, ensuring you are always prepared.',
                    'image' => 'images/shop/pet-essentials/first-aid-kit.png'
                ]
            ],
            'premium' => [
                [
                    'slug' => 'premium-kitty',
                    'name' => 'Premium Kitty',
                    'price' => 8500,
                    'description' => 'High-quality nutrition and flavor for your sophisticated cat.',
                    'badge' => 'FOR CATS',
                    'image' => 'images/shop/premium/premium-kitty.png'
                ],
                [
                    'slug' => 'classic-cat-cuisine',
                    'name' => 'Classic Cat Cuisine',
                    'price' => 9200,
                    'description' => 'Complete and balanced diet for adult cats with real chicken jerky.',
                    'badge' => 'FOR CATS',
                    'image' => 'images/shop/premium/classic-cat-cuisine.png'
                ],
                [
                    'slug' => 'premium-dog-food',
                    'name' => 'Premium Dog Food',
                    'price' => 7800,
                    'description' => 'High-quality adult dog food for healthy growth and vitality.',
                    'badge' => 'FOR DOGS',
                    'image' => 'images/shop/premium/premium-dog-food.png'
                ],
                [
                    'slug' => 'premium-puppy',
                    'name' => 'Premium Puppy',
                    'price' => 8900,
                    'description' => 'Complete nutrition for growing puppies with essential vitamins.',
                    'badge' => 'FOR PUPPIES',
                    'image' => 'images/shop/premium/premium-puppy.png'
                ],
                [
                    'slug' => 'elite-wellness',
                    'name' => 'Elite Wellness',
                    'price' => 10500,
                    'description' => 'Advanced multivitamin formula for overall health and immune support for senior pets.',
                    'badge' => 'HEALTH CARE',
                    'image' => 'images/shop/premium/elite-wellness.png',
                ],
                [
                    'slug' => 'gourmet-feast',
                    'name' => 'Gourmet Feast',
                    'price' => 11250,
                    'description' => 'A variety pack of grain-free luxury wet food featuring salmon and prime beef.',
                    'badge' => 'GRAIN FREE',
                    'image' => 'images/shop/premium/gourmet-feast.png',
                ],
            ]
        ];

        foreach ($products as $category => $items) {
            foreach ($items as $item) {
                Product::updateOrCreate(['slug' => $item['slug']], array_merge($item, ['category' => $category]));
            }
        }
    }
}
