
// //users table
// //ID.......-------------------->|
//                                 |
// //order_customer_lookup table   |        // order_product  table
//                                 |    
// //customer_id<------------------|->      //order_item_id <-------------------|
// //user_id<----------------------< |      //order_id      <-------------------|
// //username               |        |      //product_id                        |
// //firstname              |        |      //variation_id                      |
// //lastname               |        |------>//customer_id                      |
// //email                  |               //product_qty                       |
// //date_registered        |               //product_net_revenue               |
// //country                |               //product_gross_revenue             |
// //state                  |               //tax_amount                        |
// //city                   |               //shipping_amount                   |
// //address                |               //shipping_tax_amount               |
//                          |                                                   |
//                          |                                                   |
//                          |                                                   |
// // order_stats  table    |       // order_items   table                      |
//                          |                                                   |   
// // order_id (Auto)-------|---   //order_item_id (Auto)-----------------------|
// // parent_id             |  |    //order_item_title                          |
// // num_items_sold        |  |    //order_item_type                           |
// // total_sales           |  |--->//order_id----------------------------------|
// // total_tax             |  
// // total_shipping        |   
// // net_total             |
// // returning_customer    |
// // order_status          |
// // customer_id <---------|      





//////////////////////////////////////////////
////////  save  cart product without Login//////////
//////////////////////////////////////////////

// public function addToCart($productId){

//     // if( Auth::guard('web')->check()){
//     //     $customerId = Auth::guard('web')->user()->id;

//         $product = Products::find($productId);
//         if (!empty($product)) {
//             $cart = session()->get('cart'); //get cart product and check 
            
//             if(empty($cart))
//                 $cart = [];
//                 if(empty($cart[$productId])){

//                     $item =[
//                             'title'      => $product->title,
//                             'price'      => $product->price,
//                             'imagePath'  => $product->imagePath,
//                             'description'=> $product->description,
//                             'quantity'   => 1
//                             ];
//                         $cart[$productId] = $item;    
//                 } else{
//                     $cart[$productId]['quantity']++;    
//                 }
//                 // session()->put('cart' , $cart);
                    

//                 return redirect()->back()->with('success', 'Product Added to cart ! ');

//         }//product
//                 return redirect()->back()->with('error', 'Product Not Found');

//     // }   //Auth guard chek 
//     //             return redirect()->back()->with('loginRequired',' Login Required ');

// }






// stripe passsword // Usmanmana78612                     
// mailtrap username // Muhammad Usman    and  => password // ycXmhv@58!NjZm4

//bypass code  if u lose my mobile  for  stripe             //   keov-mvjg-palu-mmee-eqvj





//stripe  publishable  key 
//pk_test_TqDoeqLOwG6l3exnXJ37kvUU00Zfem7XE9



