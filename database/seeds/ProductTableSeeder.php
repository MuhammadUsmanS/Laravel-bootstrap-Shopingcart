<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {       
        //

    	// $product = new  \App\Products([]);
    	$product = new  \App\Products([

    	'imagePath'=>'https://sc01.alicdn.com/kf/HTB1E3QKBiCYBuNkSnaVq6AMsVXag.jpg',
    	'title' => 'Leather Bifold Wallet',
    	'description' => '💗💗RFID BLOCKING DESIGN WALLET – Our wallets are equipped with advanced.',
   		'price' => 10
   	]);
    	$product->save();


    	$product = new  \App\Products([

    	'imagePath'=>'https://images-na.ssl-images-amazon.com/images/I/81N0PYW9efL._AC_UY879_.jpg',
    	'title' => 'Timex Women’s Easy',
    	'description' => 'Gold-tone 12mm stainless steel mesh bracelet fits up to 7. 5-inch wrist',
   		'price' => 20
   	]);
    	$product->save();



    	$product = new  \App\Products([

    	'imagePath'=>'https://images-na.ssl-images-amazon.com/images/I/61nbS6wBkPL._AC_UX522_.jpg',
    	'title' => 'Small Calfskin Sicily 58 Bag',
    	'description' => '100% Calfskin Internal composition: 91% Lambskin 9% Calfskin',
   		'price' => 22
   	]);
    	$product->save();


        ///////////////
        $product = new  \App\Products([

        'imagePath'=>'https://images-na.ssl-images-amazon.com/images/I/41GAlCEkq1L._AC_SX425_.jpg',
        'title' => 'Wireless Home Security Camera',
        'description' => '100% Calfskin Internal composition: 91% Lambskin 9% Calfskin',
        'price' => 25
    ]);
        $product->save();

        $product = new  \App\Products([

        'imagePath'=>'https://images-na.ssl-images-amazon.com/images/I/51koqRD7%2BUL._AC_US40_.jpg',
        'title' => 'Womens Foam Cotton Knit Slippers',
        'description' => '100% Calfskin Internal composition: 91% Lambskin 9% Calfskin',
        'price' => 15
    ]);
        $product->save();

        $product = new  \App\Products([

        'imagePath'=>'https://images-na.ssl-images-amazon.com/images/I/71mKs4dHXsL._AC_SX679_.jpg',
        'title' => 'LEVINCHY Bread Knife 8.0 inch',
        'description' => '100% Calfskin Internal composition: 91% Lambskin 9% Calfskin',
        'price' => 32
    ]);
        $product->save();

        $product = new  \App\Products([

        'imagePath'=>'https://images-na.ssl-images-amazon.com/images/I/61wvVlzVAkL._AC_SX679_.jpg',
        'title' => 'French Press Double-Wall',
        'description' => '100% Calfskin Internal composition: 91% Lambskin 9% Calfskin',
        'price' => 20
    ]);
        $product->save();

        $product = new  \App\Products([

        'imagePath'=>'https://m.media-amazon.com/images/I/51-IPZ2NDOL._AC_UY218_.jpg',
        'title' => 'nonda USB C to USB Adapter',
        'description' => '100% Calfskin Internal composition: 91% Lambskin 9% Calfskin',
        'price' => 12
    ]);
        $product->save();

        $product = new  \App\Products([

        'imagePath'=>'https://images-na.ssl-images-amazon.com/images/I/61mq4w0L2zL._AC_SX679_.jpg',
        'title' => 'Letsfit Smart Watch, Fitness',
        'description' => '100% Calfskin Internal composition: 91% Lambskin 9% Calfskin',
        'price' => 100
    ]);
        $product->save();

    	
    }
}
