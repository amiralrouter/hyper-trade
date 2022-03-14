<?php

namespace App\Defaults;

class Product
{
	public static function list()
	{
		return [
			[
				'code' => 'fruitplate',
				'name' => [
					'en' => 'Fruit Plate',
					'tr' => 'Meyve Tabağı',
				],
				'description' => [
					'en' => 'Season fruits',
					'tr' => 'Mevsim meyveleri',
				],
				'images' => [],
				'price' => 26,
				'preparation_time' => 15,
				'categories' => ['fruitsnackplates'],
				'menus' => ['restaurant_menu', 'room_menu'],
				'materials' => ['banana', 'kiwi', 'strawberry', 'redapple', 'greenapple', 'pineapple', 'walnut', 'pomegranate', 'blackberry'],
			],
			[
				'code' => 'nutsplate',
				'name' => [
					'en' => 'Nuts Plate',
					'tr' => 'Kuruyemiş Tabağı',
				],
				'description' => [
					'en' => 'Cookies',
					'tr' => 'Çerezler',
				],
				'images' => [],
				'price' => 16,
				'preparation_time' => 10,
				'categories' => ['fruitsnackplates'],
				'menus' => ['restaurant_menu', 'room_menu'],
				'materials' => ['cashew', 'almond', 'peanut', 'hazelnut', 'roastedchickpea'],
			],
			[
				'code' => 'fryingbasket',
				'name' => [
					'en' => 'Frying Basket',
					'tr' => 'Kızartma Sepeti',
				],
				'description' => [
					'en' => 'Fried snacks',
					'tr' => 'Kızartılmış atıştırmalıklar',
				],
				'images' => [],
				'price' => 28,
				'preparation_time' => 20,
				'categories' => ['maindishes'],
				'menus' => ['restaurant_menu', 'room_menu'],
				'materials' => ['friedpotatoes', 'nugget', 'onionrings', 'springroll'],
			],
			[
				'code' => 'grilledmeatballs',
				'name' => [
					'en' => 'Grilled meat balls',
					'tr' => 'Izgara Köfte',
				],
				'description' => [
					'en' => '160 gr grilled meatballs, baked potatoes and boiled vegetables',
					'tr' => '160 gr ızgara köfte kumpir patates ve haşlanmış sebze',
				],
				'images' => [],
				'price' => 54,
				'preparation_time' => 25,
				'categories' => ['maindishes'],
				'menus' => ['restaurant_menu', 'room_menu'],
				'materials' => [],
			],
			[
				'code' => 'chickenshish',
				'name' => [
					'en' => 'Chicken Shish',
					'tr' => 'Tavuk Şiş',
				],
				'description' => [
					'en' => '200 g chicken breast, roasted peppers and tomatoes, potato wedges, tortilla bread',
					'tr' => '200 gr tavuk göğsü közlenmiş biber ve domates, elma dilim patates, tortilla ekmeği',
				],
				'images' => [],
				'price' => 32,
				'preparation_time' => 15,
				'categories' => ['maindishes'],
				'menus' => ['restaurant_menu', 'room_menu'],
				'materials' => [],
			],
			[
				'code' => 'chickenwing',
				'name' => [
					'en' => 'Chicken Wing',
					'tr' => 'Tavuk Kanat',
				],
				'description' => [
					'en' => '4 wings, 4 thighs, french fries with apple slices',
					'tr' => '4 adet kanat, 4 adet but, elma dilim patates kızartması',
				],
				'images' => [],
				'price' => 40,
				'preparation_time' => 15,
				'categories' => ['maindishes'],
				'menus' => ['restaurant_menu', 'room_menu'],
				'materials' => [],
			],
			[
				'code' => 'spaghetti',
				'name' => [
					'en' => 'Spaghetti',
					'tr' => 'Spagetti',
				],
				'description' => [
					'en' => 'Bolognese sauce, parmesan cheese',
					'tr' => 'Bolognase sosu, parmesan peyniri',
				],
				'images' => [],
				'price' => 30,
				'preparation_time' => 20,
				'categories' => ['pastas'],
				'menus' => ['restaurant_menu', 'room_menu'],
				'materials' => [],
			],
			[
				'code' => 'meatwrap',
				'name' => [
					'en' => 'Meat Wrap',
					'tr' => 'Et Wrap',
				],
				'description' => [
					'en' => '',
					'tr' => 'Tortilla ekmeği içerisinde sotelenmiş bonfile dilimleri, tatlı biberler, mantar, domates, Akdeniz yeşillikleri, patates tava, cheddar peyniri ve fesleğen sos',
				],
				'images' => [],
				'price' => 45,
				'preparation_time' => 15,
				'categories' => ['burgers'],
				'menus' => ['restaurant_menu', 'room_menu'],
				'materials' => ['sweetpeppers', 'mushroom', 'tomato', 'potato', 'cheddarcheese', 'basilsauce'],
			],
			[
				'code' => 'chickenwrap',
				'name' => [
					'en' => 'Chicken Wrap',
					'tr' => 'Tavuk Wrap',
				],
				'description' => [
					'en' => 'Chicken breast sautéed in tortilla bread, sweet peppers, mushrooms, tomatoes, Mediterranean greens, fried potatoes, cheddar cheese and basil sauce',
					'tr' => 'Tortilla ekmeği içerisinde sotelenmiş tavuk göğsü, tatlı biberler, mantar, domates, Akdeniz yeşillikleri, patates tava, cheddar peyniri ve fesleğen sos',
				],
				'images' => [],
				'price' => 35,
				'preparation_time' => 15,
				'categories' => ['burgers'],
				'menus' => ['restaurant_menu', 'room_menu'],
				'materials' => ['sweetpeppers', 'mushroom', 'tomato', 'potato', 'cheddarcheese', 'basilsauce'],
			],
			[
				'code' => 'cheddarburger',
				'name' => [
					'en' => 'Cheddar Burger',
					'tr' => 'Cheddar Burger',
				],
				'description' => [
					'en' => '150 gr special hamburger patties, cheddar cheese, seasonal greens, tomatoes, pickles, pastoral sauce, caramelized onions and fried potatoes',
					'tr' => '150 gr özel hamburger köftesi, cheddar peyniri, mevsim yeşillikleri, domates, kornişon turşu, pastoral sos, karamelize soğan ve patates tava',
				],
				'images' => [],
				'price' => 40,
				'preparation_time' => 25,
				'categories' => ['burgers'],
				'menus' => ['restaurant_menu', 'room_menu'],
				'materials' => ['cheddarcheese', 'tomato', 'pickledgherkins', 'pastoralsauce', 'caramelizedonions'],
			],
			[
				'code' => 'caesarsalad',
				'name' => [
					'en' => 'Caesar salad',
					'tr' => 'Sezar Salata',
				],
				'description' => [
					'en' => 'Lettuce leaves blended with special Caesar dressing, grilled chicken pieces, croton bread, cherry tomatoes and parmesan cheese',
					'tr' => 'Özel sezar sosu ile harmanlanmış marul yaprakları, ızgara tavuk parçaları, kroton ekmek, cherry domates ve permesan peyniri',
				],
				'images' => [],
				'price' => 25,
				'preparation_time' => 30,
				'categories' => ['salads'],
				'menus' => ['restaurant_menu', 'room_menu'],
				'materials' => [],
			],
			[
				'code' => 'halloumisalad',
				'name' => [
					'en' => 'Halloumi Salad',
					'tr' => 'Hellim Salata',
				],
				'description' => [
					'en' => 'Fried halloumi cheese on Mediterranean Greens, roasted peppers, cherry tomatoes, corn and walnuts',
					'tr' => 'Akdeniz Yeşillikleri üzerine kızartılmış hellim peyniri, közlenmiş biber, cherry domates, mısır ve ceviz içi',
				],
				'images' => [],
				'price' => 30,
				'preparation_time' => 20,
				'categories' => ['salads'],
				'menus' => ['restaurant_menu', 'room_menu'],
				'materials' => ['hellimcheese', 'roastedpeppers', 'cherrytomatoes', 'sweetcorn', 'walnut'],
			],
			[
				'code' => 'soupoftheday',
				'name' => [
					'en' => 'Soup of the Day',
					'tr' => 'Günün Çorbası',
				],
				'description' => [
					'en' => 'Soup',
					'tr' => 'Çorba',
				],
				'images' => [],
				'price' => 10,
				'preparation_time' => 10,
				'categories' => ['soups'],
				'menus' => ['restaurant_menu', 'room_menu'],
				'materials' => [],
			],
			[
				'code' => 'mixedtoast',
				'name' => [
					'en' => 'Mixed Toast',
					'tr' => 'Karışık Tost',
				],
				'description' => [
					'en' => 'Cheddar cheese and sausage slices in special toast bread, French Fries and Mediterranean Greens',
					'tr' => 'Özel tost ekmeği içerisinde kaşar peyniri ve sucuk dilimleri Patates Kızartması ve Akdeniz Yeşillikleri',
				],
				'images' => [],
				'price' => 20,
				'preparation_time' => 15,
				'categories' => ['breakfast'],
				'menus' => ['restaurant_menu', 'room_menu'],
				'materials' => [],
			],
			[
				'code' => 'cheesetoast',
				'name' => [
					'en' => 'Cheese Toast',
					'tr' => 'Kaşarlı Tost',
				],
				'description' => [
					'en' => 'Cheddar Cheese in Special Toast Bread, French Fries and Mediterranean Greens',
					'tr' => 'Özel tost ekmeği içerisinde kaşar peyniri Patates Kızartması ve Akdeniz Yeşillikleri',
				],
				'images' => [],
				'price' => 20,
				'preparation_time' => 15,
				'categories' => ['breakfast'],
				'menus' => ['restaurant_menu', 'room_menu'],
				'materials' => [],
			],
			[
				'code' => 'villagebreakfast',
				'name' => [
					'en' => 'Village Breakfast',
					'tr' => 'Köy Kahvaltı',
				],
				'description' => [
					'en' => 'Tomatoes, Cucumbers, Feta Cheese, Cheddar Cheese, Green and Black Olives, Honey and Cream, Jam, Butter, Fried Sausage, Eggs, Beef Ham, Sausage, Pastry, 2 teas are our offering.',
					'tr' => 'Domates, Salatalık, Beyaz Peynir, Kaşar Peyniri, Yeşil ve Siyah Zeytin, Bal ve Kaymak, Reçel, Tereyağı, Sucuk Tava, Yumurta, Dana Jambon, Sosis, Poğaça 2 çay ikramımızdır.',
				],
				'images' => [],
				'price' => 80,
				'preparation_time' => 30,
				'categories' => ['breakfast'],
				'menus' => ['restaurant_menu', 'room_menu'],
				'materials' => [],
			],
		];
	}
}
